<?php include "felles.php";

session_start();
if (!isset($_SESSION['innlogget'])){
        die ("Ikke innlogget. Klikk <a href='login.php'>her</a> for å logge deg inn.");
}
    else{
        $_SESSION['navn'];
    }


echo "<html>
    <body>
    
        <head>
             <title>".PROGNAVN."</title>
        </head>";
echo  "Innloget som: ". $_SESSION['navn']." Siden: ".$_SESSION['starttid'];   
echo "| <a href='index.php'>Hjem</a> | <a href='logout.php'>Logg ut </a> ";
    
 echo       "<table border=1>
            <tr>
                <td>Velkommen til ". PROGNAVN."</td>
                <td>";


                    include 'nyheter.html';

                
                    $nyheter = 'nyheter.html';
                    if (file_exists($nyheter)) {
                        echo "Sist oppdatert ". date ("F d Y H:i:s.", filemtime($nyheter));
                    }
                    

echo            "</td>
            </tr>
        </table>
        <hr>
    </body>

</html>";
?>