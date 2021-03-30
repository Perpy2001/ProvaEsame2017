<html>

<head>
    <?php
    $mail = $_GET["mail"];

    ?>
    <link rel='stylesheet' href='./css.css'>
</head>

<body>
    <div id="form">
        <?php echo ("<form action='../interazioneDB/cercaPartenza.php?mail=$mail&CodP=$codP' method='POST'>") ?>
        Partenza:
        <br> <input type='text' name='partenza' required='required'>
        <input value="Cerca Viaggio" type='submit'>
        </form>
        <?php echo ("<form action='../interazioneDB/cercaDestinazione.php?mail=$mail&CodP=$codP'' method='POST'>") ?>
        <br> Destinazione:
        <br>
        <input type='text' name='destinazione' required='required'>
        <input value="Cerca Viaggio" type='submit'>
        </form>
    </div>


</body>

</html>