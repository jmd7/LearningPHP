<!DOCTYPE html>
<html>
<?php
	define ("CSV_FILE_NAME", "US_States.csv");
	$csv = "";
	$idx = 0;
	function fetchStates() {
		if (file_exists(CSV_FILE_NAME)) {
			$file = fopen(CSV_FILE_NAME, "r");
			while (!feof($file)) {
				yield fgetcsv($file);
			}
			fclose($file);
		}
	}
?>
<style>
	table {border-collapse: collapse;}
	th {background-color: Navy; color: White; font-style: bold; padding: 5px; text-align: center;}
	tr.odd {background-color: PowderBlue;}
	tr.even {background-color: LightCyan;}
	td {border: 1px Solid Gray; text-align:center; padding: 5px;}
</style>
<body>
	<table>
		<?php
		foreach (fetchStates() as $line) {
			if ($idx == 0) {
				print "<tr><th>".implode("</th><th>", $line)."</th></tr>";
			} else {
				print "<tr class='".($idx % 2 == 0 ? "even" : "odd")."'><td>".implode("</td><td>", $line)."</td></tr>";
			}
			$idx ++;
		}
		?>
	</table>
</body>
</html>
