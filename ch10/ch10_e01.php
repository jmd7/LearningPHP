<?php
	if (!array_key_exists("page_view", $_COOKIE)) {
		echo "Page viewed 1 time.";
		setcookie("page_view", 1, 0, '/LearningPHP/ch10/', 'localhost');
	} else {
		$i = $_COOKIE["page_view"] + 1;
		echo "Page viewed ".$i." times.";
		setcookie("page_view", $i);
	}
