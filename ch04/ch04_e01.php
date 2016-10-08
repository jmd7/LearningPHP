<!DOCTYPE html>
<html>
	<style>
		table {margin: auto; padding: 6px; border-collapse: collapse;}
		th {background: Navy; padding: 3px; color: white;}
		td {padding: 3px; text-align: center; color: black; border: 1px solid black;}
		td.population {text-align: right;}
		tr.odd {background: LightGrey;}
		tr.even {background: LightGoldenRodYellow;}
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

			$total = 0;
			$idx = 1;
			foreach ($city_population as $city => $values) {
				$tr_class = ($idx % 2 == 1? " class='odd'" : " class='even'");
				print "<tr$tr_class>";

				print "<td>$city</td>";
				print "<td>$values[0]</td>";
				print "<td class='population'>";
				printf(number_format($values[1]));
				print "</td>";
				print "</tr>";

				$total += $values[1];
				$idx++;
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