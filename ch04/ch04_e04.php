<!DOCTYPE html>
<pre>
<?php
	//a
	$students = [
		'AAA BBB' => ['grade' => 'A+', 'id' => '271231'],
		'CCC DDD' => ['grade' => 'A', 'id' => '818211'],		
	];

	var_dump($students);

	//b
	$store = [
		'item A' => 10,
		'item B' => 20,
	];

	var_dump($store);

	//c
	$week_lunch = [
		"Monday" => [
			"entree" => ["AAA" => 1.2, "BBB" => 3.4],
			"side dish" => ["CCC" => 5.6, "DDD" => 7.8],
			"drink" => ["EEE" => 9.0],
		],
		"Tuesday" => [
			"entree" => ["AAA" => 1.2, "BBB" => 3.4],
			"side dish" => ["CCC" => 5.6, "DDD" => 7.8],
			"drink" => ["EEE" => 9.0],
		],
		"Wednesday" => [
			"entree" => ["AAA" => 1.2, "BBB" => 3.4],
			"side dish" => ["CCC" => 5.6, "DDD" => 7.8],
			"drink" => ["EEE" => 9.0],
		],
		"Thursday" => [
			"entree" => ["AAA" => 1.2, "BBB" => 3.4],
			"side dish" => ["CCC" => 5.6, "DDD" => 7.8],
			"drink" => ["EEE" => 9.0],
		],
		"Friday" => [
			"entree" => ["AAA" => 1.2, "BBB" => 3.4],
			"side dish" => ["CCC" => 5.6, "DDD" => 7.8],
			"drink" => ["EEE" => 9.0],
		],

	];
	var_dump($week_lunch);

	//d
	$family = [
		"AAA",
		"BBB",
		"CCC"
	];
	var_dump($family);

	//e
	$family2 = [
		"Dad" => ["AAA" => 55],
		"Mom" => ["BBB" => 54],
		"Brother" => [
			"CCC" => 34,
			"DDD" => 33,
		],
	];
	var_dump($family2);
?>
</pre>