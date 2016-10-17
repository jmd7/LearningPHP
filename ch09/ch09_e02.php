<?php
	define ("FILE_IN_NAME", "ch09_e02.in");
	define ("FILE_OUT_NAME", "ch09_e02.out");

	$given_names = ["david", "richard", "john", "jack", "eric"];
	$family_names = ["davidson", "richardson", "johnson", "jackson", "ericsson"];
	$organizations = ["ibm", "oracle", "microsoft", "nokia", "hp"];

	function generate_in($count = 100) {
		global $given_names, $family_names, $organizations;

		$emails = array();
		for ($i = 0; $i < $count; $i++) {
			$emails[] = $given_names[rand(0, count($given_names)-1)].".".
				$family_names[rand(0, count($family_names)-1)]."@".
				$organizations[rand(0, count($organizations)-1)].".com";
		}
		return $emails;
	}

	file_put_contents(FILE_IN_NAME, implode("\n", generate_in()));

	function generate_out($emails) {
			$out = array();
			foreach ($emails as $s) {
				if (array_key_exists($s, $out)) $out[$s] += 1;
				else $out[$s] = 1;
			}
			arsort($out);
			return $out;
	}

	$in = file_get_contents(FILE_IN_NAME);
	$out = generate_out(explode("\n", $in));
	$output = "";
	foreach ($out as $k=>$v) {
		$output .= $v.",".$k."\n";
	}
	file_put_contents(FILE_OUT_NAME, $output);
