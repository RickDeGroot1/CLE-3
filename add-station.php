<?php
/** @var mysqli $db */
require_once 'includes/dbconnect.php';

if (isset($_POST['submit'])){

    $station = mysqli_real_escape_string($db,$_POST['station']);
    $lift = mysqli_real_escape_string($db,$_POST['genre']);
    $escalator = mysqli_real_escape_string($db,$_POST['year']);

//    /** @var mysqli $formValidation */
//    require_once 'form-validation.php';

//    if ($formValidation){
        $query = "INSERT INTO stations (`station`,`lift`,`escalator`)
                VALUES ('$station','$lift','$escalator')";

        $result = mysqli_query($db, $query)
        or die('Error '.mysqli_error($db).' with query '.$query);

        header('location: admin-station.php');
        exit;
//    }
}
?>