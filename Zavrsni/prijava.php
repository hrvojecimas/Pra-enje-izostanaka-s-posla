<?php
$db_host = 'localhost';
$db_user = 'root'; 
$db_pass = ''; 
$db_name = 'sql7238268'; 
session_start();
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
    die('Failed to connect to MySQL: ' . mysqli_connect_error());
}
if (isset($_POST['submit'])) {
    $ime = $_POST['ime'];
    $lozinka = $_POST['lozinka1'];

    
    
    $upit = "SELECT * FROM registracija WHERE ime = '$ime' AND lozinka = '$lozinka' ";

 
    
    
    $kor_u_bazi = mysqli_query($conn, $upit);
    


    if ($kor_u_bazi->num_rows != 0) {
    
        $_SESSION['registrirani'] = $ime;

        header("Location: http://localhost/proba/dis.php");
    }
    else 
header("Location: http://localhost/proba/dis3.php");
}



?>
<!DOCTYPE HTML>


<html>
    <head>
        
        <title>Registracija</title>
        <link rel="stylesheet" href="css/dizajn.css">
        <script src="js/jsfile.js"></script>
    </head>
    <body>
        <ul>
            <li><a class="active" href="prijava.php">Home</a></li>
            <li><a href="registracija.php">Registracija</a></li>
            <li><a href="objave.php">Objave</a></li>
        </ul>
        <form id="forma" method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
            <label for="ime">Ime</label>
            <input type="text" id="ime" name="ime" placeholder="Unesite Vaš ime..."/><br>
               <label for="lozinka1">Lozinka</label>
            <input type="password" id="lozinka1" name="lozinka1" placeholder="Unesite željenu lozinku..."/><br>
               <input type="submit" id="submit" name="submit" value="Registriraj se"/><br>
        </form>

    </body>

</html>