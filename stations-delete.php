<?php
if (!isset($_GET['id']) || $_GET['id'] == '') {
    header('Location: admin-stations.php');
    exit;
}

$id = $_GET['id'];

/** @var mysqli $db */
require_once 'includes/dbconnect.php';

$query = 'SELECT * FROM stations WHERE id ='.$id;

$result = mysqli_query($db, $query)
or die('Error '.mysqli_error($db).' with query '.$query);

if(mysqli_num_rows($result) != 1) {
    header('Location: admin-stations.php');
    exit;
}

if(isset($_POST['submit'])) {
    $query = "DELETE FROM `stations` WHERE id =" .$id;

    $result = mysqli_query($db, $query)
    or die('Error '.mysqli_error($db).' with query '.$query);

    header('Location: admin-stations.php');
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
    <link rel="stylesheet" href="styles/style.css">
    <title>Reiswijs verwijder station</title>
</head>
<body>
<header>
    <nav>
        <div>
            <img src="images/logo.PNG" alt="logo" id="logo-image">
        </div>
        <div id="nav-link">
            <div>
                <a href="index.php">Home</a>
            </div>
            <div>
                <a href="comment.php">Melding maken</a>
            </div>
        </div>
    </nav>
</header>
<body>
<div>
    <section>
        <div class="confirmation-container">
            <h1>Weet je zeker dat je dit station wilt verwijderen?</h1>

            <form action="" method="post">

                <button class="back-to-home" type="submit" name="submit">Verwijder station</button>

            </form>

            <a href="admin-home.php">
                <button class="back-to-home"> Ga terug</button>
            </a>
        </div>
    </section>
</div>
</body>
</html>
