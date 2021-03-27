<?php
$mail = $_GET['mail'];
$partenza = $_POST['partenza'];

$destinazione = $_POST['destinazione'];

$oraP = $_POST["oraP"];

$oraA = $_POST["oraA"];

$dataP = $_POST["dataP"];

$costo = $_POST["costo"];

$disp = $_POST["disp"];

$note = $_POST["note"];
$Npatente = $_GET["Npatente"];

$mysqli = new mysqli('localhost', 'root', '', 'prova_esame_2017');
if ($mysqli->connect_error) {
    die('Errore di connessione (' . $mysqli->connect_errno . ')' . $mysqli->connect_error);
} else {
    $result = $mysqli->query("SELECT MAX(CodV) AS codV FROM viaggio");
    while ($row = $result->fetch_assoc()) {
        $codV = $row["codV"] + 1;
    }
    $inserimento = "  INSERT INTO `viaggio`(codV,`partenza`, `destinazione`, `data`, `oraP`, `oraA`, `Costo`, `disponibilita`, `note`) VALUES ( $codV,'$partenza','$destinazione','$dataP','$oraP','$oraA','$costo',$disp,'$note')";
    $mysqli->query($inserimento);
    $inserimento = "INSERT INTO `av`(`Npatente`, `CodV`) VALUES ('$Npatente',$codV)";
    $mysqli->query($inserimento);
    echo ("<html>
    <div>
    VIAGGIO AGGIUNTO TORNA ALLA HOME
    <form action='home.php?mail=$mail'>
        <input type='submit' value='home'>
        </form><br></div>
        <div>
        O VISUALIZZA I TUOI VIAGGI
    <form action='viaggi.php?mail=$mail'>
        <input type='submit' value='I tuoi viaggi'>
        </form></div>
        </html>
    ");
}
