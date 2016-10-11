<?php
	//noodle = barbecued pork
	//sweet = [puff | ricemeat]
	//sweet_q = 4
	//submit = Order
	foreach ($_POST as $k=>$v) {
		if (is_array($v)) {
			print "$k = [".implode(" | ", $v)."]<br/>";
		} else {
			print $k." = ".$v."<br/>";
		}
	}
?>
<!DOCTYPE html>
<form method="POST" action="<?php echo $_SERVER["PHP_SELF"] ?>">
Braised Noodles with: <select name="noodle">
<option>crab meat</option>
<option>mushroom</option>
<option>barbecued pork</option>
<option>shredded ginger and green onion</option>
</select>
<br/>
Sweet: <select name="sweet[]" multiple>
<option value="puff"> Sesame Seed Puff
<option value="square"> Coconut Milk Gelatin Square
<option value="cake"> Brown Sugar Cake
<option value="ricemeat"> Sweet Rice and Meat
</select>
<br/>
Sweet Quantity: <input type="text" name="sweet_q">
<br/>
<input type="submit" name="submit" value="Order">
</form>
</html>
