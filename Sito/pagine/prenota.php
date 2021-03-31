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
  

        $sql = "INSERT INTO `richiesta`(`CodR`, `CodV`,CodP,stato) VALUES ($codR,$codV,'$codP','0')";
        $mysqli->query($sql);
        
        echo(" 
        PRENOTAZIONE EFFETTUATA NON RICEVERARI UNA NOTIFICA SE SARA' ACCETTATA
        <form action='../pagine/home.php?mail=$mail' method='POST'>
        <input type='submit' value='home'>
        </form><br></div>
        <div>");
        }?>