<html>

<head>
  <?php
  $mail = $_GET['mail'];
  $mysqli = new mysqli('localhost', 'root', '', 'prova_esame_2017');
  if ($mysqli->connect_error) {
    die('Errore di connessione (' . $mysqli->connect_errno . ')' . $mysqli->connect_error);
  }

  if (isset($_POST['Rimuovi'])) {
    rimuovi($_POST['codR']);
  }
  $sql =    "SELECT * FROM utente
INNER JOIN passegieri
ON  utente.CF = passegieri.CF
WHERE utente.email='$mail'";
  $result = $mysqli->query($sql);
  while ($row = $result->fetch_assoc()) {
    $codP = $row['CodP'];
  }
  $sql = "SELECT * FROM richiesta
        INNER JOIN viaggio
        ON  viaggio.codV = richiesta.CodV
        WHERE richiesta.CodP ='$codP'
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
      $CodR = $row["CodR"];
      echo ("<div>Partenza: " . $row["partenza"] . " - ora: " . $row["oraP"] . " " . "<br>" .
        "Partenza: " . $row["destinazione"] . " - ora: " . $row["oraA"] . "<br>" .
        "Posti Disponibili:" . $row["disponibilita"] . "<br>" .
        "Costo:" . $row["Costo"] . "<br>" .
        "Note:" . $row["note"] . "<br></div>");
      echo ("<form action='prenotazioni.php?mail=$mail' method='POST'>
    <input type='hidden' name='codR' value='$CodR'>
    <input type='submit' value='Rimuovi' name='Rimuovi'>
    </form>
    ");
    }
  ?>
</body>

</html>




<?php
function rimuovi($var)
{
  $mysqli = new mysqli('localhost', 'root', '', 'prova_esame_2017');
  $sql = "DELETE FROM `richiesta` WHERE `richiesta`.`CodR` = $var";
  $mysqli->query($sql);
}
?>