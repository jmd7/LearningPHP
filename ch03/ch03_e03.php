<?php
	print "<!DOCTYPE html><pre>\n";

	$degree = -50;
	$step = 5;

	while ($degree <= 50) {
		printf("%3d F = %.2f C\n", $degree, ($degree-32)*5/9);
		$degree += $step;
	}

	print "\n</pre>";
?>