<?php
$DB_HOST='basededatospiclab.c4uosfht3hej.us-east-1.rds.amazonaws.com';
$DB_NAME= "galeria";
$DB_USER= 'jjgb';
$DB_PASS= 'JJGB6572019';
	# conectare la base de datos
    $con=@mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
    if(!$con){
        die("imposible conectarse: ".mysqli_error($con));
    }
    if (@mysqli_connect_errno()) {
        die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());
    }

?>

