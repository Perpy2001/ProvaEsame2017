<html>

<head>
    
    <link rel='stylesheet' href='./css.css'>
</head>

<body>
    <div id="form">
      <?php  echo("<form action='../interazioneDB/aggiuntaRecensioni.php?' method='POST'>") ?>
            <br> Tipo utente
            <br> <input type="radio" name="tipo" id="Passeggero" value="Passeggero" />
                <label for="Passeggero">Passeggero</label>
                <input type="radio" name="tipo" id="Autista" value="Autista" />
                <label for="Autista">Autista</label>
            <br> mail utente da recensire:
            <br> <input type='text' name='mail' required='required'><br>
            <br> Voto (1-5):
            <br><input type='number' name='voto' required='required'>
            <br> Note:
            <br> <input type='text' name='note'><br>
            <input type='submit' value="invio">
        </form>
        <?php
       if(isset($errore)){ echo "<p>$errore</p>";}
        ?>
    </div>
</body>

</html>