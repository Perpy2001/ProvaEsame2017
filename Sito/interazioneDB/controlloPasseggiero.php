<?php
$mail = $_GET["mail"];
$mysqli = new mysqli('localhost', 'root', '', 'prova_esame_2017');

$ricerca="SELECT passegieri.CodP
FROM passegieri
INNER JOIN utente 
ON utente.CF= passegieri.CF
WHERE utente.email='$mail'";
$result = $mysqli->query($ricerca);
if(!is_bool($result)&&mysqli_num_rows($result) != 0){
    while ($row = $result->fetch_assoc()) {
        $codP = $row["CodP"];
    }
   
    header("Location: ../pagine/cerca.php?mail=$mail&CodP=$codP");
}else{
    echo("<form action='aggiungiPasseggiero.php?mail=$mail' method='POST'>
    Nickname da passeggiero: 
    <input type='text' name='nick'  maxlength='40'>
    <input value='conferma' type='submit'>
</form>");
}

    ?>