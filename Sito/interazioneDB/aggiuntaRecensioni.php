<?php
if (isset($_POST['tipo'])) {
    $tipo = $_POST['tipo'];
    echo "tipo $tipo";
}
if (isset($_POST['voto'])) {
    $voto= $_POST['voto'];
}
if (isset($_POST['note'])) {
    $note= $_POST['note'];
}
$mysqli = new mysqli('localhost', 'root', '', 'prova_esame_2017');
    if ($mysqli->connect_error) {
        die('Errore di connessione (' . $mysqli->connect_errno . ')' . $mysqli->connect_error);
    } else {
        $result = $mysqli->query("SELECT MAX(CodRec) AS CodRec  FROM viaggio");
        while ($row = $result->fetch_assoc()) {
            $CodRec  = $row["CodRec"] + 1;
        }
        $trovaCF =  "SELECT CF FROM utente WHERE email = '$email'";
        $ris = $mysqli ->query($trovaCF);
        if (mysqli_num_rows($ris)!=0) {
            while($riga = $ris ->fetch_array(MYSQLI_ASSOC)){
                $inserimento = "INSERT INTO `recensioni`(`CodRec`, `numerico`, `note`, `tipo`, `CF`) VALUES ($CodRec,$numerico,$note,$tipo)";
                $mysqli->query($inserimento);
            }
            } else header("Location: ../pagine/recensioni.php?errore='Mail sbagliata'");
    }
?>