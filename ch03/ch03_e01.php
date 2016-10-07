<?php
	print "<!DOCTYPE html><pre>\n";

	//100.00 -100 : false
	printf("%25s : ", "100.00 - 100");
	if (100.00 - 100) print "true";
		else print "false";
	print "\n";

	//"zero" : true
	printf("%25s : ", "\"zero\"");
	if ("zero") print "true";
		else print "false";
	print "\n";

	//"false" : true
	printf("%25s : ", "\"false\"");
	if ("false") print "true";
		else print "false";
	print "\n";

	//0 + "true" : true XXXXXXXXXXX> false
	printf("%25s : ", "0 + \"true\"");
	if (0 + "true") print "true";
		else print "false";
	print "\n";

	//0.000 : false
	printf("%25s : ", "0.000");
	if (0.000) print "true";
		else print "false";
	print "\n";

	//"0.0" : true
	printf("%25s : ", "\"0.0\"");
	if ("0.0") print "true";
		else print "false";
	print "\n";

	//strcmp("false", "False") : false XXXXXXXXXXX> true
	printf("%25s : ", "strcmp(\"false\", \"False\")");
	if (strcmp("false", "False")) print "true";
		else print "false";
	print "\n";

	//0 <=> "0" : true XXXXXXXXXXX> false
	printf("%25s : ", "0 <=> \"0\"");
	if (0 <=> "0") print "true";
		else print "false";
	print "\n";

	print "</pre>";
?>