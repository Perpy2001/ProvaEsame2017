<html>

<head>
    <?php
    $mail = $_GET["mail"];
    $mysqli = new mysqli('localhost', 'root', '', 'prova_esame_2017');
    $result = $mysqli->query("SELECT * FROM utente WHERE email='$mail'");
    while ($row = $result->fetch_assoc()) {
        $CF = $row["CF"];
    }
    $result = $mysqli->query("SELECT MAX(CodP) AS CodP FROM passegieri");
    while ($row = $result->fetch_assoc()) {
        $codP = $row["CodP"] + 1;
    }
    $inserimento = "  INSERT INTO `passegieri`(`CodP`, `CF`) VALUES ('$codP','$CF')";
    $mysqli->query($inserimento);
    ?>
    <link rel='stylesheet' href='./css.css'>
</head>

<body>
    <div id="form">
        <?php echo ("<form action='cercaPartenza.php?mail=$mail&CodP=$codP' method='POST'>") ?>
        Partenza:
        <br> <input type='text' name='partenza' required='required'>
        <input value="Cerca Viaggio" type='submit'>
        </form>
        <?php echo ("<form action='cercaDestinazione.php?mail=$mail&CodP=$codP'' method='POST'>") ?>
        <br> Destinazione:
        <br>
        <input type='text' name='destinazione' required='required'>
        <input value="Cerca Viaggio" type='submit'>
        </form>
    </div>


</body>

</html>