<?php
	define ("COLOR_CSV", "css_color.csv");
	define ("COLOR_COL_NUM", 4);
	define ("JUMP_TO", "ch10_e03x.php");

	set_error_handler(function ($errno, $errstr, $errfile, $errline) {
		throw new ErrorException($errstr, $errno, 0, $errfile, $errline);
	});

	$errors = array();

	function fetchColorArray() {
		$color_array = array();
		try {
			$file = fopen(COLOR_CSV, "r");
			fgets($file); //skip title line
			while (!feof($file)) {
				$line = fgetcsv($file);
				$color_array[$line[0]] = $line[1];
			}
			fclose($file);
		} catch (Exception $e) {
			$errors[] = $e.getMessage();
		}

		return $color_array;
	}

	$color_picked = "";
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$color_picked = $_POST["color_picked"] ?? "";
		//session_start();
		$sid = session_id();
		$_SESSION["color_picked"] = $color_picked;
		header("Location: ".JUMP_TO."?sid=".$sid);
		exit;
	}
?>
<!DOCTYPE html>
<html>
<style>
	html {background-color: <?php isset($_SESSION["color_picked"]) ?? ""  ?>;}
	table {border-collapse: collapse;}
	th {background-color: Navy; color: White; font-style: bold; padding: 5px; text-align: center;}
	td {border: 1px Solid Gray; text-align:right; padding: 5px;}
</style>
<?php
	print "<ul>";
	if ($errors) {
		foreach ($errors as $err) {
			print "<li>".$form->encode($err)."</li>";
		}
	}
	print "</ul>";
?>
<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<table>
	<tr>
		<?php for ($i=0; $i<COLOR_COL_NUM; $i++) { ?>
		<th>Color Name</th><th>Color HEX</th>
		<?php } ?>
	</tr>
<?php
	$colors = fetchColorArray();
	$i = 0;
	foreach ($colors as $k => $v) {
		if ($i % COLOR_COL_NUM == 0) print "<tr>";
		print "<td>".$k."</td><td style='background-color:".$v.
			"; text-align:center;'><input type='radio' name='color_picked' value='".$k."'></td>";
		if ($i % COLOR_COL_NUM == COLOR_COL_NUM-1) print "</tr>";
		$i++;
	}
?>
</table>
<input type="submit" value="Pick Color">
</form>
</html>