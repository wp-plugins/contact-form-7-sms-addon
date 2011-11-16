<?php

require( '../classes/cf7-sms.class.php' );

$wpcf7_sms = new WPCF7_SMS();

print_r($wpcf7_sms->send_test($_GET['user'], $_GET['pass'], $_GET['to']));
?>

