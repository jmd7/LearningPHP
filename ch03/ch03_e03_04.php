<!DOCTYPE html>
<html>
	<style>
		table {margin-left: auto; margin-right: auto; border:0px; border-collapse:collapse;}
		th {background: navy; padding:6px; text-align: center; color: white;}
		td {padding:3px; text-align: center; color: black;}
		td.divide {border-left:2px dotted black;}
		td.leftalign {text-align: left}
		td.rightalign {text-align: right}
		tr.odd {background: lightgrey}
		tr.even {background: LightGoldenRodYellow}
	</style>
	<body>
		<table>
			<tr>
				<th>Fahrenheit</th>
				<th></th>
				<th>Celsius</th>
				<th>Celsius</th>
				<th></th>
				<th>Fahrenheit</th>
			</tr>
			<?php
				for ($idx = -50; $idx <= 50; $idx += 5) {
					if (abs($idx % 10) == 5) print "<tr class='even'>";
						else print "<tr class='odd'>";
					printf("<td class='rightalign'>%d (F)</td>", $idx);
					print "<td>=</td>";
					printf("<td class='leftalign'>%.2f (C)</td>", ($idx-32)*5/9);
					printf("<td class='divide rightalign'>%d (C)</td>", $idx);
					print "<td>=</td>";
					printf("<td class='leftalign'>%d (F)</td>", $idx*9/5+32);
					print "</tr>";
				}
			?>
		</table>
	</body>
</html>