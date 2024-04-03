<?php
/** @var mysqli $db */

require_once 'dbconnect.php';

$queryStations = "SELECT * FROM stations";
$resultStations = mysqli_query($db, $queryStations);
$stationsData = mysqli_fetch_all($resultStations, MYSQLI_ASSOC);


$queryComments = "SELECT * FROM comments";
$resultComments = mysqli_query($db, $queryComments);
$commentsData = mysqli_fetch_all($resultComments, MYSQLI_ASSOC);

$data = array(
    'stations' => $stationsData,
    'comments' => $commentsData
);

header('Content-Type: application/json');

echo json_encode($data);

mysqli_close($db);
?>