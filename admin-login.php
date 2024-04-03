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
        <h1>Login to Reiswijs</h1>
        <form id="login-form" action="#" method="post">
            <div class="login-input">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" placeholder="Vul hier uw gebruikersnaam in">
            </div>
            <div class="login-input">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Vul hier uw wachtwoord in">
            </div>
            <div class="login-submit">
                <input type="submit" value="Login">
            </div>
        </form>
    </div>
</main>

</body>
</html>