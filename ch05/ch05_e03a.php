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
