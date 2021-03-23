<html>

<head>
    <?php
    if(isset($_GET['errore'])){
     $errore = $_GET['errore'];}
    ?>
    <link rel='stylesheet' href='./css.css'>
</head>

<body>
    <div id="form">
        <form action='aggiuntaViaggio.php' method='POST'>
            Partenza:
            <br> <input type='text' name='partenza'>
            <br> Destinazione:
            <br>
            <input type='text' name='destinazione'>
            <br> Data Partenza:
            <br>
            <input type='text' name='dataP'>
            <br>Ora Partenza:
            <br> <input type='text' name='oraP'>
            <br> Ora Arrivo:
            <br> <input type='text' name='oraA'><br>
            <br> Costo:
            <br> <input type='text' name='costo'><br>
            <br> Disponibilità Posti:
            <br> <input type='number' name='disp'><br>
            <br> Note:
            <br> <input type='text' name='note'><br>

            <input type='submit' value="Proponi Viaggio ">
        </form>
        <?php
       if(isset($errore)){ echo "<p>$errore</p>";}
        ?>
    </div>
</body>

</html>