


<html>

<head>
  <?php
  $mail = $_GET['mail'];
  $mysqli = new mysqli('localhost', 'root', '', 'prova_esame_2017');
  if ($mysqli->connect_error) {
    die('Errore di connessione (' . $mysqli->connect_errno . ')' . $mysqli->connect_error);
  }

  $sql =    "SELECT * FROM utente
INNER JOIN autisti
ON  utente.CF = autisti.CF
WHERE utente.email='$mail'";
  $result = $mysqli->query($sql);
  while ($row = $result->fetch_assoc()) {
    $Npatente = $row['Npatente'];
  }
  $sql = "SELECT * FROM viaggio
  INNER JOIN av
  ON  viaggio.codV = av.CodV
  INNER JOIN autisti
  ON autisti.Npatente=AV.Npatente
  WHERE autisti.Npatente='$Npatente'
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
      echo ("<div>Partenza: " . $row["partenza"] . " - ora: " . $row["oraP"] . " " . "<br>" .
        "Partenza: " . $row["destinazione"] . " - ora: " . $row["oraA"] . "<br>" .
        "Posti Disponibili:" . $row["disponibilita"] . "<br>" .
        "Costo:" . $row["Costo"] . "<br>" .
        "Note:" . $row["note"] . "<br></div>");
      echo ("<form action='prenotazioniViaggio.php?mail=$mail&codV=$CodV' method='POST'>
    <input type='submit' value='Visualizza Prenotazioni'>
    </form>
    ");
    }
  ?>
</body>

</html>



