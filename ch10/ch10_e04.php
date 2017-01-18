<?php
	require "FormHelper.php";

	define("JUMP_TO", "ch10_e04x.php");

	$cart = array();
	if (!isset($_SESSION["cart"])) {
		$cart = [
			"Book"		=>"1",
			"CD"		=>"1",
			"Pen"		=>"1",
			"Calendar"	=>"1",
			"Notebook"	=>"1",
			"Bag"		=>"1"
		];
	} else {
		$cart = $_SESSION["cart"];
	}

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		list($errors, $args) = validate_form();
		if ($errors) {
			show_form($errors);
		} else {
			process_form($args);
		}
	} else {
		show_form();
	}

	function validate_form() {
		$errors = array();
		$args = array();

		foreach ($GLOBALS["cart"] as $k => $v) {
			$args[$k] = $_POST[$k] ?? "";
			if (!trim($args[$k]) || !is_numeric($args[$k]) || $args[$k] <= 0) {
				$errors[] = "Must be a positive number in box : $k";
			}
			$args[$k] = (float)$args[$k];
		}

		return array($errors, $args);
	}

	function show_form($errors = array()) {
		$form = new FormHelper($GLOBALS["cart"]);

		include "ch10_e04f.php";
	}

	function process_form($args) {
		$sid = session_id();
		$_SESSION["cart"] = $args;
		header("Location: ".JUMP_TO."?sid=$sid");
		exit;
	}
?>