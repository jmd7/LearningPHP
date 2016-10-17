<!DOCTYPE html>
<html>
	<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		Your price ? <input type="text" name="bid">
		<input type="submit" value="Go">
	</form>
	<?php
		$bid = $_POST["bid"] ?? "";
		if ("" == trim($bid)) {
			exit("");
		} else {
			include "ch08_e00.php";
		}

		$bid = htmlentities($bid, ENT_QUOTES, "utf-8");

		try {
			$db = new PDO("sqlite:./ch08.db");
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$sql = "SELECT * FROM dishes where price >= ? ORDER BY price";
			//print $sql."<br/>";

			$stmt = $db->prepare($sql);
			$stmt->execute([$bid]);

			print "<hr/>";
			$row = $stmt->fetch();
			do {
				if (!$row) print "At least the price $".$bid." : [NONE].";
				else print "At least the price $".$bid." : ".$row["dish_name"]." $".$row["price"]."<br/>";
			}while ($row = $stmt->fetch());
		} catch (PDOException $e) {
			print $e->getMessage()."<br/>";
		}
	?>
</html>