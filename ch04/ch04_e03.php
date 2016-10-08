<?php
	function calc_state($list) {
		$state = [];
		foreach ($list as $key => $value) {
			if (array_key_exists($value[0], $state)) {
				$state[$value[0]] += $value[1];
			} else {
				$state[$value[0]] = $value[1];
			}
		}
		ksort ($state);
		return $state;
	}
?>
<!DOCTYPE html>
<html>
	<style>
		table {margin: auto; padding: 6px; border-collapse: collapse;}
		th {background: Navy; padding: 3px; color: white;}
		td {padding: 3px; text-align: center; color: black; border: 1px solid black;}
		td.population {text-align: right;}
		tr.odd {background: LightGrey;}
		tr.even {background: LightGoldenRodYellow;}
		tr.subtotal {border-top: 2px dotted black;}
		tr.bold {font-weight: bold;}
		tr.total {border-top: 3px double black;font-weight: bold;}
	</style>
	<body>
		<table>
			<tr>
				<th>City</th>
				<th>State</th>
				<th>Population</th>
			</tr>
		<?php
			$city_population = array(
				"New York" => ["NY", 8175133],
				"Los Angeles" => ["CA", 3792621],
				"Chicago" => ["IL", 2695598],
				"Houston" => ["TX", 2100263],
				"Philadelphia" => ["PA", 1526006],
				"Phoenix" => ["AZ", 1445632],
				"San Antonio" => ["TX", 1327407],
				"San Diego" => ["CA", 1307402],
				"Dallas" => ["TX", 1197816],
				"San Jose" => ["CA", 945942],
				);

			$idx = 1;
			foreach ($city_population as $city => $values) {
				$tr_class = ($idx++ % 2 == 1? " class='odd'" : " class='even'");
				print "<tr$tr_class>";

				print "<td>$city</td>";
				print "<td>$values[0]</td>";
				print "<td class='population'>";
				printf(number_format($values[1]));
				print "</td>";
				print "</tr>";
			}

			$total = 0;
			$states = calc_state($city_population);
			$first = true;
			foreach ($states as $k => $v) {
				$tr_class = ($idx++ % 2 == 1? " class='odd bold" : " class='even bold");
				if ($first) {
					$tr_class .= " subtotal";
				}
				$tr_class .="'";
				print "<tr$tr_class>";
				print "<td>".($first ? "Subtotal" : "")."</td>";
				print "<td>$k</td>";
				print "<td class='population'>".number_format($v)."</td>";
				print "</tr>";

				$total += $v;
				$first = false;
			}

			$tr_class = ($idx % 2 == 1? " class='odd total'" : " class='even total'");
			print "<tr$tr_class>";
			print "<td>Total</td>";
			print "<td>-</td>";
			print "<td class='population'>".number_format($total)."</td>";
			print "</tr>";
		?>
		</table>
	</body>
</html>