<html>

<head>
   <?php
    
    $mysqli = new mysqli('localhost', 'root', '', 'prova_esame_2017');
    if ($mysqli->connect_error) {
        die('Errore di connessione (' . $mysqli->connect_errno . ')' . $mysqli->connect_error);
    } else {
        $destinazine=$_POST['destinazione'];
        $sql = "SELECT * FROM viaggio WHERE destinazione='$destinazine'";
        $result = $mysqli->query($sql);
        }?>
</head> 

<body>
    <?php
    if(is_bool($result)){
        echo ("Nessun Viaggio Trovato");
    }else
     while($row = $result->fetch_assoc()) {
        echo ("Partenza: " . $row["partenza"]. " - ora: " . $row["oraP"]. " " ."<br>".
        "Partenza: " . $row["destinazione"]. " - ora: " . $row["oraA"]."<br>".
        "Posti Disponibili:".$row["disponibilita"]."<br>".
        "Costo:".$row["Costo"]."<br>".
        "Note:".$row["note"]."<br>"
    );
      }
    ?>
</body>

</html>