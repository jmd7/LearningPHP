<?php
	include "FormHelper.php";

	class FormHelperTest extends PHPUnit_Framework_TestCase {
	
		function testSelectNameValue() {
			$form = new FormHelper();
			$options = array(
					"value1" => "option1",
					"value99" => "option99"
				);
			$res = $form->select($options, array("name"=>"testSelectNameValue"));
			$this->assertContains('<option  value="value1">option1</option>', $res);
			$this->assertContains('<option  value="value99">option99</option>', $res);
		}

		function testSelectValue() {
			$form = new FormHelper();
			$options = array(
					"option1",
					"option99"
				);
			$res = $form->select($options, array("name"=>"testSelectValue"));
			$this->assertContains('<option  value="0">option1</option>', $res);
			$this->assertContains('<option  value="1">option99</option>', $res);
		}

		function testNoAttributes() {
			$form = new FormHelper();
			$options = array(
					"option1",
					"option99"
				);
			$res = $form->select($options);
			$this->assertContains('<select >', $res);
		}

		function testTrueAttribute() {
			$form = new FormHelper();
			$options = array(
					"option1",
					"option99"
				);
			$attributes = array(
					"attr1" => true,
				);
			$res = $form->select($options, $attributes);
			$this->assertContains('<select attr1>', $res);
		}

		function testFalseAttribute() {
			$form = new FormHelper();
			$options = array(
					"option1",
					"option99"
				);
			$attributes = array(
					"attr1" => false,
				);
			$res = $form->select($options, $attributes);
			$this->assertContains('<select >', $res);
		}

		function testValueAttribute() {
			$form = new FormHelper();
			$options = array(
					"option1",
					"option99"
				);
			$attributes = array(
					"name" => "testValueAttribute",
				);
			$res = $form->select($options, $attributes);
			$this->assertContains('<select name="testValueAttribute">', $res);
		}

		function testMultiple() {
			$form = new FormHelper();
			$options = array(
					"option1",
					"option99"
				);
			$attributes = array(
					"name" => "testMultiple",
					"multiple" => true,
				);
			$res = $form->select($options, $attributes);
			$this->assertContains('<select name="testMultiple[]" multiple>', $res);
		}

		function testSpecialChars() {
			$form = new FormHelper();
			$options = array(
					"option>",
					"option&"
				);
			$attributes = array(
					"name" => "testSpecialChars<",
				);
			$res = $form->select($options, $attributes);
			$this->assertContains('<option  value="0">option&gt;</option>', $res);
			$this->assertContains('<option  value="1">option&amp;</option>', $res);
			$this->assertContains('<select name="testSpecialChars&lt;">', $res);
		}
	}
?>