<HTML>
    <BODY>
         <?php
        require "topp.php";
        
    echo "<h2>IBE 102 Obligatorisk oppgave # 3</h2>";
        
        echo "<p>Del 1</p>";

           
           
            require "valutaer.php";
            require "valuta_logo/logo.php";


            $i= 0;
            foreach ($v2 as $key => $value) {
                echo"<p>Valuta ". $value[0]." ". ($key) ."   ". $logo[$i] . "   har følgende siste verdier: ". $value[1]. " , ".$value[2]. " , ".$value[3] ."</p>";
                $i++;
            }
           

            echo "<br />";
            echo "<br />";
            echo "<br />";
            echo"<p>Del 2</p>";

            //*******/ Del 2 *******Vise inneholdet av $v med en foreach løke

            foreach ($v2 as $key => $value){
                echo"<li>" . $key . " 
                        (" . $value[0]. "):
                        ". $value[1] . ", 
                        " . $value[2] . " og 
                        " . $value[3] ."</li>";
            }

            echo "<br />";
            echo "<br />";
            echo "<br />";


        //*******************/ Del 3: assosiative matrisen er lagret i $v variabelen  og her skal skrives en tabel med hjelp av en foreach løke

            echo"<table width=150 border=1>";
            echo"<tr><th>Ticker</th>";
            echo"<th>Navn</th>";
            echo"<th>Verdi 1</th>";
            echo"<th>Verdi 2</th>";
            echo"<th>Verdi 3</th>";

            echo"<p>Del 3</p>";

            foreach ($v2 as $key => $valuta){
                echo"\t<tr><td>".$key."</td>";
                echo"\t<td>".$valuta[0]."</td>";
                echo"\t<td>".$valuta[1]."</td>";
                echo"\t<td>".$valuta[2]."</td>";
                echo"\t<td>".$valuta[3]."</td></tr>";

            }
            echo"</table>";
            require "bunn.php";
            ?>

    </body>
</html>