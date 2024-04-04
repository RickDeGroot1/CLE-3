<?php
/** @var mysqli $db */
require_once 'includes/dbconnect.php';
//require_once 'includes/getStations.php';
//header('Content-Type: text/html ');

//code
$query = "SELECT * FROM stations";

$result = mysqli_query($db, $query)
or die('Error '.mysqli_error($db).' with query '.$query);

$stations = mysqli_fetch_all($result, MYSQLI_ASSOC);

"var databaseInfo = " . json_encode($result) . ";";

$startStation = '';
$targetStation = '';

$errors = [];

if (empty($_POST['beginbestemming'])) {
    $errors['noStation'] = 'Selecteer beide een startstation en een eindstation';
}

if (empty($_POST['eindbestemming'])) {
    $errors['noStation'] = 'Selecteer beide een startstation en een eindstation';
}

if (isset($_POST['submit'])) {
    if (!empty($_POST['beginbestemming']) && !empty($_POST['eindbestemming'])) {
        $startStationId = $_POST['beginbestemming'];
        $targetStationId = $_POST['eindbestemming'];

        if (empty($errors)) {
            if ($targetStationId !== $startStationId) {
                foreach ($stations as $station) {
                    if ($station['id'] == $startStationId) {
                        $startStation = $station['station'];
                        $startStationLifts = $station['lift'];
                        $startStationEscalators = $station['escalator'];
                    }
                    if ($station['id'] == $targetStationId) {
                        $targetStation = $station['station'];
                        $targetStationLifts = $station['lift'];
                        $targetStationEscalators = $station['escalator'];
                    }
                }
            } else {
                $errors['sameStation'] = 'Kies twee verschillende stations';
            }
        }
    }
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
    <script src="js/main.js"></script>
    <title>Reiswijs</title>
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


<main>
    <section id="home-overview">
        <div class="overview-block">
            <h2>Locaties:</h2>


            <form action="" method="post">
                <div class="form-flex">
                    <label for="beginbestemming"><b>Van:</b></label><br>
                    <select name="beginbestemming" id="beginbestemming" class="dropdown">
                        <?php if($startStation !== '') { ?>
                            <option value="<?php echo $startStationId?>" selected disabled><?php echo $startStation?></option>
                        <?php } else { ?>
                        <option value="" selected disabled>Kies een station</option>
                        <?php } ?>
                        <?php foreach($stations as $station): ?>
                            <option value="<?php echo $station['id']?>">
                                <?php echo $station['station']?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-flex">
                    <label for="eindbestemming"><b>Naar:</b></label><br>
                    <select name="eindbestemming" id="eindbestemming" class="dropdown">
                        <?php if($targetStation !== '') { ?>
                            <option value="<?php echo $targetStationId?>" selected disabled><?php echo $targetStation?></option>
                        <?php } else { ?>
                            <option value="" selected disabled>Kies een station</option>
                        <?php } ?>
                        <?php foreach($stations as $station): ?>
                            <option value="<?php echo $station['id']?>">
                                <?php echo $station['station']?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <input type="submit" name="submit" value="Bekijk faciliteiten">
                </div>
            </form>
        </div>
  
        <div class="overview-block">
            <h2>Faciliteiten:</h2>
            <?php if($startStation !== '' && $targetStation !== ''): ?>
            <div id="startStationDiv">
                <h3>Beginbestemming: <?= $startStation ?? '' ?></h3>
                <ul id="ul-begin">
                    <li>Aantal liften: <?= $startStationLifts ?? '' ?></li>
                    <li>Aantal roltrappen: <?= $startStationEscalators ?? '' ?></li>
                </ul>
                <button class="stationCommentButton" id=<?=$_POST['beginbestemming']?>></button>
            </div>
            <div id="targetStationDiv">
                <h3 id="targetStationTitle">Eindbestemming: <?= $targetStation ?? '' ?></h3>
                <ul id="ul-eind">
                    <li>Aantal liften: <?= $targetStationLifts ?? '' ?>
                    <li>Aantal roltrappen: <?= $targetStationEscalators ?? '' ?></li>
                </ul>
                <button class="stationCommentButton" id=<?=$_POST['eindbestemming']?>></button>
            </div>
            <?php else: ?>
                <p>
                    <?= $errors['sameStation'] ?? ''?>
                    <?= $errors['noStation'] ?? '' ?>
                </p>
            <?php endif ?>
        </div>
    </section>
</main>

</body>
</html>
