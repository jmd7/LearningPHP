<?php
	$n = 1;
	print "<!DOCTYPE html>\n<pre>\n";
	for ($i=1; $i<=5; $i++) {
		$n *= 2;
		printf("%5s %5s\n", $i, $n);
	}
	print "</pre>";
?>