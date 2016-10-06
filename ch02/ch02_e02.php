<?php
	$hamburger = 4.95;
	$milkshake = 1.95;
	$cola = 0.85;

	$price = $hamburger * 2 + $milkshake + $cola;
	$tip = $price * 0.16;
	$tax = $price * 0.075;

	$total = $price + $tip + $tax;

	$br = "<br/>";

	print "Hamburger: \$$hamburger $br";
	print "Chocolate Milk Shake: \$$milkshake $br";
	print "Cola: \$$cola $br";
	print $br;
	print "Total: \$$total within tax \$$tax and tip \$$tip. $br";
	printf("Total: $%.2f within tax $%.2f and tip $%.2f.", $total, $tax, $tip);

	print $br;
?>