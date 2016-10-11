<?php
	require "FormHelper.php";

	$ops = ["+"=>"+", "-"=>"-", "*"=>"*", "/"=>"/", "%"=>"%"];

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

		$args["operands_left"] = $_POST["left"] ?? "";
		if (!is_numeric($args["operands_left"])) {
			$errors[] = "Please input valid number in left operand textbox.";
		}

		$args["operands_right"] = $_POST["right"] ?? "";
		if (!is_numeric($args["operands_right"])) {
			$errors[] = "Please input valid number in right operand textbox.";
		}

		$args["operator"] = $_POST["op"] ?? "";
		if (!in_array($args["operator"], $GLOBALS["ops"])) {
			$errors[] = "Please select valid operator in select box.";
		}

		if (in_array($args["operator"], array("/", "%"))) {
			if ( 0 == $args["operands_right"]) {
				$errors[] = "Can not divide Zero.";
			}
		}

		return array($errors, $args);
	}

	function show_form($errors = array()) {
		$defaults = array("op" => "plus");
		$form = new FormHelper($defaults);

		include "ch07_e03f.php";
	}

	function process_form($errors, $args) {
		$result = "";
		switch ($args["operator"]) {
			case "+":
				$result = $args["operands_left"] + $args["operands_right"];
				break;
			case "-":
				$result = $args["operands_left"] - $args["operands_right"];
				break;
			case "*":
				$result = $args["operands_left"] * $args["operands_right"];
				break;
			case "/":
				$result = $args["operands_left"] / $args["operands_right"];
				break;
			case "%":
				$result = $args["operands_left"] % $args["operands_right"];
				break;
		}
		$_POST["result"] = $result;
		$form = new FormHelper();

		include "ch07_e03f.php";
	}

	function print_post() {
		foreach ($_POST as $k=>$v) {
			if (is_array($v)) {
				print "$k = [".implode(" | ", $v)."]<br/>";
			} else {
				print $k." = ".$v."<br/>";
			}
		}
	}
?>