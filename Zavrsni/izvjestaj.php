<?php
$db_host = 'localhost'; 
$db_user = 'root'; 
$db_pass = ''; 
$db_name = 'id6340571_sql7238268'; 

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
    die('Failed to connect to MySQL: ' . mysqli_connect_error());
}

$rfid = $_COOKIE['user'];
$upit1='select z.ime,z.prezime,z.rfid,o.dolazak,o.odlazak,o.dnevni_odmor,o.tjedni_odmor,o.godisnji,o.neradni_dani,o.blagdani,o.bolovanje,o.roditeljski_dopust,o.mirovanje,o.placeni_dopust,o.neplaceni_dopust,o.nocni_rad,o.prekovremeni,o.zastoj,e.vrijeme '
            . 'from zaposlenici z '
            . 'join zaposlenici_has_evidencija zhe on z.rfid=zhe.zaposlenici_rfid '
            . 'join evidencija e on zhe.evidencija_id=e.id_evidencije '
            . 'join odsustvo_has_evidencija ohe on ohe.evidencija_id=e.id_evidencije '
            . 'join odsustvo o on ohe.odsustvo_id=o.id_odsustva where z.rfid="' . $rfid . '"';
$query = mysqli_query($conn, $upit1);




if (!$query) {
    die('SQL Error: ' . mysqli_error($conn));
}
?>

<html>
    <head>
        <title>Displaying MySQL Data in HTML Table</title>
        <style type="text/css">
            body {
                font-size: 15px;
                color: #343d44;
                font-family: "segoe-ui", "open-sans", tahoma, arial;
                padding: 0;
                margin: 0;


            }
            table {
                border-collapse: collapse;
                width: 100%;

            }

            th, td {
                text-align: left;
                padding: 8px;
                text-align: center;
                border: 1px solid black;
                border-collapse: collapse;
            }

            tr:nth-child(even){background-color: #f2f2f2}

            th {
                background-color: #4CAF50;
                color: white;
            }

            .center1 {
                margin: auto;
                width: 30%;
                text-align: center;

                padding: 10px;
            }

            button {

                padding: 5px 5px;
                margin: 8px 0;


                width: 50%;
                opacity: 0.9;
            }
            .container{
                margin: 0 10%;
                text-align: center;
            }
        

        </style>
    </head>
    <body class="container">

        <div class="center1">
            <h2>Izvjestaj za:</h2>
        </div>
        <table class="table">
            <caption class="title"> </caption>
            <thead>
                 <tr>  <th>Poslodavac:</th>
                     <th>Mev</th>
                     <th></th>
                     <th></th>
                     <th></th>
                     <th></th>
                     <th></th>
                     <th></th>
                   
                      
                </tr>
                 <tr>  <th>Mjesto rada:</th>
                      <th>J.Jelačića 22a</th>
                       <th>40000 Čakovec</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        
                </tr>
                 <tr>  <th>Za mjesec: </th>
                     <th><?php  
                     $pr='SELECT (vrijeme) FROM evidencija';
                $query2 = mysqli_query($conn, $pr);
                $row1 = mysqli_fetch_array($query2);
                echo ($row1['vrijeme']); 
                
                
                     ?></th>
                       <th>godine:</th>
                        <th>Datum</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                </tr>
                 <tr>  <th>Ime i Prezime</th>
                      <th>
                           <?php
                $upit_zaposlenik='select ime,prezime from zaposlenici where rfid="' . $rfid . '"';
                $query1 = mysqli_query($conn, $upit_zaposlenik);
                $row1 = mysqli_fetch_array($query1);
                echo $row1['ime'] . " " . $row1['prezime']; 
                
                ?>                     
                      </th>
                       <th></th>
                       <th></th>
                       <th></th>
                       <th></th>
                       <th></th>
                       <th></th>
                </tr>
              
                <tr>
                    <th>Datum</th>
                    <th>Dolazak</th>
                    <th>Odlazak</th>
                    <th>Redovno</th>
                    <th>Praznik</th>
                    <th>Godišnji</th>
                    <th>Bolovanje</th>
                    <th>Ostalo</th>
                </tr>
            </thead>
            <tbody>
            <div>
                <?php
                $upit_zaposlenik='select ime,prezime from zaposlenici where rfid="' . $rfid . '"';
                $query1 = mysqli_query($conn, $upit_zaposlenik);
                $row1 = mysqli_fetch_array($query1);
                echo $row1['ime'] . " " . $row1['prezime']; 
                
                ?>
            </div><br>

            <div>
                <?php
                while ($row = mysqli_fetch_array($query)) {


                    echo '<tr>
                                        <td>' . $row['vrijeme']. '</td>
                                        <td>' . $row['dolazak'] . '</td>
                                        <td>' . $row['odlazak'] . '</td> 
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
				</tr>';
                    
                }
                ?>
            </div>

                


            </tbody>
            <tfoot>

            </tfoot>
        </table>
    </body>
</html>
