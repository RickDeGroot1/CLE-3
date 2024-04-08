<?php
if(!isset($_SESSION)) {
    session_start();
}
if(isset($_SESSION['username'])) { ?>
    <nav>
        <div>
            <img src="images/logo.PNG" alt="logo" id="logo-image">
        </div>
        <div id="nav-link">
            <div>
                <a href="admin-home.php">Home</a>
            </div>
            <div>
                <a href="comment.php">Melding maken</a>
            </div>
            <div>
                <a href="add-station.php">Stations toevoegen</a>
            </div>
            <div>
                <a href="logout.php">Uitloggen</a>
            </div>
        </div>
    </nav>
<?php } else { ?>
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
            <div>
                <a href="admin-login.php">Admin login</a>
            </div>
        </div>
    </nav>
<?php } ?>