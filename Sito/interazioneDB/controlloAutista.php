<?php
$mail = $_GET["mail"];
$mysqli = new mysqli('localhost', 'root', '', 'prova_esame_2017');

$ricerca="SELECT autisti.Npatente
FROM autisti
INNER JOIN utente 
ON utente.CF= autisti.CF
WHERE utente.email='$mail'";
$result = $mysqli->query($ricerca);
if(!is_bool($result)&&mysqli_num_rows($result) != 0){
    while ($row = $result->fetch_assoc()) {
        $Npatente = $row["Npatente"];
    }
   
    header("Location: ../pagine/scegliAuto.php?mail=$mail&Npatente=$Npatente");
}else{
    echo("<form action='aggiungiAutista.php?mail=$mail' method='POST'>
    Nickname da autista: 
    <input type='text' name='nick'  maxlength='40'>
    Npatente: 
    <input type='text' name='Npatente'  required='required' minlength='10' maxlength='10'>
    <input value='conferma' type='submit'>
</form>");
   
}

    ?>