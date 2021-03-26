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
        <form action='controlloAccesso.php' method='POST'>
            email: <br>
            <input type='email' name='email'><br> Password: <br>
            <input type='password' name='password'><br>
            <input type='submit' value="invio">
        </form>
    </div>
    <?php
       if(isset($errore)){ echo "<p>$errore</p>";}
        ?>

</body>

</html>