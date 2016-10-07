<?php
	print "<!DOCTYPE html><pre>\n";

	//Output:
	//Message 3.
	//Age: 12. Shoe Size: 14
	$age = 12;
	$shoe_size = 13;
	if ($age > $shoe_size) {
		print "Message 1.";
	} else if (($shoe_size++) && ($age > 20)) {
		print "Message 2.";
	} else {
		print "Message 3.";
	}
	print "\nAge: $age. Shoe Size: $shoe_size";

	print "\n</pre>";
?>