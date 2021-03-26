<html>

<head>
    <link rel='stylesheet' href='./css.css'>
    <?php
    $mail=$_GET["email"];
        $mysqli = new mysqli('localhost', 'root', '', 'prova_esame_2017');
        if ($mysqli->connect_error) {
            die('Errore di connessione (' . $mysqli->connect_errno . ')' . $mysqli->connect_error);
        }
        $user=$mysqli->query("SELECT * FROM utente WHERE email==$mail");
    ?>
</head>

<body>
    <?php echo("<div>benvenuto $mail </div>")?>
    <div id="form">
        <form action='scegliAuto.php' method='POST'>
            Npatente: 
             <input type='text' name='Npatente'>
            <input value="Proponi Viaggio" type='submit'>
        </form>
        <p>oppure</p>
        <form action='cerca.php' method='POST'>
            <input value="Cerca Viaggio" type='submit'>
        </form>
    </div>

</body>

</html>