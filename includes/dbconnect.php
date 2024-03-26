<?php
$host       = "localhost";
$user       = "root";
$password   = "";
$database   = "CLE_3";

$db = mysqli_connect($host, $user, $password, $database)
or die("Error: " . mysqli_connect_error());
