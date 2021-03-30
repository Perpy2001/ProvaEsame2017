<html>

<head>
   <?php
      $mail=$_GET['mail'];
    $mysqli = new mysqli('localhost', 'root', '', 'prova_esame_2017');
    if ($mysqli->connect_error) {
        die('Errore di connessione (' . $mysqli->connect_errno . ')' . $mysqli->connect_error);
    }

    $sql =    "SELECT * FROM utente
INNER JOIN passegieri
ON  utente.CF = passegieri.CF
WHERE utente.email='$mail'";    
 $result = $mysqli->query($sql);
 while($row = $result->fetch_assoc()){
    $codP=$row['CodP'];
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
    if(is_bool($result)){
        echo ("Nessun Viaggio Trovato");
    }else
     while($row = $result->fetch_assoc()) {
         $CodV=$row["codV"];
        echo ("<div>Partenza: " . $row["partenza"]. " - ora: " . $row["oraP"]. " " ."<br>".
        "Partenza: " . $row["destinazione"]. " - ora: " . $row["oraA"]."<br>".
        "Posti Disponibili:".$row["disponibilita"]."<br>".
        "Costo:".$row["Costo"]."<br>".
        "Note:".$row["note"]."<br></div>"
    );
  /*  echo("<form action='../pagine/prenota.php?mail=$mail&Codv=$CodV&CodP=$codP' method='POST'>
    <input type='submit' value='Richiedi un posto'>
    </form>
    ");*/
      }
    ?>
</body>

</html>