<html>

<head>
   <?php
    
    $mysqli = new mysqli('localhost', 'root', '', 'prova_esame_2017');
    if ($mysqli->connect_error) {
        die('Errore di connessione (' . $mysqli->connect_errno . ')' . $mysqli->connect_error);
    } else {
        $partenza=$_POST['partenza'];
        $sql = "SELECT * FROM viaggio WHERE partenza='$partenza'";
        $result = $mysqli->query($sql);
        }?>
</head> 

<body>
    <?php
    if(is_bool($result)){
        echo ("Nessun Viaggio Trovato");
    }else
     while($row = $result->fetch_assoc()) {
        echo ("<div>Partenza: " . $row["partenza"]. " - ora: " . $row["oraP"]. " " ."<br>".
        "Destinazione: " . $row["destinazione"]. " - ora: " . $row["oraA"]."<br>".
        "Posti Disponibili:".$row["disponibilita"]."<br>".
        "Costo:".$row["Costo"]."<br>".
        "Note:".$row["note"]."<br></div><br>"
    );
      }
    ?>
</body>

</html>