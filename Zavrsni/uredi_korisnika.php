<?php
session_start();
if(!isset($_SESSION['admin'])){
    header('Location: http://localhost/Zavrsni/index.php');
}
$db_host = 'localhost'; 
$db_user = 'root'; 
$db_pass = '';
$db_name = 'id6340571_sql7238268'; 

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
    die('Failed to connect to MySQL: ' . mysqli_connect_error());
}



$upit = 'select z.ime,z.prezime,z.rfid,o.dnevni_odmor,o.tjedni_odmor,o.godisnji,o.neradni_dani,o.blagdani,o.bolovanje,o.roditeljski_dopust,o.mirovanje,o.placeni_dopust,o.neplaceni_dopust,o.nocni_rad,o.prekovremeni,o.zastoj,e.vrijeme '
        . 'from zaposlenici z '
        . 'join zaposlenici_has_evidencija zhe on z.rfid=zhe.zaposlenici_rfid '
        . 'join evidencija e on zhe.evidencija_id=e.id_evidencije '
        . 'join odsustvo_has_evidencija ohe on ohe.evidencija_id=e.id_evidencije '
        . 'join odsustvo o on ohe.odsustvo_id=o.id_odsustva '
        . 'where z.rfid="' . $_COOKIE['user'] . '"';

$query = mysqli_query($conn, $upit);
$row = mysqli_fetch_array($query);



if (!$query) {
    die('SQL Error: ' . mysqli_error($conn));
}



if (isset($_POST['submit'])) {
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
    $user = $_COOKIE['user'];
    $upit2 = 'insert into odsustvo(id_odsustva,dnevni_odmor,tjedni_odmor,godisnji,neradni_dani,blagdani,bolovanje,roditeljski_dopust,mirovanje,placeni_dopust,nocni_rad,neplaceni_dopust,prekovremeni,zastoj) '
            . 'values (default,' . $dnevni_odmor . ',' . $tjedni_odmor . ',' . $godisnji . ',' . $neradni_dani . ',' . $blagdani . ',' . $bolovanje . ',' . $roditeljski_dopust . ',' . $mirovanje . ',' . $placeni_dopust . ',' . $neplaceni_dopust . ',' . $nocni_rad . ',' . $prekovremeni . ',' . $zastoj . ')';
    $query = mysqli_query($conn, $upit2);
    $upit3 = 'insert into evidencija(id_evidencije,vrijeme) values (default,now())';
    $query2 = mysqli_query($conn, $upit3);
    $upit4 = 'insert into odsustvo_has_evidencija(odsustvo_id,evidencija_id) values ((SELECT max(id_odsustva) FROM odsustvo),(SELECT max(id_evidencije) FROM evidencija))';
    $query3 = mysqli_query($conn, $upit4);
    $upit5 = 'insert into zaposlenici_has_evidencija(zaposlenici_rfid,evidencija_id) values ("' . $user . '",(SELECT max(id_evidencije) FROM evidencija))';
    $query4 = mysqli_query($conn, $upit5);

    if ($query4 != null) {
        header('Location: https://hrvojecimas01.000webhostapp.com/display2.php');
    }
}
?>
<!doctype thml>
<html>
    <head>
        <title>Dodaj novo odsustvo</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
            <form class="form-horizontal" method="post">
                <h1>Dodaj novo odsustvo</h1><br><br>
                <div class="form-group">
                    <label class="control-label col-sm-2">Dnevni odmor</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="dnevni_odmor" placeholder="Dnevni odmor" required="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Tjedni odmor</label>

                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="tjedni_odmor" placeholder="Tjedni odmor" required="" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Godisnji</label>

                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="godisnji" placeholder="Godisnji" required="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Neradni dani</label>

                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="ner_dani" placeholder="Neradni dani" required="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Blagdani</label>

                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="blagdani" placeholder="Blagdani" required="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Bolovanje</label>

                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="bolovanje" placeholder="Bolovanje" required="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Roditljski dopust</label>

                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="roditeljski_dopust" placeholder="Roditeljski dopust" required="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Mirovanje</label>

                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="mirovanje" placeholder="Mirovanje" required="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Placeni dopust</label>

                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="placeni_dopust" placeholder="Placeni dopust" required="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Neplaceni dopust</label>

                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="neplaceni_dopust" placeholder="Neplaceni dopust" required="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Nocni rad</label>

                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="nocni_rad" placeholder="Nocni rad" required="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Prekovremeni</label>

                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="prekovremeni" placeholder="Prekovremeni" required="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Zastoj</label>

                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="zastoj" placeholder="Zastoj" required="">
                    </div>
                </div>
                <div class="col-sm-offset-2 col-sm-10">
                    <button class="btn btn-default" type="submit" name="submit">Dodaj novo odsustvo</button>
                </div>
            </form>   
        </div>

    </body>
</html>
