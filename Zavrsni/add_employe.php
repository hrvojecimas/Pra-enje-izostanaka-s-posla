<?php
include('employe.php');
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "id6340571_sql7238268";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    
} else if (isset($_POST['submit'])) {
    $rfid = $_POST['rfid'];
    $ime = $_POST['ime'];
    $prezime = $_POST['prezime'];
    $tip = $_POST['tip'];
    $odjel = $_POST['odjel'];
    $save_upit = "insert into zaposlenici(rfid,ime,prezime,tip_zaposlenika_id,odjel_id) values ('$rfid','$ime','$$prezime','$tip','$odjel')";
    $conn->query($save_upit);
}
?>
<!DOCTYPE HTML>
<html>  
    <body>
        <form action="" method="post">
            Prikaži: <input type="text" name="rfid" value="<?php echo $temp1; ?>" readonly><br>
            Ime: <input type="text" name="ime"><br>
            Prezime: <input type="text" name="prezime"><br>
            Tip zaposlenika:    
            <select name="tip">
                <?php
                $upit = "select id_tipa, naziv from tip_zaposlenika";
                $tipovi_zaposlenika = $conn->query($upit);
                while ($row = mysqli_fetch_array($tipovi_zaposlenika)) {
                    echo "<option value=" . $row['id_tipa'] . ">" . $row['naziv'] . "</option>";
                }
                ?>
            </select>
            <br>
            Odjel: 
            <select name="odjel">
                <?php
                $upit2 = "select id_odjela, naziv_odjela from odjeli";
                $odjeli = $conn->query($upit2);
                while ($row = mysqli_fetch_array($odjeli)) {
                    echo "<option value=" . $row['id_odjela'] . ">" . $row['naziv_odjela'] . "</option>";
                }
                ?>
            </select>
            <br>
            <input name="submit" type="submit">
        </form>
    </body>
</html>

