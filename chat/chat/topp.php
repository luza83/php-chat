<?php

session_start();

include "felles.php";

if (!isset($_SESSION['innlogget'])) {
    die("Ikke innlogget. Klikk <a href='index.php'>her</a> for å logge deg inn.");
} else {
    $navn = $_SESSION['navn'];
}

echo "<html>
    <head>
        <title>".PROGNAVN."</title>
    </head>
    <body>";

echo "Innlogget som: ".$navn." Siden: ".$_SESSION['starttid'];
echo "| <a href='home.php'>Hjem</a> | <a href='logout.php'>Logg ut </a> ";

echo "<table border=1>
        <tr>
            <td>Velkommen til ". PROGNAVN."</td>
            <td>";

$nyheter = 'nyheter.html';
if (file_exists($nyheter)) {
    echo "Sist oppdatert ". date("F d Y H:i:s.", filemtime($nyheter));
    echo "<a href=".$nyheter.">Nyheter</a>";
}

echo "</td>
        </tr>
    </table>
    <hr>
    </body>
</html>";
?>
