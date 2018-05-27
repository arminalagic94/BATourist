<?php
include "db_konekcija.php";
session_start();
session_destroy();
header('Location:index.php');
?>
