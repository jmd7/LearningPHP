<?php
$name = 'Umberto';
function say_hello() {
    print 'Hello, ';
    //global can not be used in print
    //print global $name;
    global $name;
    print $name;
}
say_hello();
?>
