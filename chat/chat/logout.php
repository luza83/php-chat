<?php
session_start();

if (isset ($_SESSION['innlogget'])){
    // slutter session
    session_destroy();
    // lenke for å logge inn på nytt
    echo "Vellyket utlogging. Klikk <a href='login.php'>her</a> for å logge deg inn på nytt.";
}
else {
    //til innloggin
    echo "<html><body>Ikke innlogget. Gå til <a href='login.php'>innlogging</a>!";
}

?>