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
    <?php    echo("<form action='../interazioneDB/controlloAutista.php?mail=$mail' method='POST'>");?>

            <input value="Proponi Viaggio" type='submit'>
        </form>
        <p>oppure</p>
        <?php    echo("<form action='../interazioneDB/controlloPasseggiero.php?mail=$mail' method='POST'>");?>

            <input value="Cerca Viaggio" type='submit'>
        </form>
    
        <?php    echo("<form action='recensioni.php?mail=$mail'  method='POST'>");?>
            <input value="scrivi una recensione" type='submit'>
            </form>
            <?php    echo("<form action='myViaggi.php?mail=$mail'  method='POST'>");?>
            <input value="I miei Viaggi" type='submit'>
            </form>
            <?php    echo("<form action='prenotazioni.php?mail=$mail'  method='POST'>");?>
            <input value="Le mie prenotazioni" type='submit'>
        </form>
        </div>
</body>

</html>