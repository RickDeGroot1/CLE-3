<?php
/** @var mysqli $db */
require_once 'includes/dbconnect.php';

// Code for processing the form goes here

// Query to fetch all station options
$sql = "SELECT * FROM stations";
$result = $db->query($sql);

// Close the database connection
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
</head>
<body>

<form action="process_form.php" method="post">
    <label for="dropdown">Station:</label>
    <select name="dropdown" id="dropdown">
        <option value="">Selecteer een station</option>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<option value='".$row["id"]."'>".$row["station"]."</option>";
            }
        }
        ?>
    </select>
    <br><br>

    <?php
    // Query to get the number of lifts and escalators for the selected station
    if (isset($_POST['dropdown']) && !empty($_POST['dropdown'])) {
        $station_id = $_POST['dropdown'];
        $sql = "SELECT lift, escalator FROM stations WHERE id = $station_id";
        $result = $db->query($sql);

        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $lift_count = $row['lift'];
            $escalator_count = $row['escalator'];

            // Generate checkboxes for lifts
            echo "<label for='lift'>Lift:</label>";
            for ($i = 1; $i <= $lift_count; $i++) {
                echo "<input type='checkbox' id='lift$i' name='lift[]' value='$i'><label for='lift$i'>$i</label> ";
            }
            echo "<br><br>";

            // Generate checkboxes for escalators
            echo "<label for='escalator'>Roltrap:</label>";
            for ($i = 1; $i <= $escalator_count; $i++) {
                echo "<input type='checkbox' id='escalator$i' name='escalator[]' value='$i'><label for='escalator$i'>$i</label> ";
            }
            echo "<br><br>";
        }
    }
    ?>

    <label for="comment">Commentaar:</label>
    <input type="text" id="comment" name="comment"><br><br>

    <input type="submit" value="Verzenden">
</form>

</body>
</html>
