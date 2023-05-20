<HTML><BODY>
    <?php
    // oblig2;**** Luz Adriana Acosta Hernandez*****

    // Del 1: bytte farge til overskriften 
    require "topp.php";
   
    $sek = date("s");
    if ($sek > 00 and $sek <= 30) //sjekk om sekundene er mellom 00 og 30 for å bruke grønn farge
    {
        echo "<h1 style='color:green;'>";
    }
   echo " Innlevering i IBE102 </h1>";
   ?>
    
<h2>Tallrekke</h2>

    <?php

    // Del 2: røde oddetall

    echo "<p style='font-size:30'>";
     //lage en liste fra 20-49    
    for ($tall = 20; $tall <= 49; $tall++){
         //sjekke om nummeret er oddetall og hvis det er det, bruke rød farge
        if ($tall % 2 <>  0){                  
            echo "<span style='color:red'>$tall </span>";
            }
        else {
            echo "$tall ";
        }
    }
    echo"</p>"
    
    ?>

<h2>Gangetabell</h2>
    <?php

    // Del 3: gangetabell med fet skrift 

    echo"<table border='1'>";
    //lage gange tabell fra 1-9 
    for ($ytre_teller = 1; $ytre_teller <= 9; $ytre_teller++){
        echo"<tr>";
            for ($indre = 1; $indre <=9; $indre++){
                $tall = $indre*$ytre_teller;
                //bruke fet skrift når  resultat av multiplikasjonen er kvadrattall
                if ($tall == $ytre_teller**2){
                    echo"<td style='font-weight:bold;'>$tall</td>";
                }
                else{
                    echo"<td>$tall</td>";
                }
                
            }
        echo"</tr>";
    }
    echo"</table>";
    ?>

<h2>Terningkast</h2>
    <?php

    // Del 4: terningkast simulering

    echo"<table width=150 border=1>";
    echo"<tr><th>Utfall</th>";
    echo"<th>Antall</th>";

    // lage 6 rad
    for ($num = 1;$num <= 6; $num++){
        echo"\t<tr><td>$num</td>";
        $sum = 0;
        $kast = 1;
        //kast terningen 1 million ganger
        while ($kast <= 1000000){
            // få terningens resultat og lagre det i en ny variable inne i switch
            $terning = rand(1,6);
            switch ($terning){
                case 1: 
                    $terningValue = 1;
                    break;
                case 2: 
                    $terningValue = 2; 
                    break;     
                case 3: 
                    $terningValue = 3;  
                    break;      
                case 4: 
                    $terningValue = 4;  
                    break;  
                case 5: 
                    $terningValue = 5;
                    break;
                case 6: $terningValue = 6;
                            
            }
            //oppdater variablene for å nå en million og for å få siste resultatet
            $kast += 1;
            $sum += $terningValue;
        }
        echo "\t<td>$sum</td></tr>\n";
    }
    echo"</table>";
    require "bunn.php";
    ?>
</body>
</html>