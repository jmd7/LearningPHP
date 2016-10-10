<?php
	function img_tag ($url, $alt="", $width=0, $height=0) {
		$tag = "<img src='";
		if (!$img_data = getimagesize($url)) return "Wrong URL!";
		$tag .= $url."'";

		if (trim($alt)) $tag .=" alt='".$alt."'";

		if ($width) $tag .= " width='".$width."'";
			else $tag .= " width='".$img_data[0]."'";
		
		if ($height) $tag .= " height='".$height."'";
			else $tag .= " height='".$img_data[1]."'";

		return $tag.">";
	}
?>
<!DOCTYPE html>
<html>
<body>
	<form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		URL: <input type="text" name="url" />
		<br />
		ALT: <input type="text" name="alt" />
		<br />
		Width : <input type="text" name="w" />
		<br />
		Height: <input type="text" name="h" />
		<br />
		<br />
		<input type="submit" value="GO">
	</form>
	<hr />
	<?php
		if (array_key_exists("url", $_GET) && trim($_GET["url"])) {
			$link = img_tag($_GET["url"], $_GET["alt"], $_GET["w"], $_GET["h"]);
			print $link;
		}
	?>
</body>
</html>