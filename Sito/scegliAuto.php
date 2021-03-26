<html>

<head>
    <?php
    $mysqli = new mysqli('localhost', 'root', '', 'prova_esame_2017');
    if ($mysqli->connect_error) {
        die('Errore di connessione (' . $mysqli->connect_errno . ')' . $mysqli->connect_error);
        
    }
    $Npatente=$_POST['Npatetnte'];
        $sql = "SELECT * FROM auto WHERE Npatetnte='$Npatente'";
        $result = $mysqli->query($sql);
    ?>
    <link rel='stylesheet' href='./css.css'>
</head>

<body>
    <?php
if(is_bool($result)){
        
    }else
     while($row = $result->fetch_assoc()) {
        echo ("Targa: " . $row["targa"]. 
        "Modello: " . $row["modello"]. 
        "Alimentazione:".$row["alimentazione"]."<br>"
    );}
    ?>
    <div id="form">
        <form action="aggiuntaViaggio.php?Npatente=".$Npatente method='POST'>
            Targa:
            <br> <input type='text' name='targa'>
            <br> Modello:
            <br>
            <input type='text' name='modello'>
            <br> Alimentazione:
            <br>
            <input type='text' name='alimentazione'>

            <input type='submit' value="Aggiungi macchina ">
        </form>
        <?php
       
        ?>
    </div>
</body>

</html>