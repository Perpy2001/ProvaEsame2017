<html>

<head>
    <?php
    
    if(isset($_GET['errore'])){
     $errore = $_GET['errore'];}
    ?>
    <link rel='stylesheet' href='./css.css'>
</head>

<body>
    <div id="form">
        <form action='controlloReg.php' method='POST'>
            <p>!NON E' STATA IMPLEMENTATA SICULREZZA SULLE PASSWORD!</p>
            nome:
            <br> <input type='text' name='nome'>
            <br> cognome:
            <br>
            <input type='text' name='cognome'>
            <br>CF:
            <br> <input type='text' name='CF'>
            <br> tel:
            <br> <input type='text' name='tel'><br>
            <br> email:
            <br> <input type='email' name='mail'><br>
            <br> Password:
            <br> <input type='password' name='password'><br>

            <input type='submit' value="invio">
        </form>
        <?php
        echo "<p>$errore</p>"
        ?>
    </div>
</body>

</html>