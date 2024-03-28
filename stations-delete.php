<?php
if (!isset($_GET['id']) || $_GET['id'] == '') {
    header('Location: index.php');
    exit;
}

$id = $_GET['id'];

/** @var mysqli $db */
require_once 'includes/dbconnect.php';

$query = 'SELECT * FROM stations WHERE id ='.$id;

$result = mysqli_query($db, $query)
or die('Error '.mysqli_error($db).' with query '.$query);

if(mysqli_num_rows($result) != 1) {
    header('Location: index.php');
    exit;
}

if(isset($_POST['submit'])) {
    $query = "DELETE FROM `stations` WHERE id =" .$id;

    $result = mysqli_query($db, $query)
    or die('Error '.mysqli_error($db).' with query '.$query);

    header('Location: index.php');
    exit;
}
mysqli_close($db);
?>