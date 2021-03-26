<?php
if (isset($_POST['email'])) {
    $email = $_POST['email'];
} else header("Location: acesso.php?errore='email non valida'");
if (isset($_POST['password'])) {
    $password = $_POST['password'];
} else header("Location: accesso.php?errore='password non valida'");







    $mysqli = new mysqli('localhost', 'root', '', 'prova_esame_2017');
    if ($mysqli->connect_error) {
        die('Errore di connessione (' . $mysqli->connect_errno . ')' . $mysqli->connect_error);
    } else {
    $verifica = "SELECT password FROM utente WHERE email = '$email'";
    $ris = $mysqli ->query($verifica);
    echo "<br>";
    if (mysqli_num_rows($ris)!=0) {
    while($riga = $ris ->fetch_array(MYSQLI_ASSOC)){
        echo "<br>";
        if($riga['password'] == $password) header("Location: home.php?email=$email");
        else  header("Location: accesso.php?errore='password errata'");
    }
    } else header("Location: registra.php?errore='Mail sbagliata'");}
