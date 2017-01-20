<!--
	RUN THIS ONCE ONLY
	Github does not allow to delete a gist in any way
-->

<?php
	define("gist_url", "https://api.github.com/gists");
	define("local_file", "googlesearch.txt");

	$form_data = array("description" => "Google search without jump",
		"public" => "false",
		"files" => array(
			"googlesearch" => array("content" =>
				file_get_contents(local_file)
			)
		)
	);

	$c = curl_init(gist_url);
	curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($c, CURLOPT_USERAGENT, $_SERVER["HTTP_USER_AGENT"]);
	curl_setopt($c, CURLOPT_POST, true);
	curl_setopt($c, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
	curl_setopt($c, CURLOPT_POSTFIELDS, json_encode($form_data));

	$result = curl_exec($c);
	$info = curl_getinfo($c);

	if ($result == false) {
		print "Error #".curl_errno($c)."<br/>";
		print "Curl: ".curl_error($c)."<br/>";
	} else if ($info['http_code'] >= 400) {
		print "Server Error ".$info["http_code"]."<br/>";
	} else {
		print "Successful<br/>";
	}

	$res_arr = json_decode($result, true);
	print "ID  : [".$res_arr["id"]."]<br/>";
	print "URL : [".$res_arr["html_url"]."]<br/>";
?>