<?php

require_once 'includes/dbconnect.php';
/** @var mysqli $db */

// Kijk of er een station id is meegegeven
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['stationId'])) {

    $stationId = mysqli_real_escape_string($db, $_POST['stationId']);

    // Haal het aantal liften en roltrappen op vanuit de database van aangegeven station
    $sql = "SELECT lift, escalator FROM stations WHERE id = $stationId";
    $result = $db->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $lifts = $row['lift'];
        $escalators = $row['escalator'];

        // stop de liften en roltrappen in json
        echo json_encode(array('lifts' => $lifts, 'escalators' => $escalators));
    } else {
        // wanneer er geen liften of roltrappen zijn maak je ze 0
        echo json_encode(array('lifts' => 0, 'escalators' => 0));
    }
} else {
    // als er geen station id is
    http_response_code(400);
    echo json_encode(array('error' => 'Geen station ID'));
}
?>
