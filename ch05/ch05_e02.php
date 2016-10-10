<?php
	$dir = "./";

	function img_tag ($filename) {
		global $dir;

		$url = $dir.$filename;
		$tag = "<img src='";
		if (!$img_data = getimagesize($url)) return "Wrong URL!";
		$tag .= $url."'";

		$tag .= " width='".$img_data[0]."'";
		$tag .= " height='".$img_data[1]."'";

		return $tag.">";
	}
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