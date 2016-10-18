<?php 
	//session_start(); 
	session_id($_GET["sid"]);
?>
<!DOCTYPE HTML>
<html style='background-color: <?php if (isset($_SESSION["color_picked"])) echo $_SESSION["color_picked"]; ?> ;'>
</html>
