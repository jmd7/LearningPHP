<!DOCTYPE html>
<html><pre>
<?php
	include "ch08_e00.php";

	$db = new PDO('sqlite:./ch08.db');
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$q = $db->query("SELECT * FROM dishes ORDER BY price");
	while ($row = $q->fetch()) {
		print "$row[dish_name] $row[price] \n";
	}
?>
</pre></html>