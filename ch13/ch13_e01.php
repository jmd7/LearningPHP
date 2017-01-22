<?php
	class PHPUnitTest extends PHPUnit_Framework_Testcase {
		public function testOK() {
			$res = 1+1;
			$this->assertEquals(2, $res);
		}

		public function testNG() {
			$res = 1+2;
			$this->assertEquals(2, $res);
		}
	}
?>