<?php

/** @var mysqli $db */
require_once 'includes/dbconnect.php';

require_once 'includes/secure.php';

$query = 'SELECT * FROM stations';

$result = mysqli_query($db, $query)
or die ('Error '.mysqli_error($db).' with query '.$query);

$stations = [];

while ($row = mysqli_fetch_assoc($result)) {
    $stations[] = $row;
}

mysqli_close($db);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/admin.css">
    <title>Station overzicht</title>
</head>
<body>
<header>
    <?php
    require_once 'includes/navbar.php';
    ?>
</header>

<main>
    <h2 id="admin-title">Stations</h2>
    <a href="add-station.php">
        <button id="add-station">Voeg nieuwe station toe</button></a>
    <table id="admin-list">
        <tr>
            <th>#</th>
            <th>Station</th>
            <th>Lift(en)</th>
            <th>Roltrap(pen)</th>
            <th>Verwijderen</th>
        </tr>
        <?php foreach ($stations as $index => $station) { ?>
            <tr>
                <td><?= $index + 1 ?></td>
                <td><?= $station['station'] ?></td>
                <td><?= $station['lift'] ?></td>
                <td><?= $station['escalator'] ?></td>
                <td>
                    <a href="stations-delete.php?id=<?= $station['id']; ?>">Verwijderen</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</main>
</body>
</html>
