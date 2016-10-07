<?php
	print "<!DOCTYPE html><pre>\n";

	for ($degree = -50; $degree <=50; $degree += 5) {
		printf("%3d C = %3d F\n", $degree, $degree*9/5+32);
	}

	print "\n</pre>";
?>