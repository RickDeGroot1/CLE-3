<?php

require_once 'includes/dbconnect.php';
/** @var mysqli $db */


// Als het formulier is gesubmit
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $station_id = $_POST['dropdown'];
    $comment = isset($_POST['comment']) ? $_POST['comment'] : '';
    $lift = isset($_POST['lift']) ? $_POST['lift'] : '';
    $escalator = isset($_POST['escalator']) ? $_POST['escalator'] : '';

    // Voeg de comment toe aan de database
    $sql = "INSERT INTO comments (station_id, comment, lift, escalator) VALUES ('$station_id', '$comment', '$lift', '$escalator')";
    if ($db->query($sql) === TRUE) {
        echo "Comment is succesvol toegevoegd";
    } else {
        echo "Error: " . $sql . "<br>" . $db->error;
    }
}

// Alle stationopties op te halen
$sql = "SELECT * FROM stations";
$result = $db->query($sql);

mysqli_close($db);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Comment add</title>
    <script src="js/comment.js"></script>
</head>
<body>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <label for="dropdown">Station:</label>
    <select name="dropdown" id="dropdown">
        <option value="">Selecteer een station</option>
        <?php
        // Zorg ervoor dat alle stations in de dropdown menu verschijnen en onthoud id
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<option value='".$row["id"]."'>".$row["station"]."</option>";
            }
        }
        ?>
    </select>
    <br><br>

    <!-- Hier komen de radio buttons voor de lift -->
    <div id="lift_radios"></div>

    <!-- Hier komen de radio buttons voor de roltrap -->
    <div id="escalator_radios"></div>

    <label for="comment">Commentaar:</label>
    <input type="text" id="comment" name="comment"><br><br>

    <input type="submit" value="Verzenden">
</form>

</body>
</html>
