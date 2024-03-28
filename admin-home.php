<?php

//
///** @var mysqli $db */
//require_once 'includes/dbconnect.php';
//
////code
//
//mysqli_close($db);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles/style.css">
    <title>Reiswijs</title>
</head>
<body>
<nav>
    <div>
        <img src="images/logo.PNG" alt="logo" id="logo-image">
    </div>
    <div id="nav-link">
        <div>
            <a href="index.php">Uitloggen</a>
        </div>
    </div>
</nav>

<header>
    <section id="home-overview">
        <div class="overview-block">
            <h2>Stations</h2>

            <a href="admin-stations.php">
                <button>Edit stations</button>
            </a>
        </div>

        <div class="overview-block">
            <h2>Comments</h2>



        </div>
    </section>
</header>
</body>
</html>
