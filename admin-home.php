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
    <link rel="stylesheet" href="styles/admin.css">
    <title>Admin home</title>
</head>
<body>
<header>
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
</header>

<main>
    <section id="home-overview">
        <div class="overview-block">

            <h2>Stations</h2>

            <p>Hier komen stations</p>

            <a href="admin-stations.php">
                <button class="admin-button">Meer stations</button>
            </a>

        </div>

        <div class="overview-block">

            <h2>Comments</h2>

            <p>Hier komen de laatste comments</p>

            <a href="admin-comments.php">
                <button class="admin-button">Meer comments</button>
            </a>

        </div>
    </section>
</main>

</body>
</html>