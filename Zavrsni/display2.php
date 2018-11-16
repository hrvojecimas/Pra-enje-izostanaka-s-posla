<?php
$db_host = 'localhost'; 
$db_user = 'root';
$db_pass = ''; 
$db_name = 'id6340571_sql7238268'; 

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
    die('Failed to connect to MySQL: ' . mysqli_connect_error());
}

$sql = 'select z.ime,z.prezime,z.rfid,o.naziv_odjela,tz.naziv '
        . 'from zaposlenici z '
        . 'join odjeli o '
        . 'on z.odjel_id=o.id_odjela '
        . 'join tip_zaposlenika tz '
        . 'on z.tip_zaposlenika_id=tz.id_tipa;';



$query = mysqli_query($conn, $sql);

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

        </style>
    </head>
    <body>

        <div class="center1">
            <h2>Popis zaposlenika</h2>
        </div>
        <table class="table">
            <caption class="title"> </caption>
            <thead>
                <tr>
                    <th>Ime i Prezime</th>
                    <th>Rfid</th>
                    <th>Odjel</th>
                    <th>Tip zaposlenika</th>

                </tr>
            </thead>
            <tbody>



            <form action="display_for_user.php" method="post">    
                <?php
                while ($row = mysqli_fetch_array($query)) {


                    echo '<tr>
				       <td><button name="submit" class="button "type="submit" value=' . $row['rfid'] . '>' . $row['ime'] .'  '.$row['prezime']. '</button></td>
					
                                        <td>' . $row['rfid'] . '</td>
                                        <td>' . $row['naziv_odjela'] . '</td>   
                                        <td>' . $row['naziv'] . '</td>
				</tr>';
                }
                ?>

            </form>  
        </tbody>
        <tfoot>

        </tfoot>
    </table>
</body>
</html>