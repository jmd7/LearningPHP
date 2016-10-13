<?php
	require "FormHelper.php";

	$us_states = array();
	foreach (fetch_US_states() as $state) {
		$us_states[$state[2]] = $state[1];
	}

	function fetch_US_states() {
		$file = fopen("US_States.csv", "r");
		if (!feof($file)) fgetcsv($file); // skip the title line
		while (feof($file) == false) {
			yield fgetcsv($file);
		}
		fclose($file);
	}

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		list($errors, $args) = validate_form();
		if ($errors) {
			show_form($errors);
		} else {
			process_form($errors, $args);
		}
	} else {
		show_form();
	}

	function validate_form() {
		$errors = array();
		$args = array();

		$args["from_addr"] = $_POST["from_addr"] ?? "";
		$args["to_addr"] = $_POST["to_addr"] ?? "";
		if (!trim($args["from_addr"])) {
			$errors[] = "From address can not be empty";
		}
		if (!trim($args["to_addr"])) {
			$errors[] = "To address can not be empty";
		}

		$args["from_state"] = $_POST["from_state"];
		$args["to_state"] = $_POST["to_state"];

		$args["from_zip"] = $_POST["from_zip"] ?? "";
		$args["to_zip"] = $_POST["to_zip"] ?? "";
		if (!preg_match('/[0-9]{6}/', $args["from_zip"])) {
			$errors[] = "From zip-code is not valid";
		}
		if (!preg_match('/[0-9]{6}/', $args["to_zip"])) {
			$errors[] = "To zip-code is not valid";
		}

		$args["length"] = $_POST["length"] ?? "";
		$args["width"] = $_POST["width"] ?? "";
		$args["height"] = $_POST["height"] ?? "";
		if (!is_numeric($args["length"]) || 
			!is_numeric($args["width"]) || 
			!is_numeric($args["height"])) {
			$errors[] = "Any dimension must be numeric";
		}
		if (($args["length"] > 36) || 
			($args["width"] > 36) || 
			($args["height"] > 36)) {
			$errors[] = "Any dimension can not over 36 inches";
		}

		$args["weight"] = $_POST["weight"] ?? "";
		if (!is_numeric($args["weight"])) {
			$errors[] = "Weight must be numeric";
		}
		if ($args["weight"] > 150) {
			$errors[] = "Weight can not over 150 pounds";
		}

		return array($errors, $args);
	}

	function show_form($errors = array()) {
		$defaults = ["from_state"=>"AL", "to_state"=>"WY"];
		$form = new FormHelper($defaults);

		include "ch07_e04f.php";
	}

	function process_form($errors, $args) {
		$form = new FormHelper();

		include "ch07_e04f.php";
	}
?>