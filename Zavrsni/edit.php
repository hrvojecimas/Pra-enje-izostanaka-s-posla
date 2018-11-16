<?php
session_start();

$db_host = 'localhost'; 
$db_user = 'root'; 
$db_pass = ''; 
$db_name = 'id6340571_sql7238268'; 
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

$upit_polja = 'select z.ime,z.prezime,z.rfid,o.dnevni_odmor,o.tjedni_odmor,o.godisnji,o.neradni_dani,o.blagdani,o.bolovanje,o.roditeljski_dopust,o.mirovanje,o.placeni_dopust,o.neplaceni_dopust,o.nocni_rad,o.prekovremeni,o.zastoj,e.vrijeme '
        . 'from zaposlenici z '
        . 'join zaposlenici_has_evidencija zhe on z.rfid=zhe.zaposlenici_rfid '
        . 'join evidencija e on zhe.evidencija_id=e.id_evidencije '
        . 'join odsustvo_has_evidencija ohe on ohe.evidencija_id=e.id_evidencije '
        . 'join odsustvo o on ohe.odsustvo_id=o.id_odsustva '
        . 'where z.rfid="' . $_GET['rfid_id'] . '" and e.id_evidencije=' . $_GET['evidencija_id'] . '';
$query = mysqli_query($conn, $upit_polja);
$row = mysqli_fetch_array($query);
if (!$query) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}
if (isset($_POST['submit'])) {
    $rfid = $_GET['rfid_id'];
    $id_evidencije = $_GET['evidencija_id'];
    $dnevni_odmor = $_POST['dnevni_odmor'];
    $tjedni_odmor = $_POST['tjedni_odmor'];
    $godisnji = $_POST['godisnji'];
    $neradni_dani = $_POST['ner_dani'];
    $blagdani = $_POST['blagdani'];
    $bolovanje = $_POST['bolovanje'];
    $roditeljski_dopust = $_POST['roditeljski_dopust'];
    $mirovanje = $_POST['mirovanje'];
    $placeni_dopust = $_POST['placeni_dopust'];
    $neplaceni_dopust = $_POST['neplaceni_dopust'];
    $nocni_rad = $_POST['nocni_rad'];
    $prekovremeni = $_POST['prekovremeni'];
    $zastoj = $_POST['zastoj'];


    $upit2 = 'UPDATE zaposlenici z '
            . 'JOIN zaposlenici_has_evidencija zhe ON z.rfid=zhe.zaposlenici_rfid '
            . 'JOIN evidencija e ON e.id_evidencije=zhe.evidencija_id '
            . 'JOIN odsustvo_has_evidencija ohe ON e.id_evidencije=ohe.evidencija_id '
            . 'JOIN odsustvo o ON o.id_odsustva=ohe.odsustvo_id '
            . 'SET o.dnevni_odmor=' . $dnevni_odmor . ', o.tjedni_odmor=' . $tjedni_odmor . ', o.godisnji=' . $godisnji . ', o.neradni_dani=' . $neradni_dani . ',o.blagdani=' . $blagdani . ',o.bolovanje=' . $bolovanje . ',o.roditeljski_dopust=' . $roditeljski_dopust . ',o.mirovanje=' . $mirovanje . ',o.placeni_dopust=' . $placeni_dopust . ',o.neplaceni_dopust=' . $neplaceni_dopust . ',o.nocni_rad=' . $nocni_rad . ',o.prekovremeni=' . $prekovremeni . ',o.zastoj=' . $zastoj . ' '
            . 'WHERE z.rfid="' . $rfid . '" AND e.id_evidencije=' . $id_evidencije . ';';

    $result1 = mysqli_query($conn, $upit2);

    if (!$result1) {
        printf("Error: %s\n", mysqli_error($conn));
        exit();
    }
    header('Location: https://hrvojecimas01.000webhostapp.com/display2.php');
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
                    <label class="control-label col-sm-2">Dnevni odmor</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="dnevni_odmor" placeholder="Dnevni odmor" value="<?php echo $row['dnevni_odmor'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Tjedni odmor</label>

                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="tjedni_odmor" placeholder="Tjedni odmor" value="<?php echo $row['tjedni_odmor'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Godisnji</label>

                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="godisnji" placeholder="Godisnji" value="<?php echo $row['godisnji'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Neradni dani</label>

                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="ner_dani" placeholder="Neradni dani" value="<?php echo $row['neradni_dani'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Blagdani</label>

                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="blagdani" placeholder="Blagdani" value="<?php echo $row['blagdani'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Bolovanje</label>

                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="bolovanje" placeholder="Bolovanje" value="<?php echo $row['bolovanje'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Roditljski dopust</label>

                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="roditeljski_dopust" placeholder="Roditeljski dopust" value="<?php echo $row['roditeljski_dopust'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Mirovanje</label>

                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="mirovanje" placeholder="Mirovanje" value="<?php echo $row['mirovanje'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Placeni dopust</label>

                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="placeni_dopust" placeholder="Placeni dopust" value="<?php echo $row['placeni_dopust'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Neplaceni dopust</label>

                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="neplaceni_dopust" placeholder="Neplaceni dopust" value="<?php echo $row['neplaceni_dopust'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Nocni rad</label>

                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="nocni_rad" placeholder="Nocni rad" value="<?php echo $row['nocni_rad'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Prekovremeni</label>

                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="prekovremeni" placeholder="Prekovremeni" value="<?php echo $row['prekovremeni'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Zastoj</label>

                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="zastoj" placeholder="Zastoj" value="<?php echo $row['zastoj'] ?>">
                    </div>
                </div>
                <div class="col-sm-offset-2 col-sm-10">
                    <button class="btn btn-default" type="submit" name="submit">Ažuriraj zaposlenika</button>
                </div>
            </form>   
        </div>
    </body>

</html>
