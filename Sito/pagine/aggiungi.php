<html>

<head>
    <?php
    $mail=$_GET['mail'];
     $Npatente=$_GET['Npatente'];
    if(isset($_GET['errore'])){
     $errore = $_GET['errore'];}
     if(!isset($_GET['targa'])){
        $mysqli = new mysqli('localhost', 'root', '', 'prova_esame_2017');
        if ($mysqli->connect_error) {
            die('Errore di connessione (' . $mysqli->connect_errno . ')' . $mysqli->connect_error);
        } else {
               
                $targa=$_POST['targa'];
                $modello=$_POST['modello'];
                $alimentazione=$_POST['alimentazione'];
            
            $inserimento="INSERT INTO `auto`(`targa`, `modello`, `alimentazione`, `Npatente`) VALUES ($targa,$modello,$alimentazione,'$Npatente')";
        }
     }
    ?>
    <link rel='stylesheet' href='./css.css'>
</head>

<body>
    <div id="form">
      <?php  echo("<form action='../interazioneDB/aggiuntaViaggio.php?Npatente=$Npatente&mail=$mail' method='POST'>") ?>
            Partenza:
            <br> <input type='text' name='partenza' required='required'>
            <br> Destinazione:
            <br>
            <input type='text' name='destinazione' required='required'>
            <br> Data Partenza:
            <br>
            <input type='text' name='dataP' required='required'>
            <br>Ora Partenza:
            <br> <input type='text' name='oraP' required='required'>
            <br> Ora Arrivo:
            <br> <input type='text' name='oraA' required='required'><br>
            <br> Costo:
            <br> <input type='text' name='costo' required='required'><br>
            <br> Disponibilità Posti:
            <br> <input type='number' name='disp' required='required'><br>
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