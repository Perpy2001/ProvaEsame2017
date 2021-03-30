<?php
$mail = $_GET["mail"];
if (isset($_POST['tipo'])) {
    $tipo = $_POST['tipo'];
}
if (isset($_POST['voto'])) {
    $voto = $_POST['voto'];
}
if (isset($_POST['note'])) {
    $note = $_POST['note'];
}

$mysqli = new mysqli('localhost', 'root', '', 'prova_esame_2017');
if ($mysqli->connect_error) {
    die('Errore di connessione (' . $mysqli->connect_errno . ')' . $mysqli->connect_error);
} else {
    $result = $mysqli->query("SELECT MAX(CodRec) AS CodRec  FROM recensioni");

    if (is_bool($result)) {
        $CodRec = 0;
    } else     while ($row = $result->fetch_assoc()) {
        $CodRec  = $row["CodRec"] + 1;
    }

    $trovaCF =  "SELECT CF FROM utente WHERE email = '$mail'";
    $ris = $mysqli->query($trovaCF);
    if (mysqli_num_rows($ris) != 0) {
        while ($riga = $ris->fetch_array(MYSQLI_ASSOC)) {
            $inserimento = "INSERT INTO `recensioni`(`CodRec`, `numerico`, `note`, `tipo`, `CF`) VALUES ($CodRec,$voto,$note,$tipo)";
            $mysqli->query($inserimento);
            echo ("<html>
            <div>
            RECENSIONE AGGIUNTA TORNA ALLA HOME
          <form action='../pagine/home.php?mail=$mail' method='POST'>
                <input type='submit' value='home'>
                </form><br></div>
                <div>
                </html>
            ");
        }
    } else header("Location: ../pagine/recensioni.php?errore='Mail sbagliata'");
}
