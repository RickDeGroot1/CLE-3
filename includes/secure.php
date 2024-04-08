<?php

//check if user is logged in
$loggedin = false;
session_start();
$loggedin = $_SESSION['loggedin'];

//if user is not logged send them back to the index
if (!$loggedin) {
    header("location: index.php");
    exit;
}