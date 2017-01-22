<!DOCTYPE html>
<?php
	include "ch12_e00.php";

	$errors = array();
	if (!array_key_exists("cust_name", $_POST)) {
		try {
			$db = new PDO("sqlite:./ch12.db");
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$stmts = [
				"DROP TABLE IF EXISTS customer",
				"CREATE TABLE customer (cust_id INTEGER PRIMARY KEY AUTOINCREMENT, cust_name TEXT, cust_phone TEXT, cust_favorite INTEGER, 
					FOREIGN KEY (cust_favorite) REFERENCES dishes(dish_id))",
			];

			foreach ($stmts as $sql) {
				$db->exec($sql);
			}
		} catch (PDOException $e) {
			//print $e->getMessage()."<br/>";
			throw $e;
		}
	} else {
		$cust_name = $_POST["cust_name"] ?? "";
		$cust_name = htmlentities($cust_name, ENT_QUOTES, "utf-8");
		if (!trim($cust_name)) $errors[] = "Customer Name is required.";

		$cust_phone = $_POST["cust_phone"] ?? "";
		$cust_phone = htmlentities($cust_phone, ENT_QUOTES, "utf-8");
		if (!trim($cust_phone) || !preg_match("/[0-9]+/", $cust_phone)) $errors[] = "Customer Phone Number is invalid.";

		$cust_favorite = $_POST["cust_favorite"];

		if (!$errors) {
			try {
				$stmt = $db->prepare("
					INSERT INTO customer(cust_name, cust_phone, cust_favorite) VALUES(?, ?, ?)");
				$stmt->execute([$cust_name, $cust_phone, $cust_favorite]);
			} catch (PDOException $e) {
				//print $e->getMessage()."<br/>";
				throw $e;
			}
			$cust_name = "";
			$cust_phone = "";
			$cust_favorite = "";
		}
	}

?>
<html>
	<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		Customer Name : <input type="text" name="cust_name" value="<?= $cust_name ?? ""?>"><br/>
		Customer Phone : <input type="text" name="cust_phone" value="<?= $cust_phone ?? ""?>"><br/>
		Customer Favorite : 
		<?php
			$db = new PDO("sqlite:./ch12.db");
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			try {
				$q = $db->query("SELECT dish_id, dish_name FROM dishes");
				print "<select name='cust_favorite'>";
				while ($row = $q->fetch()) {
					print "<option value='".$row["dish_id"]."'";
					if (array_key_exists("cust_favorite", $_POST) && 
						$row["dish_id"] == $_POST["cust_favorite"]) print " selected";
					print ">".$row["dish_name"]."</option>";
				}
				print "</select>";
			} catch (PDOException $e) {
				print $e->getMessage()."<br/>";
			}
		?>
		<br/>
		<input type="submit" value="Add Customer">
		<?php
			if ($errors) {
				print "<hr/>";
				print "<ul>";
				foreach ($errors as $err) {
					print "<li>".$err."</li>";
				}
				print "</ul>";
			} else {
				print "<hr/>";
				try {
					$q = $db->query("
						SELECT c.cust_id, c.cust_name, c.cust_phone, d.dish_name 
						FROM customer c, dishes d 
						WHERE c.cust_favorite=d.dish_id
						");
					while ($row = $q->fetch()) {
						print "Customer ID : [".$row["cust_id"]."]<br/>";
						print "Customer Name : [".$row["cust_name"]."]<br/>";
						print "Customer Phone : [".$row["cust_phone"]."]<br/>";
						print "Customer Favorite : [".$row["dish_name"]."]<br/>";
						print "<br/>";
					}
				} catch (PDOException $e) {
					//print $e->getMessage()."<br/>";
					throw $e;
				}
			}
		?>
	</form>
</html>