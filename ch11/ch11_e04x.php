<!--
	NOT WORK !!!
	Github does not allow to delete a gist in any way
-->
<!DOCTYPE html>
<html><pre>
<?php
	define("gist_url", "https://api.github.com/gists");
	define("local_file", "gists_tbd");

	/*function fetch_delete_gists() {
		$file = fopen(local_file, "r");
		while (!feof($file)) {
			yield fgets($file);
		}
		fclose($file);
	}*/

	$gists = explode("\n", file_get_contents(local_file));
	$left_gists = array();

	foreach ($gists as $g) {
		print "[".gist_url."/".$g."]<br/>";
		$c = curl_init(gist_url."/".$g);
		curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($c, CURLOPT_USERAGENT, $_SERVER["HTTP_USER_AGENT"]);
		curl_setopt($c, CURLOPT_CUSTOMREQUEST, "DELETE");
		//curl_setopt($c, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		//curl_setopt($c, CURLOPT_POST, true);
		//curl_setopt($c, CURLOPT_POSTFIELDS, json_encode($form_data));

		$result = curl_exec($c);
		$info = curl_getinfo($c);

		if ($result == false) {
			print "Error #".curl_errno($c)."<br/>";
			print "Curl: ".curl_error($c)."<br/>";
			$left_gists[] = $g;
		} else if ($info['http_code'] >= 400) {
			print $result."<br/>";
			print "Server Error ".$info["http_code"]."<br/>";
			$left_gists[] = $g;
		} else {
			print "Gist $g deleted. <br/>";
		}

		file_put_contents(local_file, implode("\n", $left_gists));
	}
?>
</pre></html>