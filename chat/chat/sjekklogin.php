<?php

session_start();

$brukere = array(
    "Per" => '1111',
    "Kari" => '2222'
);

$oppgittbruker = isset($_POST['bruker']) ? $_POST['bruker'] : '';
$oppgittpassord = isset($_POST['passord']) ? $_POST['passord'] : '';

$_SESSION['innlogget'] = false;

if (isset($_POST['logginn'])) {
    foreach ($brukere as $brukernavn => $passord) {
        if ($brukernavn === $oppgittbruker && $passord === $oppgittpassord) {
            $_SESSION['navn'] = ucfirst($_POST['bruker']);
            $_SESSION['passord'] = ucfirst($_POST['passord']);
            $_SESSION['innlogget'] = true;
            echo "<h1>Innlogging</h1>Du prøver deg som bruker: " . $_SESSION['navn'] . " og passord: " . $_SESSION['passord'] .
                "<hr>Gyldig kombinasjon. Trykk <a href='home.php'>her</a> for å gå videre ";
            $_SESSION['starttid'] = date("d M Y H:i");
            break;
        } else {
            $_SESSION['navn'] = ucfirst($_POST['bruker']);
            $_SESSION['passord'] = ucfirst($_POST['passord']);
        }
    }
} else {
    header("Location: login.php");
    exit();
}

if ($_SESSION['innlogget'] === false) {
    echo "<h1>Innlogging</h1>Du prøver deg som bruker: " . $_SESSION['navn'] . " og passord: " . $_SESSION['passord'] .
        "<hr>Ugyldig kombinasjon. Trykk <a href='index.php'>her</a> og prøv på nytt ";
}
?>
