<!DOCTYPE html>
<html><pre>
<?php
	define ("PHP_JSON_URL", "http://php.net/releases/?json");

	$res = json_decode(file_get_contents(PHP_JSON_URL), true);
	output_array($res, 0);
	//$res = json_decode(file_get_contents(PHP_JSON_URL));
	//print_r($res);

	function output_array($arr, $depth) {
		if (is_array($arr)) {
			foreach ($arr as $k => $v) {
				$prefix = implode("", array_fill(0, $depth, ".."));
				printf("%s[%s] => ", $prefix, $k);
				if (is_array($v)) {
					print("<br/>");
					output_array($v, $depth+1);
				} else {
					printf("[%s]<br/>", $v);
				}
			}
		}
	}
?>
</pre></html>