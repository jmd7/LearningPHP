<!DOCTYPE html>
<?php include "ch08_e00.php"; ?>
<html>
	<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<?php
			try {
				$db = new PDO("sqlite:./ch08.db");
				$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				$q = $db->query("SELECT dish_id, dish_name FROM dishes");
				print "<select name='dish_selected'>";
				while ($row = $q->fetch()) {
					print "<option value='".$row["dish_id"]."'";
					if (array_key_exists("dish_selected", $_POST) && 
						$row["dish_id"] == $_POST["dish_selected"]) print " selected";
					print ">".$row["dish_name"]."</option>";
				}
				print "</select>";
			} catch (PDOException $e) {
				print $e->getMessage()."<br/>";
			}
		?>
		<br/>
		<input type="submit" value="Go">
	</form>
	<?php
		$selected = $_POST["dish_selected"] ?? "";
		if ("" == trim($selected)) {
			exit("");
		} 

		$selected = htmlentities($selected, ENT_QUOTES, "utf-8");

		try {
			$sql = "SELECT * FROM dishes where dish_id = ?";
			//print $sql."<br/>";

			$stmt = $db->prepare($sql);
			$stmt->execute([$selected]);

			print "<hr/>";
			$row = $stmt->fetch();
			do {
				if (!$row) print "Not found. ID=".$selected;
				else {
					print "Dish ID: ".$row["dish_id"]."<br/>";
					print "Dish Name: ".$row["dish_name"]."<br/>";
					print "Price: ".$row["price"]."<br/>";
					print "Spiciness: ".($row["is_spicy"] ? "Yes" : "No")."<br/>";
				};
			}while ($row = $stmt->fetch());
		} catch (PDOException $e) {
			print $e->getMessage()."<br/>";
		}
	?>
</html>