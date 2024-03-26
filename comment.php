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
<header>
    <nav>
        <div>
            <h1>Reiswijs</h1>
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

    <form id="comment-form">
        <h1>Maak een melding</h1>

        <div class="comment-section">
            <label for="station" class="comment-label">Over welk station wilt u een melding maken?</label>
            <br>
            <select name="station" id="dropdown">
                <option value="">Kies een station</option>
                <option value="Beurs">Beurs</option>
                <option value="Blaak">Blaak</option>
                <option value="Hoek-van-Holland">Hoek van Holland</option>
            </select>
        </div>

        <div class="comment-section">
            <p class="comment-label">Hoeveel liften werken niet?</p>
            <label for="lift1" class="comment-label">1</label>
            <input type="checkbox" id="lift1" name="lift1" value="1">
            <label for="lift2" class="comment-label">2</label>
            <input type="checkbox" id="lift2" name="lift2" value="2">
        </div>


        <div class="comment-section">
            <p class="comment-label">Hoeveel roltrappen werken niet?</p>
            <label for="roltrap1" class="comment-label">1</label>
            <input type="checkbox" id="roltrap1" name="roltrap1" value="1">
            <label for="roltrap2" class="comment-label">2</label>
            <input type="checkbox" id="roltrap2" name="roltrap2" value="2">
        </div>

        <div class="comment-section">
            <label for="bijzonder" class="comment-label">Zijn er nog andere bijzonderheden?</label></p>
            <textarea name="bijzonder" rows="4" cols="50"></textarea>
        </div>

        <div class="comment-section">
            <input id="comment-submit" type="submit" value="Verstuur melding">
        </div>

    </form>
</main>
</body>
</html>
