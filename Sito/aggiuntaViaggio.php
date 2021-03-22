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

if (isset($_POST["costo"])) {
    $costo = $_POST["costo"];
} else header("Location: registra.php?errore='oraA nulla");

if (isset($_POST["disp"])) {
    $disp = $_POST["disp"];
} else header("Location: registra.php?errore='oraA nullo");

    $disp = $_POST["note"];


    $mysqli = new mysqli('localhost', 'root', '', 'prova_esame_2017');
    if ($mysqli->connect_error) {
        die('Errore di connessione (' . $mysqli->connect_errno . ')' . $mysqli->connect_error);
    } else {
            $inserimento = "INSERT INTO `viaggio`(`oraP`, `costo`, `oraA`, `disp`, `epartenza`, `destinazione`,'note') VALUES ('$oraP','$costo','$oraA',$disp,'$partenza','$destinazione','$note')";
            $mysqli->query($inserimento);
        }