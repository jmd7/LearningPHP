<!DOCTYPE html>
<html>
<?php if ($errors) { ?>
		<ul><li>
			<?php echo implode("</li><li>", $errors); ?>
		</li></ul>
<?php } ?>
<style>
	table {border-collapse: collapse;}
	th {background-color:navy; color:white; font-weight:bold; padding: 8px;}
	td {background-color:LightGoldenRodYellow;padding: 8px;}
	td.caption { text-align: right;}
	input[type="submit"] {width:100%;}
</style>
<form method="POST" action="<?= $_SERVER["PHP_SELF"] ?>">
	<table>
		<tr>
			<th>Product</th>
			<th>Quantity</th>
		</tr>
		<?php foreach ($GLOBALS["cart"] as $k => $v) { ?>
			<tr>
				<td class="caption"><?= ucwords($k) ?></td>
				<td><?= $form->input("text", ["name" => $k]) ?></td>
			</tr>
		<?php } ?>
		<tr><td/><td/></tr>
		<tr>
			<td colspan="2"><?= $form->input("submit", ["value" => "Order"]) ?></td>
		</tr>
	</table>
</form>
</html>
