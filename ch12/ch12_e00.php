<?php
	function handleException($ex) {
		$err_str = $ex->getMessage()." [".$ex->getFile().":".$ex->getLine()."]";
		print $err_str;
		$log_str = "[ERROR] ".date_format(date_create(), "Y/m/d H:i:s")." [".$ex->getFile().":".$ex->getLine()."] : ".$ex->getMessage();
		//print "<br/>".$log_str;
		error_log($log_str);
		exit;
	}

	set_exception_handler("handleException");

	$db = new PDO('sqlite:./ch12.db');
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	foreach (fetchSQL() as $sql) {
		try {
			$q = $db->exec($sql);
		} catch (PDOException $e) {
			//print $e->getMessage()."\n";
			throw $e;
		}
	}

	function fetchSQL() {
		$file = fopen("./ddl.txt", "r");
		if (!$file) throw new Exception("ddl.txt file is not found.");

		while (!feof($file)) {
			yield fgets($file);
		}
	}
?>