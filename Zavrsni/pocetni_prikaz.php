<?php
$db_host = 'localhost'; 
$db_user = 'root';
$db_pass = ''; 
$db_name = 'id6340571_sql7238268'; 

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);


$upit = 'select (ime_tvrtke_sjediste,oib,maticni_broj,broj_zaposlenih,broj_odjela,radno_vrijme,minutaza) from pocetna';


    $result2 = mysqli_query($conn, $upit);




if (isset($_POST['submit'])) {
    $ime_tvrtke = $_POST['ime_tvrtke'];
    $sjediste = $_POST['sjediste'];
    $oib=$_POST['oib'];
    $maticni_broj=$_POST['maticni_broj'];
    $radno_vrijem=$_POST['radno_vrijeme'];
    $minutaza=$_POST['minutaza'];
    
    
    
    

    $upit1 = 'INSERT INTO pocetna(ime_tvrtke,sjediste,oib,maticni_broj,radno_vrijeme,minutaza,id) VALUES("'.$ime_tvrtke.'","'.$sjediste.'",'.$oib.','.$maticni_broj.','.$radno_vrijem.','.$minutaza.',default)';
    $upit2 = 'UPDATE pocetna SET ime_tvrtke="'.$ime_tvrtke.'", sjediste="'.$sjediste.'", oib='.$oib.', maticni_broj='.$maticni_broj.',radno_vrijeme='.$radno_vrijem.', minutaza='.$minutaza.', id=default';

    $result1 = mysqli_query($conn, $upit2);

    if (!$result1) {
        printf("Error: %s\n", mysqli_error($conn));
        exit();
    }
  
}
?>
<!doctype thml>
<html>
    <head>
        <title>Podaci o poduzeću</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
            <form class="form-horizontal" method="post">
                <h1>Uredi podatke</h1><br><br>
                <div class="form-group">
                    <label class="control-label col-sm-2">Ime poduzeća</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="ime_tvrtke" placeholder="Ime poduzeća" >
                    </div>
                    
                </div>
                   <div class="form-group">
                    <label class="control-label col-sm-2">Sjedište</label>

                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="sjediste" placeholder="Sjedište">
                    </div>
                </div>
                
                   <div class="form-group">
                    <label class="control-label col-sm-2">Oib</label>

                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="oib" placeholder="Oib" required="" >
                    </div>
                </div>
                
                   <div class="form-group">
                    <label class="control-label col-sm-2">Matični broj</label>

                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="maticni_broj" placeholder="Matični broj" required="" >
                    </div>
                </div>
                
                          
                
                   <div class="form-group">
                    <label class="control-label col-sm-2">Radno vrijeme</label>

                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="radno_vrijeme" placeholder="Radno vrijeme" required="" >
                    </div>
                </div>
                
                   <div class="form-group">
                    <label class="control-label col-sm-2">Minutaža</label>

                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="minutaza" placeholder="Minutaža" required="" >
                    </div>
                </div>
                
                
               <div class="col-sm-offset-2 col-sm-10">
                    <button class="btn btn-default" type="submit" name="submit">Uredi početnu stranicu</button>
                </div>
    </body>

</html>
