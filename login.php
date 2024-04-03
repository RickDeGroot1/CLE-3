<?php
session_start();

/** @var mysqli $db */
require_once 'includes/dbconnect.php';

$errors = array();

if (isset($_POST['submit'])){

    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if ($username == '' || $username = ' '){
    print_r($errors);
    }

    if ($password == '' || $password = ' '){
        print_r($errors);
    }

    else{
        $query = "SELECT username, password
        FROM users WHERE username=".$username;

        $result = mysqli_query($db,$query)
        or die('Error'. mysqli_error($db). 'with query'. $query);

        $SESSION['username'] = $_POST['username'];

        header('location: secure.php');
        exit;
    }
}
?>