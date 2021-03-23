<?php
if (isset($_POST['partenza'])) {
    $partenza = $_POST['partenza'];
} else header("Location: registra.php?errore='partenza non valida'");

if (isset($_POST['destinazione'])) {
    $destinazione = $_POST['destinazione'];
} else header("Location: registra.php?errore='destinazione non deve essere nulla");

if (isset($_POST["oraP"])) {
    $oraP = $_POST["oraP"];
} else header("Location: registra.php?errore='oraP nullo");

if (isset($_POST["oraA"])) {
    $oraA = $_POST["oraA"];
} else header("Location: registra.php?errore='oraA nullo");

if (isset($_POST["dataP"])) {
    $dataP = $_POST["dataP"];
} else header("Location: registra.php?errore='dataP nullo");

if (isset($_POST["costo"])) {
    $costo = $_POST["costo"];
} else header("Location: registra.php?errore='costo nulla");

if (isset($_POST["disp"])) {
    $disp = $_POST["disp"];
} else header("Location: registra.php?errore='disponibilita nulla");

$note = $_POST["note"];


$mysqli = new mysqli('localhost', 'root', '', 'prova_esame_2017');
if ($mysqli->connect_error) {
    die('Errore di connessione (' . $mysqli->connect_errno . ')' . $mysqli->connect_error);
} else {
    $result = $mysqli->query("SELECT MAX(CodV) AS codV FROM viaggio");
    while ($row = $result->fetch_assoc()) {
        $codV = $row["codV"]+1;
    }
    $inserimento = "  INSERT INTO `viaggio`(codV,`partenza`, `destinazione`, `data`, `oraP`, `oraA`, `Costo`, `disponibilita`, `note`) VALUES ( $codV,'$partenza','$destinazione','$dataP','$oraP','$oraA','$costo',$disp,'$note')";
    $mysqli->query($inserimento);
}
