<?php

$db_host = 'localhost';
$db_user = 'root'; 
$db_pass = '';
$db_name = 'id6340571_sql7238268'; 

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);



$sql = 'select z.ime,z.prezime,z.rfid,o.naziv_odjela,tz.naziv '
        . 'from zaposlenici z '
        . 'join odjeli o '
        . 'on z.odjel_id=o.id_odjela '
        . 'join tip_zaposlenika tz '
        . 'on z.tip_zaposlenika_id=tz.id_tipa;';
		
$query = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</head>
<body>
<body>
     
    <style>
            h2 {
 

                margin: auto;
                width: 30%;
                text-align: center;
                padding: 20px;
}
         
         
       .table .thead-light th {
 
   background-color: #4CAF50;
                color: white;
        
    </style>

       <div class="container text-center">
  <h2>Svi zaposlenici</h2>
  <table class="table">
    <thead class="thead-light">
                <tr>
                    <th>Ime</th>
                    <th>Prezime</th>
                    <th>Odjel</th>
                    
                </tr>
            </thead>
            <tbody>


<?php
                while ($row = mysqli_fetch_array($query)) {


                    echo '<tr>
					
                                        <td>' . $row['ime'] . '</td>
                                        <td>' . $row['prezime'] . '</td>
                                        <td>' . $row['naziv_odjela'] . '</td>

				</tr>';
                }
                ?>


            </tbody>
            <tfoot>

            </tfoot>
        </table>
    </body>








