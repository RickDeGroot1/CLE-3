<?php
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
        <h1>Reiswijs</h1>
    </div>
    <div id="nav-link">
        <div>
            <a href="home.php">Home</a>
        </div>
        <div>
            <a href="comment.php">Melding maken</a>
        </div>
    </div>
</nav>

<header>
    <section>
        <div id="locaties" class="lofa">
            <h2>Locaties:</h2>
            <form action="" method="post">
                <div class="form-flex">
                    <label for="beginbestemming" id="beginbestemming" ><b>Van:</b></label><br>
                    <input type="text" name="beginbestemming" placeholder="Voer begin bestemming in" required>
                </div>
                <div class="form-flex">
                    <label for="eindbestemming" id="eindbestemming"><b>Naar:</b></label><br>
                    <input type="text" required placeholder="Voer eindbestemming in">
                </div>
                <div>
                    <input type="submit" value="Bekijk faciliteiten">
                </div>
            </form>
        </div>
        <div id="faciliteiten" class="lofa">
            <h2>Faciliteiten:</h2>
        </div>
    </section>
</header>
</body>
</html>
