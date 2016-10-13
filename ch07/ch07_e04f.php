<!DOCTYPE html>
<html>
<?php
	print "<ul>";
	if ($errors) {
		foreach ($errors as $err) {
			print "<li>".$form->encode($err)."</li>";
		}
	}
	print "</ul>";
?>
<style>
	table {border-collapse: collapse;}
	tr {background-color: LightGoldenRodYellow;}
	td {padding: 5px;}
	td.group {font-weight: bold; text-decoration: underline; color: DarkRed;}
	td.title {text-align: right; }
</style>
<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	<table>
	<tr><td class="group title">From Address</td><td></td></tr>
		<tr><td class="title">Address</td><td><?= $form->input("text", ["name"=>"from_addr"]); ?></td></tr>
		<tr><td class="title">State</td><td><?= $form->select($GLOBALS["us_states"], ["name"=>"from_state"]); ?></td></tr>
		<tr><td class="title">Zip Code</td><td><?= $form->input("text", ["name"=>"from_zip"]); ?></td></tr>
	<tr><td class="group title">To Address</td><td></td></tr>
		<tr><td class="title">Address</td><td><?= $form->input("text", ["name"=>"to_addr"]); ?></td></tr>
		<tr><td class="title">State</td><td><?= $form->select($GLOBALS["us_states"], ["name"=>"to_state"]); ?></td></tr>
		<tr><td class="title">Zip Code</td><td><?= $form->input("text", ["name"=>"to_zip"]); ?></td></tr>
	<tr><td class="group title">Dimension (inch)</td><td></td></tr>
		<tr><td class="title">Length</td><td><?= $form->input("text", ["name"=>"length"]); ?></td></tr>
		<tr><td class="title">Width</td><td><?= $form->input("text", ["name"=>"width"]); ?></td></tr>
		<tr><td class="title">Height</td><td><?= $form->input("text", ["name"=>"height"]); ?></td></tr>
	<tr><td class="group title">Weight (pound)</td><td><?= $form->input("text", ["name"=>"weight"]); ?></td></tr>
	</table>
	<p/>
	<?= $form->input("submit", ["value"=>"Validate"]); ?><br/>
</form>
<hr/>
<?php if (isset($args) && count($args) > 0) { ?>
	<table>
		<tr>
			<td class="title">From : </td>
			<td><?= $args["from_addr"]." , ".$args["from_state"]." ".$args["from_zip"] ?></td>
		</tr>
		<tr>
			<td class="title">To : </td>
			<td><?= $args["to_addr"]." , ".$args["to_state"]." ".$args["to_zip"] ?></td>
		</tr>
		<tr>
			<td class="title">Dimension (inch) : </td>
			<td><?= $args["length"]."x".$args["width"]."x".$args["height"] ?></td>
		</tr>
		<tr>
			<td class="title">Weight (pound) : </td>
			<td><?= $args["weight"] ?></td>
		</tr>
	</table>
<?php } ?>
</html>