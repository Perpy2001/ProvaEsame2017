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
    <?php echo("<div>benvenuto $mail </div>")?>
    <div id="form">
    <?php    echo("<form action='scegliAuto.php?mail=$mail' method='POST'>");?>
            Npatente: 
             <input type='text' name='Npatente'  required="required" minlength="10" maxlength="10">
            <input value="Proponi Viaggio" type='submit'>
        </form>
        <p>oppure</p>
        <?php    echo("<form action='cerca.php?mail=$mail'>");?>
            <input value="Cerca Viaggio" type='submit'>
        </form>
    
        <?php    echo("<form action='recensioni.php?mail=$mail'>");?>
            <input value="scrivi una recensione" type='submit'>
        </form>
        </div>
</body>

</html>