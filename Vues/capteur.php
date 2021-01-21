
<?php

ini_set('user_agent','Mozilla/4.0 (compatible; MSIE 6.0)');
$data = file_get_contents("http://hothothot.dog/api/capteurs/");

?>

<div>

    <label for="intCap">Capteur Interieur</label>
    <p id="intCap"></p>
    <label for="extCap">Capteur Exterieur</label>
    <p id="extCap"></p>

</div>

<script>
 var data = <? echo ($data);?>;
 document.getElementById("intCap").innerText = data['capteurs'][0]["Valeur"]
 document.getElementById("extCap").innerText = data['capteurs'][1]["Valeur"]

 setTimeout(function(){ document.location.reload(); }, 10000);


</script>


