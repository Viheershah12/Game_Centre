<?php

ob_start();
session_start();

$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'gaming-center';
$con = mysqli_connect($host,$user,$password,$dbname);
?>