
<?php

session_start();

// lagre tillate brukere i en array
$brukere = Array (
              "Per" => '1111' ,
              "Kari" => '2222' 
              );
  
  
$oppgittbruker = $_POST['bruker'];
$oppgittpassord = $_POST['passord'];  
  

$_SESSION['innlogget'] = false;

// verifisere riktig navn og passord 


if (isset($_POST['logginn']) ){
  
    foreach ( $brukere as $brukernavn => $passord ) {
        if ($brukernavn == $oppgittbruker &&
        $passord == $oppgittpassord )  {
                $_SESSION['navn'] = ucfirst($_POST['bruker']);
                $_SESSION['passord'] = ucfirst($_POST['passord']);
                $_SESSION['innlogget'] = true;
                echo " <h1>Innlogging</h1>Du prøver deg som bruker: " . $_SESSION['navn'] . " og passord: ".$_SESSION['passord'].
                    "<hr>Gyldig kombinasjon. Trykk <a href='index.php'>her</a> for å gå videre ";
                $_SESSION['starttid'] = date("d M Y H:i");
            }
        else{
            $_SESSION['navn'] = ucfirst($_POST['bruker']);
            $_SESSION['passord'] = ucfirst($_POST['passord']);
        }
    }
}

else {
    //  sender tilbake til innloggin
    header("Location: login.php");
    exit();
}

if ($_SESSION['innlogget'] == false){
    echo " <h1>Innlogging</h1>Du prøver deg som bruker: " . $_SESSION['navn'] . " og passord: ".$_SESSION['passord'].
    "<hr>Ugyldig kombinasjon. Trykk <a href='login.php'>her</a> og prøv på nytt ";

}


?>
