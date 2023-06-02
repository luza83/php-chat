<?php 
    require "topp.php";
?>
<HTML>
    <BODY>
				<?php 
				// IBE 102 Obligatorisk oppgave 6

				$v2 = array("BTC"=>array("Bitcoin",1,11,17), 
				            "ETH"=>array("Ethereum",2,12,27),
				            "LTC"=>array("Litecoin",3,13,37),
				            "XMR"=>array("Monero",4,14,47),
				            "XRP"=>array("Ripple",5,15,57));

				//nedtrekkliste 
				if (!isset($_GET['visEnkeltKnapp'])){
				    echo "<form action= ''>";          
				    echo"<select name = 'valgtvaluta'>";
				        
				        foreach ($v2 as $key => $value) {
				            echo "<option value = '$key' >";
				            echo $key." ".$value[0];
				            echo "</option>"; 
				        }
				    echo "</select>";
				    echo "<input type='submit' NAME='visEnkeltKnapp' VALUE='Vis enkeltvaluta'>";
				    echo"</form>";             
					}
				else {
				    $valgtValuta  = $_GET['valgtvaluta'];
				    echo "Valgt valuta:<br>Sist kjente kurs for $valgtValuta: ". $v2[$valgtValuta][3];            
				}
				
				echo "<br />";
				echo "<br />";
				echo "<br />";
				///*******check box ***************
				
				if(!isset($_GET['submit'])){
				    echo "<FORM action = ''>";
				    foreach ($v2 as $key => $value) {
				        echo  "<INPUT TYPE='checkbox'   VALUE= '$key' NAME='valutaer[]'>$key $value[0]<br>";    
				        }
				    echo "<input type='submit' NAME='submit' VALUE='Vis valgtevaluta'>";              
				    echo "</FORM>";   
				}
				else { 
				    echo "Valgte valutaer:<br>";
				    foreach($_GET['valutaer'] as $selected){
				        echo "Sist kjente kurs for $selected: ". $v2[$selected][1]."<br>";
				    }
				}
				//*****OBLIGATORISK 6 **********/
				
				if (!isset($_GET['lete'])){
				    echo "<form action= ''>";          
				    echo"Letetekst: ";   
				    echo "<input type='text' NAME='lete'>";
				    echo "<input type='submit' NAME='string' VALUE='Let!'>";
				    echo  "<INPUT TYPE='checkbox'   NAME='caseInsensitive'> (kryss av hvis du vil ha case-insensitivt s&oslash;k.) <br>";
				    echo"</form>";				                
				}
				else {
				    $string  = $_GET['lete'];
				    
				    echo "Treff for:  ". $string. "<br />";
				      
				    if (!isset($_GET['caseInsensitive'])){
				        foreach($v2 as $key => $value){
				            if (strstr($key, $string)  || strstr($value[0], $string) ){
				                            echo "Sist kjente kurs for ". $key ." (".$value[0]."): ". $value[3]."<br>";
				            }          
				        }    
				    }
        
		    else {
		        foreach($v2 as $key => $value){
		            if (strstr(strtoupper($key), strtoupper($string)) || strstr(strtoupper($value[0]), strtoupper($string))){
		                echo "Sist kjente kurs for ". $key ." (".$value[0]."): ". $value[3]."<br>";
		            }  
		        }
		    }     
		}
  
				/* Frivillige 2 og 3 ... Jeg er ikke så sikkert på om del nr 3 er riktig siden både treff("BTC", "N", cs=False) og treff("BTC", "N") gir true */
				function treff($thicker, $string, $cs= false){
				    global $v2;
				    foreach($v2 as $key => $value){
				        if ($thicker = $key and strstr(strtoupper($thicker),strtoupper($string))){
				            return TRUE;   
				        }
				        elseif ($thicker = $key and strstr(strtoupper($value[0]),strtoupper($string))){
				            return TRUE;   
				        }
				        else {
				            return FALSE;
				            
				        }
				    } 
				}

				// kaller funksjonen og skrive tekst true eller false
				
				if (treff("BTC", "N")==TRUE){
				    echo "<br />";
				    echo "True";
				}
				else{
				    echo "<br />";
				    echo "False";
				}
		?>
    </body>
</html>