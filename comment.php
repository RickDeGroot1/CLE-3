<?php

require_once 'includes/dbconnect.php';
/** @var mysqli $db */

$station_id = $comment = $lift = $escalator = '';

// Als het formulier is gesubmit
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $station_id = $_POST['dropdown'];
    $comment = isset($_POST['comment']) ? $_POST['comment'] : '';
    $lift = isset($_POST['lift']) ? $_POST['lift'] : '';
    $escalator = isset($_POST['escalator']) ? $_POST['escalator'] : '';

    // Voeg de comment toe aan de database
    $sql = "INSERT INTO comments (station_id, comment, lift, escalator) VALUES ('$station_id', '$comment', '$lift', '$escalator')";
    if ($db->query($sql) === TRUE) {
        // Redirect to comment-confirmation.php
        header("Location: comment-confirmation.php");
        exit(); // Ensure script stops execution after redirection
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
    <link rel="stylesheet" href="styles/style.css">
    <script src="js/comment.js"></script>
    <title>Reiswijs comments</title>
</head>
<body>
<header>
    <?php
    require_once 'includes/navbar.php';
    ?>
</header>

<main>
    <form id="comment-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <h1>Maak een melding</h1>

        <div class="comment-section">
            <label for="station" class="comment-label">Over welk station wilt u een melding maken?</label>
            <br>
            <select name="dropdown" id="dropdown">
                <option value="">Selecteer een station</option>
                <?php
                // Zorg ervoor dat alle stations in de dropdown menu verschijnen en onthoud id
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<option value='".$row["id"]."'";
                        if ($row["id"] == $station_id) {
                            echo " selected";
                        }
                        echo ">".$row["station"]."</option>";
                    }
                }
                ?>
            </select>
        </div>

        <div class="comment-section" id="lift_radios">
            <p class="comment-label">Hoeveel liften werken niet?</p>
        </div>

        <div class="comment-section" id="escalator_radios">
            <p class="comment-label">Hoeveel roltrappen werken niet?</p>
        </div>

        <div class="comment-section">
            <label for="comment" class="comment-label">Zijn er nog andere bijzonderheden?</label></p>
            <textarea name="comment" rows="4" cols="50"><?php echo $comment; ?></textarea>
        </div>

        <div class="comment-section">
            <input id="form-submit" type="submit" value="Verstuur melding">
        </div>

    </form>
</main>

</body>
</html>
