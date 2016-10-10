<?php
	$R = (array_key_exists("R", $_REQUEST) ? $_REQUEST["R"] : 0);
	$G = (array_key_exists("G", $_REQUEST) ? $_REQUEST["G"] : 127);
	$B = (array_key_exists("B", $_REQUEST) ? $_REQUEST["B"] : 255);
	$color = sprintf("#%'02X%'02X%'02X", $R, $G, $B);
?>
<!DOCTYPE html>
<html>
<body style="background-color: <?php echo $color; ?>">
	<p style="color: <?php echo sprintf("#%'02X%'02X%'02X", 255-$R, 255-$G, 255-$B); ?>; text-shadow: 1px 1px black">
	Current Color : <?php echo $color." (R:".$R." G:".$G." B:".$B.")"; ?>
	</p>
	<hr/>
	<form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
		R: <?php printf("%'03d [%'02s]", $R, strtoupper(dechex($R))); ?>
		<input type="range" name="R" min="0" max="255" value="<?php echo $R ?>"><br/>

		G: <?php printf("%'03d [%'02s]", $G, strtoupper(dechex($G))); ?>
		<input type="range" name="G" min="0" max="255" value="<?php echo $G ?>"><br/>

		B: <?php printf("%'03d [%'02s]", $B, strtoupper(dechex($B))); ?>
		<input type="range" name="B" min="0" max="255" value="<?php echo $B ?>"><br/>

		<br/>
		<input type="submit" value="GO">
	</form>
	<br/>
</body>
</html>