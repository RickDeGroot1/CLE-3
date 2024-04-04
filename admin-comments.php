<?php
/** @var mysqli $db */
require_once 'includes/dbconnect.php';

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
    <title>Comment overzicht</title>
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
    <h2 id="admin-title">Comments</h2>
    <table id="admin-list">
        <tr>
            <th>#</th>
            <th>Station-id</th>
            <th>Comment</th>
            <th>Lift</th>
            <th>Escalator</th>
            <th>Delete</th>
        </tr>
        <?php foreach ($comments as $index => $comment) { ?>
            <tr>
                <td><?= $index + 1 ?></td>
                <td><?= $comment['station_id'] ?></td>
                <td><?= $comment['comment'] ?></td>
                <td><?= $comment['lift'] ?></td>
                <td><?= $comment['escalator'] ?></td>
                <td>
                    <a href="comments-delete.php?id=<?= $comment['id']; ?>">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</main>
</body>
</html>
