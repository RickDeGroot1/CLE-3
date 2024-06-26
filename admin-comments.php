<?php
/** @var mysqli $db */
require_once 'includes/dbconnect.php';

require_once 'includes/secure.php';

$query = 'SELECT * FROM comments';

$result = mysqli_query($db, $query)
or die ('Error '.mysqli_error($db).' with query '.$query);

$comments = [];

while ($row = mysqli_fetch_assoc($result)) {
    $comments[] = $row;
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
    <title>Melding overzicht</title>
</head>
<body>
<header>
    <?php
    require_once 'includes/navbar.php';
    ?>
</header>

<main>
    <h2 id="admin-title">Meldingen</h2>
    <table id="admin-list">
        <tr>
            <th>#</th>
            <th>Station-id</th>
            <th>Opmerking</th>
            <th>Lift(en)</th>
            <th>Roltrap(pen)</th>
            <th>Verwijderen</th>
        </tr>
        <?php foreach ($comments as $index => $comment) { ?>
            <tr>
                <td><?= $index + 1 ?></td>
                <td><?= $comment['station_id'] ?></td>
                <td><?= $comment['comment'] ?></td>
                <td><?= $comment['lift'] ?></td>
                <td><?= $comment['escalator'] ?></td>
                <td>
                    <a href="comments-delete.php?id=<?= $comment['id']; ?>">Verwijderen</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</main>
</body>
</html>
