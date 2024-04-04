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
    <title>Document</title>
</head>
<body>

<form action="" method="post">
    <label for="station">Station</label>
    <input type="text" id="station" name="station">

    <label for="lift">Lift</label>
    <input type="number" id="lift" name="lift">

    <label for="escalator">Roltrap</label>
    <input type="number" id="escalator" name="escalator">

    <input name="submit" type="submit">
</form>

</body>
</html>