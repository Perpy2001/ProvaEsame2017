<?php
      $mail=$_GET['mail'];
      $codV=$_GET['Codv'];
      $codP=$_GET['CodP'];

    $mysqli = new mysqli('localhost', 'root', '', 'prova_esame_2017');
    if ($mysqli->connect_error) {
        die('Errore di connessione (' . $mysqli->connect_errno . ')' . $mysqli->connect_error);
    } else {
        $result = $mysqli->query("SELECT MAX(CodR) AS CodR FROM richiesta");
    while ($row = $result->fetch_assoc()) {
        $codR = $row["CodR"] + 1;
    }
        $sql = "INSERT INTO `richiesta`(`CodR`, `CodV`,CodP) VALUES ($codR,$codV,'$codP')";
        $result = $mysqli->query($sql);
        }?>