<?php
$mail = $_GET["mail"];
$mysqli = new mysqli('localhost', 'root', '', 'prova_esame_2017');

$ricerca="SELECT passegieri.CodP
FROM passegieri
INNER JOIN utente 
ON utente.CF= passegieri.CF
WHERE utente.email='$mail'";
$result = $mysqli->query($ricerca);
if(is_bool($result)){
    $mysqli = new mysqli('localhost', 'root', '', 'prova_esame_2017');
    $result = $mysqli->query("SELECT * FROM utente WHERE email='$mail'");
    while ($row = $result->fetch_assoc()) {
        $CF = $row["CF"];
    }
    $result = $mysqli->query("SELECT MAX(CodP) AS CodP FROM passegieri");
    while ($row = $result->fetch_assoc()) {
        $codP = $row["CodP"] + 1;
    }
    $inserimento = "  INSERT INTO `passegieri`(`CodP`, `CF`) VALUES ('$codP','$CF')";
    $mysqli->query($inserimento);

    header("Location: cerca.php?mail=$mail");
}
header("Location: cerca.php?mail=$mail");
    ?>