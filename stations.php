<?php

/** @var mysqli $db */
require_once 'includes/dbconnect.php';

$query = 'SELECT station FROM stations';

$result = mysqli_query($db, $query)
or die ('Error '.mysqli_error($db).' with query '.$query);

$users = [];

while ($row = mysqli_fetch_assoc($result)) {
    $users[] = $row;
}

mysqli_close($db);
?>