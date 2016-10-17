<?php
	$file_in = "ch09_e01.in";
	$file_out = "ch09_e01.out";

	if (file_exists($file_in)) {
		$template = file_get_contents($file_in);

		$template = preg_replace(
			[
				"/\{page_title\}/",
				"/\{color\}/",
				"/\{name\}/",
			], 
			[
				"Chapter 09 Exercise 01", 
				"LightGoldenRodYellow", 
				"Hu Bin",
			], $template);

		file_put_contents($file_out, $template);
	}