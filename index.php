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

<header>
    <section>
        <div id="locaties" class="lofa">
            <h2>Locaties:</h2>
          
            <form action="" method="post">
              
                <div class="form-flex">
                    <label for="beginbestemming" id="beginbestemming" ><b>Van:</b></label><br>
                    <select name="beginbestemming" id="dropdown" required>
                        <option value="" selected disabled>Kies een station</option>
                        <option value="Beurs">Beurs</option>
                        <option value="Blaak">Blaak</option>
                        <option value="Hoek-van-Holland">Hoek van Holland</option>
                    </select>
                </div>

                <div class="form-flex">
                    <label for="eindbestemming" id="eindbestemming"><b>Naar:</b></label><br>
                    <select name="eindbestemming" id="dropdown" required>
                        <option value="" selected disabled>Kies een station</option>
                        <option value="Beurs">Beurs</option>
                        <option value="Blaak">Blaak</option>
                        <option value="Hoek-van-Holland">Hoek van Holland</option>
                    </select>
                </div>
          
                <div>
                    <input type="submit" value="Bekijk faciliteiten">
                </div>
            </form>
        </div>
  
        <div id="faciliteiten" class="lofa">
            <h2>Faciliteiten:</h2>
          
            <div>
                <h3>Beginbestemming:</h3>
                <ul id="ul-begin">
                    <li>mhm</li>
                </ul>
            </div>
          
            <div>
                <h3>Eindbestemming:</h3>
                <ul id="ul-eind">
                    <li>ja</li>
                </ul>
            </div>
        </div>
    </section>
</header>
</body>
</html>
