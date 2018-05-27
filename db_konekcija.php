<?php

error_reporting(0);

$mysql_host = "localhost";
$mysql_database = "turistba";
$mysql_user = "root";
$mysql_password = "";

$con=  mysql_connect($mysql_host,$mysql_user,$mysql_password);
if(!$con)
    die("Konekcija sa bazom nije uspjela! Greška: "+  mysql_error());


$chosenDB=mysql_select_db($mysql_database);
mysql_query ("SET NAMES utf8");
mysql_query ("SET CHARACTER SET  utf8");
mysql_query ("SET COLLATION_CONNECTION='utf8_unicode_ci'");

if(!$chosenDB)
    die("Povezivanje sa bazom nije uspješno! Greška: "+  mysql_error());

?>
