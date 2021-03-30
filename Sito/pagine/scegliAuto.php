<html>

<head>
    <?php
     $mail=$_GET['mail'];
     $Npatente=$_GET['Npatente'];
    $mysqli = new mysqli('localhost', 'root', '', 'prova_esame_2017');
    if ($mysqli->connect_error) {
        die('Errore di connessione (' . $mysqli->connect_errno . ')' . $mysqli->connect_error);
        
    }

        $sql = "SELECT * FROM auto WHERE Npatente='$Npatente'";
        $result = $mysqli->query($sql);
    ?>
    <link rel='stylesheet' href='./css.css'>
</head>

<body>
    <?php
if(is_bool($result)){
        
    }else
     while($row = $result->fetch_assoc()) {
       $targa=$row['targa'];
        echo ("Targa: " . $targa. 
        "<br> Modello: " . $row["modello"]. 
        "<br> Alimentazione:".$row["alimentazione"]."<br>
        <form action='aggiungi.php?Npatente=$Npatente&targa=$targa&mail=$mail' method='POST'>
        <input type='submit' value='Scegli macchina'>
        </form>
        <br>"
    );}
    
    echo("<div id='form'>
    <form action='aggiungi.php?mail=$mail&Npatente=$Npatente' method='POST'>
            Targa:
            <br> <input type='text' name='targa' required='required'>
            <br> Modello:
            <br>
            <input type='text' name='modello' required='required'>
            <br> Alimentazione:
            <br>
            <input type='text' name='alimentazione' required='required'>

            <input type='submit' value='Aggiungi macchina'>
        </form>")
        ?>
    </div>
</body>

</html>