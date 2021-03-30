<?php
$mysqli = new mysqli('localhost', 'root', '', 'prova_esame_2017');



    $mail = $_GET["mail"];
    $nick = $_POST["nick"];
    $result = $mysqli->query("SELECT * FROM utente WHERE email='$mail'");
    while ($row = $result->fetch_assoc()) {
        $CF = $row["CF"];
    }
    $result = $mysqli->query("SELECT MAX(CodP) AS CodP FROM passegieri");
    while ($row = $result->fetch_assoc()) {
        $codP = $row["CodP"];
        $codP++;
    }
    $inserimento = "INSERT INTO `passegieri`(`CodP`, `CF`,nick) VALUES ('$codP','$CF',$nick)";
    $mysqli->query($inserimento);
    $update = "UPDATE utente SET CodP='$codP' WHERE CF='$CF'";
    $mysqli->query($update);
    header("Location: ../pagine/cerca.php?CodP=$codP&mail=$mail");
    ?>