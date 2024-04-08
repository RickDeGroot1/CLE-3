<?php
/** @var mysqli $db */
require_once 'includes/dbconnect.php';

if (isset($_POST['submit'])){

    $station = mysqli_real_escape_string($db,$_POST['station']);
    $lift = mysqli_real_escape_string($db,$_POST['lift']);
    $escalator = mysqli_real_escape_string($db,$_POST['escalator']);

//    /** @var mysqli $formValidation */
//    require_once 'form-validation.php';

//    if ($formValidation){
        $query = "INSERT INTO stations (`station`,`lift`,`escalator`)
                VALUES ('$station','$lift','$escalator')";

        $result = mysqli_query($db, $query)
        or die('Error '.mysqli_error($db).' with query '.$query);

        header('location: admin-stations.php');
        exit;
//    }
}
?>



<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles/style.css">
    <title>Reiswijs voeg station toe</title>
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



<form id="comment-form" action="" method="post">
    <h1>Voeg een station toe</h1>

    <div class="comment-section">
        <label class="comment-label" for="station">Station</label>
        <br>
        <input type="text" id="station" name="station">
    </div>

    <div class="comment-section">
        <label class="comment-label" for="lift">Lift</label>
        <br>
        <input type="number" id="lift" name="lift">
    </div>

    <div class="comment-section">
        <label class="comment-label" for="escalator">Roltrap</label>
        <br>
        <input type="number" id="escalator" name="escalator">
    </div>

    <div class="comment-section">
        <input name="submit" type="submit">
    </div>
</form>

</body>
</html>