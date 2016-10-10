<?php
	require_once("ch05_e03a.php");
?>
<!DOCTYPE html>
<html>
<body>
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		File Name: <input type="text" name="filename" />
		<br />
		<br />
		<input type="submit" value="GO">
	</form>
	<hr />
	<?php
		if (array_key_exists("filename", $_REQUEST) && trim($_REQUEST["filename"])) {
			$link = img_tag($_REQUEST["filename"]);
			print $link;
		}
	?>
</body>
</html>