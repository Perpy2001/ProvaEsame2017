<?php
$mysqli = new mysqli('localhost', 'root', '', 'prova_esame_2017');


    $mail = $_GET["mail"];
    $nick = $_POST["nick"];
    $Npatente = $_POST["Npatente"];

    $result = $mysqli->query("SELECT CF FROM utente WHERE email='$mail'");
    while ($row = $result->fetch_assoc()) {
        $CF = $row["CF"];
    }

    $inserimento = "INSERT INTO `autisti`(`CF`,nick,Npatente) VALUES ('$CF','$nick','$Npatente')";
    $mysqli->query($inserimento);
    $update = "UPDATE utente SET Npatente='$Npatente' WHERE CF='$CF'";
    $mysqli->query($update);
    header("Location: ../pagine/scegliAuto.php?Npatente=$Npatente&mail=$mail");
    ?>