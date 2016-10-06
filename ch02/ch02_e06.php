<?php
	$hamburger = 4.95;	//Hamburger
	$milkshake = 1.95;	//Chocolate Milk Shake
	$cola      = 0.85;	//Coke
	$tip_rate  = 0.16;	//Tip rate
	$tax_rate  = 0.075;	//Tax rate

	//Build an array for each line in the receipt
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

	/*
		To output a right-aligned "TD" cell within a float number
		which has 2 digits after the decimal point.
		If the parameter is not a float, only right-align it in the TD cell.
	 */
	function float_or_space($value) {
		if (is_float($value) && 0 != $value){
			printf("<td class='td-float'>%.2f</td>", $value);
		} else if ("" === trim($value)) {
			print "<td></td>";
		} else {
			print "<td class='td-float'>".$value."</td>";
		}
	}
?>

<!DOCTYPE html>
<html>
	<style>
		table,th,td { margin-left: auto; margin-right: auto; border:0px; border-collapse:collapse;}
		th {background: navy; padding:6px; text-align: center; color: white;}
		td {background: LightGoldenRodYellow; padding:6px; text-align: center; color: black;}
		.td-float {background: LightGoldenRodYellow; padding:6px; text-align: right; color: black;}
		.tr-divide {border-top:2px dotted black;}
		.tr-total {border-top:2px solid black;}
	</style>
	<body>
		<table>
		<tr>
			<th>Name</th>
			<th>Price</th>
			<th>Quantity</th>
			<th>Amount</th>
		</tr>
		<?php
			foreach ($list as $caption => $cells) {
				$border = "";
				if ("tax" == $caption) {
					$border = " class='tr-divide'";
				} else if ("total" == $caption) {
					$border = " class='tr-total'";
				} else if ("subtotal" == $caption) {
					$border = " class='tr-total'";
				}

				print "<tr".$border.">";
				print float_or_space(ucwords($caption));
				print float_or_space($cells[0]);
				print "<td>".$cells[1]."</td>";
				print float_or_space($cells[2]);
				print "</tr>";
			}
		?>
		</table>
	</body>
</html>
