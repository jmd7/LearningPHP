<!DOCTYPE html>
<?php
	$errors = array();
	$content = "";

	set_error_handler(function ($errno, $errstr, $errfile, $errline) {
		//$errors[] = "Open/Read file error : ".$file_url;
		throw new ErrorException($errstr, $errno, 0, $errfile, $errline);
	});

	if (array_key_exists("file_path", $_POST)) {
		$file_path = filter_input(INPUT_POST, "file_path", FILTER_SANITIZE_URL) ?? "";
		$file_path = htmlentities($file_path, ENT_QUOTES, "utf-8");
		if (!trim($file_path)) $errors[] = "Path/file name is required.";

		if (!preg_match('/^\S*\.htm(l)?$/', $file_path)) {
			$errors[] = "Only html file is permitted : ".$file_path;
		}

		$doc_root = $_SERVER["DOCUMENT_ROOT"];
		$file_url = "file://".$doc_root."/".$file_path;

		try {
			$file = fopen($file_url, "r");
			//$content = htmlentities(file_get_contents($file_url));
			while (!feof($file)) {
				$content .= fgets($file);
			}
			if ($file) fclose($file);
		} catch (Exception $e) {
			$errors[] = "Open/Read file error : ".$file_url;
		}
	}

	restore_error_handler();
?>
<html>
	<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		Relative path and file name : <input type="text" name="file_path" value="<?= $file_path ?? ""?>"><br/>
		<input type="submit" value="Catalog It">
		<?php
			if ($errors) {
				print "<hr/>";
				print "<ul>";
				foreach ($errors as $err) {
					print "<li>".$err."</li>";
				}
				print "</ul>";
			} else {
				print "<hr/><pre>";
				print htmlentities($content, ENT_HTML401, "utf-8")."<br/>";
				print "</pre>";
			}
		?>
	</form>
</html>