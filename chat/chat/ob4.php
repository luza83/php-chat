<?php 
require "topp.php";
?>
<HTML>
    <BODY>
        <?php 
        // IBE 102 Obligatorisk oppgave 4
        // Luz Adriana Acosta Hernandez

        require "valutaer.php";

        //lage nedtrekkliste med submit knapp
        if (!isset($_GET['visEnkeltKnapp'])) {
            echo "<form action=''>";          
            echo "<select name='valgtvaluta'>";
            
            foreach ($v2 as $key => $value) {
                echo "<option value='$key'>";
                echo $key . " " . $value[0];
                echo "</option>"; 
            }
                
            echo "</select>";
            echo "<input type='submit' NAME='visEnkeltKnapp' VALUE='Vis enkeltvaluta'>";
            echo "</form>";
        }
        // behandle skjemma og skrive ut det som var valgt
        else {
            $valgtValuta = $_GET['valgtvaluta'];
            echo "Valgt valuta:<br>Sist kjente kurs for $valgtValuta: " . $v2[$valgtValuta][3];   
        }

        echo "<br />";
        echo "<br />";
        echo "<br />";

        ///*******check box ***************
        if(!isset($_GET['submit'])){
            echo "<FORM action=''>";
            
            foreach ($v2 as $key => $value) {
                echo "<INPUT TYPE='checkbox' VALUE='$key' NAME='valutaer[]'>$key $value[0]<br>";    
            }

            echo "<input type='submit' NAME='submit' VALUE='Vis valgtevaluta'>";              
            echo "</FORM>";   
        }
        else { 
            echo "Valgte valutaer:<br>";
            foreach($_GET['valutaer'] as $selected){
                echo "Sist kjente kurs for $selected: " . $v2[$selected][1] . "<br>";
            }
        }
        require "bunn.php";
        ?>
    </body>
</html>
