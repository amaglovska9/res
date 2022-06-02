<?php 
session_start(); 

include "database.php";
include "access.php" ;
access('ADMIN');
header("Location: ../#!rezultati");
?>
