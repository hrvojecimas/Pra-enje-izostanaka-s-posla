<?php

$db_host = 'localhost'; 
$db_user = 'root'; 
$db_pass = ''; 
$db_name = 'id6340571_sql7238268'; 
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

$prezime = $_GET['prezime'];
    
$upit_polja = 'select z.ime,z.prezime,z.rfid,o.dnevni_odmor,o.tjedni_odmor,o.godisnji,o.neradni_dani,o.blagdani,o.bolovanje,o.roditeljski_dopust,o.mirovanje,o.placeni_dopust,o.neplaceni_dopust,o.nocni_rad,o.prekovremeni,o.zastoj,o.uk_godisnji,e.vrijeme '
        . 'from zaposlenici z '
        . 'join zaposlenici_has_evidencija zhe on z.rfid=zhe.zaposlenici_rfid '
        . 'join evidencija e on zhe.evidencija_id=e.id_evidencije '
        . 'join odsustvo_has_evidencija ohe on ohe.evidencija_id=e.id_evidencije '
        . 'join odsustvo o on ohe.odsustvo_id=o.id_odsustva '
        . 'where z.prezime="' . $_GET['prezime'] . '" ';
$query = mysqli_query($conn, $upit_polja);
$row = mysqli_fetch_array($query);
if (!$query) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}
if (isset($_POST['submit'])) {
    $prezime = $_GET['prezime'];
   
    $uk_godisnji = $_POST['uk_godisnji'];
   


    $upit2 = 'UPDATE zaposlenici z '
            . 'JOIN zaposlenici_has_evidencija zhe ON z.rfid=zhe.zaposlenici_rfid '
            . 'JOIN evidencija e ON e.id_evidencije=zhe.evidencija_id '
            . 'JOIN odsustvo_has_evidencija ohe ON e.id_evidencije=ohe.evidencija_id '
            . 'JOIN odsustvo o ON o.id_odsustva=ohe.odsustvo_id '
            . 'SET o.uk_godisnji=' . $uk_godisnji . ' '
          . 'where z.prezime="' . $_GET['prezime'] . '" ';

    $result1 = mysqli_query($conn, $upit2);

    
        header('Location: http://localhost/Zavrsni/index.php');
    
    if (!$result1) {
        printf("Error: %s\n", mysqli_error($conn));
        exit();
    }

}
?>
<!doctype thml>
<html>
    <head>
        <title>Uredi odsustva</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
            <form class="form-horizontal" method="post">
                <h1>Uredi odsustva</h1><br><br>
                <div class="form-group">
                    <label class="control-label col-sm-2">Uk godisnji</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="uk_godisnji" placeholder="Dnevni odmor" value="<?php echo $row['uk_godisnji'] ?>">
                    </div>
                </div>
                
               
                <div class="col-sm-offset-2 col-sm-10">
                    <button class="btn btn-default" type="submit" name="submit">Ažuriraj goidsnji</button>
                </div>
            </form>   
        </div>
    </body>

</html>
