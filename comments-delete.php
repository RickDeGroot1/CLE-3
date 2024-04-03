<?php
if (!isset($_GET['id']) || $_GET['id'] == '') {
    header('Location: admin-comments.php');
    exit;
}

$id = $_GET['id'];

/** @var mysqli $db */
require_once 'includes/dbconnect.php';

$query = 'SELECT * FROM comments WHERE id ='.$id;

$result = mysqli_query($db, $query)
or die('Error '.mysqli_error($db).' with query '.$query);

if(mysqli_num_rows($result) != 1) {
    header('Location: admin-comments.php');
    exit;
}

if(isset($_POST['submit'])) {
    $query = "DELETE FROM `comments` WHERE id =" .$id;

    $result = mysqli_query($db, $query)
    or die('Error '.mysqli_error($db).' with query '.$query);

    header('Location: admin-comments.php');
    exit;
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
    <link rel="stylesheet" href="styles/admin.css">
    <title>Reiswijs</title>
</head>
<body>
<div>
    <section>
        <div>
            <h2>Weet je zeker dat je deze comment wilt verwijderen?</h2>

            <form action="" method="post">
                <button type="submit" name="submit">Verwijder comment</button>
            </form>

            <a href="admin-comments.php">« Ga terug</a>
        </div>
    </section>
</div>
</body>
</html>
