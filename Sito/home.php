<html>

<head>
    <link rel='stylesheet' href='./css.css'>
    <?php
    $mail=$_GET["mail"];
        $mysqli = new mysqli('localhost', 'root', '', 'prova_esame_2017');
        if ($mysqli->connect_error) {
            die('Errore di connessione (' . $mysqli->connect_errno . ')' . $mysqli->connect_error);
        }
        $user=$mysqli->query("SELECT * FROM utente WHERE email==$mail");
    ?>
</head>

<body>
    <?php echo("benvenuto $mail")?>
    <div id="form">
        <form action='scegliAuto.php' method='POST'>
            Npatente: 
            <br> <input type='text' name='Npatente'><br>
            <input value="Proponi Viaggio" type='submit'>
        </form>
        <form action='cerca.php' method='POST'>
            <input value="Cerca Viaggio" type='submit'>
        </form>
    </div>

</body>

</html>