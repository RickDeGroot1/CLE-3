<?php

/** @var mysqli $db */
require_once 'includes/dbconnect.php';

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
    <nav>
        <div>
            <img src="images/logo.PNG" alt="logo" id="logo-image">
        </div>
        <div id="nav-link">
            <div>
                <a href="admin-home.php">Home</a>
            </div>
            <div>
                <a href="logout.php">Uitloggen</a>
            </div>
        </div>
    </nav>
</header>

<main>
    <h2>Stations</h2>
    <a href="add-station.php">Voeg nieuwe station toe</a>
    <table>
        <thead>
        <tr>
            <th>#</th>
            <th>Station</th>
            <th>Lift</th>
            <th>Escalator</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($stations as $index => $station) { ?>
            <tr>
                <td><?= $index + 1 ?></td>
                <td><?= $station['station'] ?></td>
                <td><?= $station['lift'] ?></td>
                <td><?= $station['escalator'] ?></td>
                <td>
                    <a href="stations-delete.php?id=<?= $station['id']; ?>">delete</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</main>
</body>
</html>
