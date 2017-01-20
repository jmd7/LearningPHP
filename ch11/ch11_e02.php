<!DOCTYPE html>
<html><pre>
<?php
	define ("PHP_JSON_URL", "http://php.net/releases/?json");

	$c = curl_init(PHP_JSON_URL);
	curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
	$res = json_decode(curl_exec($c));
	print_r($res);
	//output_array($res, 0);

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