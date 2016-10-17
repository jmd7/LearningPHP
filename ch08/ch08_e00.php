<?php
	$db = new PDO('sqlite:./ch08.db');
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	foreach (fetchSQL() as $sql) {
		try {
			$q = $db->exec($sql);
		} catch (PDOException $e) {
			print $e->getMessage()."\n";
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