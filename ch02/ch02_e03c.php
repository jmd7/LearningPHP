﻿<?php
	$hamburger = 4.95;
	$milkshake = 1.95;
	$cola = 0.85;
	$tip_rate = 0.16;
	$tax_rate = 0.075;

	$list = array(
		'hamburger'=>[$hamburger, 2],
		'milkshake'=>[$milkshake, 1],
		'cola'=>[$cola, 1]
		);

	$price = 0;
	$amount = 0;
	foreach ($list as $name => $cells) {
		$list[$name][] = $cells[0] * $cells[1];
		$price += $list[$name][2];
		$amount += $list[$name][1];
	};
	$list['subtotal'] = array("-", $amount, $price);
	$list['tax'] = array($tax_rate, "-", $price * $tax_rate);
	$list['subtotal + tax'] = array("-", "-", $price + $list["tax"][2]);
	$list['tip'] = array($tip_rate, "-", $price * $tip_rate);
	$list['total'] = array("-", $amount, $price + $list["tax"][2] + $list["tip"][2]);

	$br = "\n";

	function print_divide($num, $chr = "=") {
		printf("%'".$chr.$num."s","");
		print "\n";
	}
?>
<!DOCTYPE html>
<html>
<body>
<pre>
<?php 
printf("%15s %10s %10s %10s", "Name", "Price", "Quantity", "Amount");
print $br;
print_divide(48);
foreach ($list as $caption => $cells) {
	if ("subtotal" == $caption) print_divide(48);
	if ("tax" == $caption) print_divide(48, "-");
	if ("total" == $caption) print_divide(48);

	printf("%15s %10.2f %10s %10.2f", ucwords($caption), $cells[0], $cells[1], $cells[2]);
	print $br;
}
?>
</pre>
</body>
</html>
