<?php
if (isset($_POST['mail'])) {
    $mail = $_POST['mail'];
} else header("Location: registra.php?errore='email non valida'");

if (isset($_POST['password'])) {
    $password = $_POST['password'];
} else header("Location: registra.php?errore='password non deve essere nulla");

if (isset($_POST["CF"])) {
    $CF = $_POST["CF"];
} else header("Location: registra.php?errore='CF nullo");

if (isset($_POST["cognome"])) {
    $cognome = $_POST["cognome"];
} else header("Location: registra.php?errore='cognome nullo");

if (isset($_POST["nome"])) {
    $nome = $_POST["nome"];
} else header("Location: registra.php?errore='cognome nulla");

if (isset($_POST["tel"])) {
    $tel = $_POST["tel"];
} else header("Location: registra.php?errore='cognome nullo");





if (strlen($password) < 8) {
    header("Location: registra.php?errore='la password deve essere di almeno 8 caratteri'");
} elseif (is_numeric(strpos($password, '@'))) {
    header("Location: registra.php?errore='la password non deve contenere caratteri speciali'");
} else if (is_numeric(strpos($password, '£'))) {
    header("Location: registra.php?errore='la password non deve contenere  caratteri speciali'");
} else if (is_numeric(strpos($password, '$'))) {
    header("Location: registra.php?errore='la password non deve contenere  caratteri speciali'");
} else if (is_numeric(strpos($password, '&'))) {
    header("Location: registra.php?errore='la password non deve contenere  caratteri speciali'");
} else if (is_numeric(strpos($password, ' '))) {
    header("Location: registra.php?errore='la password non deve contenere  caratteri speciali'");
} else {

    $mysqli = new mysqli('localhost', 'root', '', 'prova_esame_2017');
    if ($mysqli->connect_error) {
        die('Errore di connessione (' . $mysqli->connect_errno . ')' . $mysqli->connect_error);
    } else {
        $esiste = $mysqli->query("SELECT * FROM utente WHERE mail='$mail'");
        if (mysqli_num_rows($esiste)==0) {
            header("Location: home.php?mail=$mail");    
            $inserimento = "INSERT INTO `utente`(`CF`, `nome`, `cognome`, `tel`, `email`, `password`) VALUES ('$CF','$nome','$cognome','$tel','$mail','$password')";
            $mysqli->query($inserimento);
        } else header("Location: registra.php?errore='Mail gia inserita'");
    }
}
?>