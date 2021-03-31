


<html>

<head>
  <?php
  $mail = $_GET['mail'];
  $codV = $_GET['codV'];
  $mysqli = new mysqli('localhost', 'root', '', 'prova_esame_2017');
  if (isset($_POST['acetta'])) {
    acetta($_POST['codR']);
    $mysqli->query("UPDATE viaggio SET disponibilita = disponibilita -1 WHERE codV = $codV");
 
  }
  if (isset($_POST['rifiuta'])) {
    rifiuta($_POST['codR']);
    $mysqli->query("UPDATE viaggio SET disponibilita = disponibilita +1 WHERE codV = $codV");
 
  }

 
  if ($mysqli->connect_error) {
    die('Errore di connessione (' . $mysqli->connect_errno . ')' . $mysqli->connect_error);
  }

  $sql = "SELECT * FROM richiesta
  INNER JOIN viaggio
  ON  viaggio.codV = richiesta.CodV
  INNER JOIN passegieri
  ON passegieri.CodP=richiesta.CodP
  WHERE richiesta.CodV=$codV
        ";
  $result = $mysqli->query($sql);


  ?>
</head>

<body>
  <?php
  if (is_bool($result)&&mysqli_num_rows($result) != 0) {
    echo ("Nessun Viaggio Trovato");
  } else
    while ($row = $result->fetch_assoc()) {
      $CodV = $row["codV"];
      $CodR = $row["CodR"];
      if($row["stato"]==0){
          $stato="non accettata";
      }else $stato = "accettata";
      echo ("<div>Partenza: " . $row["partenza"] . "<br>" .
        "Destinazione: " . $row["destinazione"] . "<br>" .
        "Username: " . $row["nick"] . "<br>" .
        "Costo: " . $row["Costo"] . "<br>" .
        "Stato: ".$stato
    );
    if($row["stato"]==0){
        echo ("<form action='prenotazioniViaggio.php?mail=$mail&codV=$CodV' method='POST'>
        <input type='hidden' name='codR' value='$CodR'>
        <input type='submit' value='Acetta Prenotazioni' name='acetta'>
        </form>
        ");
    }else      echo ("<form action='prenotazioniViaggio.php?mail=$mail&codV=$CodV' method='POST'>
    <input type='hidden' name='codR' value='$CodR'>
    <input type='submit' value='Rifiuta Prenotazioni' name='rifiuta'>
    </form>
    ");

    }
  ?>
</body>

</html>



<?php
function rifiuta($var)
{
  $mysqli = new mysqli('localhost', 'root', '', 'prova_esame_2017');
  $mysqli->query("UPDATE richiesta SET stato = 0 WHERE CodR = $var");
}
?>

<?php
function acetta($var)
{
  $mysqli = new mysqli('localhost', 'root', '', 'prova_esame_2017');
  $mysqli->query("UPDATE richiesta SET stato = 1 WHERE CodR = $var");
}
?>
