<?php
	include "FormHelper.php";

	class FormHelperTest extends PHPUnit_Framework_TestCase {

		function testButtonNoType() {
			$form = new FormHelper();
			$attributes = array(
					"name" => "b",
				);
			$res = $form->button();
			$this->assertContains('<button type="button" />', $res);
		}

		function testButtonSubmit() {
			$form = new FormHelper();
			$attributes = array(
					"name" => "b",
				);
			$type = "submit";
			$res = $form->button($type, $attributes);
			$this->assertContains('<button name="b" type="submit" />', $res);
		}
		
		function testButtonReset() {
			$form = new FormHelper();
			$attributes = array(
					"name" => "b",
				);
			$type = "reset";
			$res = $form->button($type, $attributes);
			$this->assertContains('<button name="b" type="reset" />', $res);
		}
		
		function testButtonButton() {
			$form = new FormHelper();
			$attributes = array(
					"name" => "b",
				);
			$type = "button";
			$res = $form->button($type, $attributes);
			$this->assertContains('<button name="b" type="button" />', $res);
		}
		
		function testInvalidButton() {
			$form = new FormHelper();
			$attributes = array(
					"name" => "b",
				);
			$type = "invalid";
			$this->expectException(Exception::class);
			$this->expectExceptionMessage("Type for tag <Button> is invalid : ");
			$res = $form->button($type, $attributes);
		}
		
	}
?>