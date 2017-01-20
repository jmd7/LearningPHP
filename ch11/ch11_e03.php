<?php
	define("COOKIE_PAGE", "http://localhost/LearningPHP/ch11/ch11_e03c.php"); 

	$c = curl_init(COOKIE_PAGE);
	curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($c, CURLOPT_COOKIEJAR, true);

	//$res = curl_exec($c);
	//print $res."<br/>";

	for ($i=0; $i<rand(3, 5); $i++) {
		$res = curl_exec($c);
		print $res."<br/>";
		sleep(rand(0, 3));
	}

?>