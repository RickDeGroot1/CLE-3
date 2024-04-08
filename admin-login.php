<?php
/** @var mysqli $db */
require_once 'includes/dbconnect.php';

session_start();
$_SESSION['loggedin'] = false;

$errors = [];

if (isset($_POST['submit'])){

    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if ($username == '' || $username == ' '){
        print_r($errors);
    }

    if ($password == '' || $password == ' '){
        print_r($errors);
    }

    else{
        $query = "SELECT username, password
        FROM users WHERE username='$username'";

        $result = mysqli_query($db,$query)
        or die('Error'. mysqli_error($db). 'with query'. $query);

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['password'] == $password) {
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username;
                header('location: admin-home.php');
                exit;
            } else {
                $errors['password'] = "Incorrect password.";
            }
        } else {
            $errors['username'] = "User not found.";
        }
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles/style.css   ">
    <link rel="stylesheet" href="styles/admin.css">
    <title>Login - Reiswijs</title>
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
    <div class="login-container">
        <h1>Inloggen bij Reiswijs</h1>
        <form id="login-form" action="" method="post">
            <div class="login-input">
                <label for="username">Gebruikersnaam:</label>
                <input type="text" id="username" name="username" placeholder="Vul hier uw gebruikersnaam in" required>
                <p>
                    <?= isset($errors['username']) ? $errors['username'] : ''?>
                </p>
            </div>
            <div class="login-input">
                <label for="password">Wachtwoord:</label>
                <input type="password" id="password" name="password" placeholder="Vul hier uw wachtwoord in" required>
                <p>
                    <?= isset($errors['password']) ? $errors['password'] : ''?>
                </>
            </div>
            <div class="login-submit">
                <input type="submit" name ="submit" value="Inloggen">
            </div>
        </form>
    </div>
</main>
</body>
</html>