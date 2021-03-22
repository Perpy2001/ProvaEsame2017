<?php
if (isset($_POST['email'])) {
    $email = $_POST['email'];
} else header("Location: registra.php?errore='email non valida'");
if (isset($_POST['password'])) {
    $mail = $_POST['password'];
} else header("Location: registra.php?errore='password non valida'");







    $mysqli = new mysqli('localhost', 'root', '', 'prova_esame_2017');
    if ($mysqli->connect_error) {
        die('Errore di connessione (' . $mysqli->connect_errno . ')' . $mysqli->connect_error);
    } else { header("Location: home.php");
    $verifica = "SELECT 'password' FROM 'utente' WHERE 'email' = '$email'";
    
    $mysqli->query($inserimento);
    }
   

?>