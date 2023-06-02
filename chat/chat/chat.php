<?php 
    require "topp.php";
?>

<!--<script>
  vischat();  
  setInterval(vischat, 1000);  // deretter hvert sekund
  function vischat() {   // https://www.w3schools.com/js/js_ajax_intro.asp
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("innlegg").innerHTML = this.responseText;
      }
    };
    xhttp.open("GET", "chat.php", true);
    xhttp.send();
  }
</script> /-->

<form action="" method="GET">
    Innlegg:
    <input type="text" name="innlegg">
</form>

<?php
    // Lagrer tidspunkt fra siste innlegget i en variabel
    $fil = 'chat.txt';
    if (file_exists($fil)) {
        $siste_innlegg = date("F d Y H:i", getlastmod());  
    }

    // Lagrere innlegget i en variabel
    $innlegg = $_GET["innlegg"];

    // sjekker om det finnes noe innlegg, og hvis det finnes, skriver innleget, brukerern og tidspunkt i filen. (Bruker *_* som skilletegn)
    if (isset($innlegg)) {
        $fp = fopen("chat.txt", "a");
        $tekst = $siste_innlegg . "*_*";
        $tekst .= $_SESSION['navn'] . "*_*";
        $tekst .= $innlegg . "*_*";
        fwrite($fp, $tekst . "\n");
        fclose($fp);
    }

    $allelinjer = file("chat.txt"); // lager en matrise 
    $allelinjer = array_reverse($allelinjer);
    echo "<table width=800 border=1>";
    echo "<tr>";

    foreach ($allelinjer as $linje) { // viser hvert innlegg lagret i matrisen
        $neste = explode("*_*", $linje);
        echo "<tr><td width=150>" . $neste[0] . "</td>";
        echo "<td width=50>" . $neste[1] . "</td>";
        echo "<td width=600>" . $neste[2] . "</td></tr>";
    }
    echo "</table>";

    require "bunn.php";
?>
