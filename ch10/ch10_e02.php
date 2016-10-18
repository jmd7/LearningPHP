<?php
	if (!array_key_exists("page_view", $_COOKIE)) {
		echo "Page viewed 1 time.";
		setcookie("page_view", 1, 0, '/LearningPHP/ch10/', 'localhost');
	} else {
		$i = $_COOKIE["page_view"] + 1;

		if ($i % 5 == 0) {
			$star = array_fill(0, $i/5, '*');
			echo "Page viewed ".$i." times. [".implode("", $star)."]";
		} else {
			echo "Page viewed ".$i." times.";
		}

		if ($i == 20) {
			setcookie("page_view", "");
		} else {
			setcookie("page_view", $i);
		}

	}
