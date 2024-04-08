<?php
require_once 'includes/secure.php';
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
    <?php
    require_once 'includes/navbar.php';
    ?>
</header>

<main>
    <section id="home-overview">
        <div class="overview-block">

            <h2>Stations</h2>

            <p>Voeg toe en verwijder hier de stations</p>

            <a href="admin-stations.php">
                <button class="admin-button">Meer stations</button>
            </a>

        </div>

        <div class="overview-block">

            <h2>Meldingen</h2>

            <p>Bekijk hier de meldingen en verwijder</p>

            <a href="admin-comments.php">
                <button class="admin-button">Meer meldingen</button>
            </a>

        </div>
    </section>
</main>

</body>
</html>
