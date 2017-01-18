<!DOCTYPE html>
<?php
	require "FormHelper.php";
	define("JUMP_BACK", "ch10_e04.php");

	if (isset($_GET["sid"])) {
		session_id($_GET["sid"]);
	}
	if (isset($_SESSION["cart"])) {
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			unset($_SESSION["cart"]);
			header("Location: ".JUMP_BACK);
			exit;
		}
	} else {
		echo "No Session Data.<br/>";
		echo "<a href='ch10_e04.php'>Back</a>";
		exit;
	}
?>
<html>
<style>
	table {border-collapse: collapse;}
	th {background-color:navy; color:white; font-weight: bold;padding: 8px;}
	td {background-color:LightGoldenRodYellow;padding: 8px;}
	td.caption { text-align: right;}
	input[type="submit"] {width:100%;}
</style>
<form method="POST" action="<?= $_SERVER["PHP_SELF"] ?>">
	<table>
		<tr>
			<th>Product</th>
			<th>Quantity</th>
		</tr>
		<?php foreach ($_SESSION["cart"] as $k => $v) { ?>
			<tr>
				<td class="caption"><?= ucwords($k) ?></td>
				<td><?= $v ?></td>
			</tr>
		<?php } ?>
		<tr><td/><td/></tr>
		<tr>
			<td><a href='<?= JUMP_BACK."?sid=".$_GET["sid"] ?>'>Back</a></td>
			<td><input type="submit" value="Check Out"></td>
		</tr>
	</table>
</form>
</html>
