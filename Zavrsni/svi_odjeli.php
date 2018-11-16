<?php

$db_host = 'localhost'; 
$db_user = 'root'; 
$db_pass = ''; 
$db_name = 'id6340571_sql7238268'; 


$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);



$sql = 'SELECT id_odjela,naziv_odjela FROM odjeli';
		
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
    
<h2>Svi odjeli</h2>
       <div class="container text-center">
  
  <table class="table">
    <thead class="thead-light">
                <tr>
                    <th>Id odjela</th>
                    <th>naziv odjela</th>
                    
                    
                </tr>
            </thead>
            <tbody>


<?php
                while ($row = mysqli_fetch_array($query)) {


                    echo '<tr>
					
                                        <td>' . $row['id_odjela'] . '</td>
                                        <td>' . $row['naziv_odjela'] . '</td>

				</tr>';
                }
                ?>


            </tbody>
            <tfoot>

            </tfoot>
        </table>
    </body>








