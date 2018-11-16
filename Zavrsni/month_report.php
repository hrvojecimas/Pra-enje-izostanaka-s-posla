<?php
session_start();
$db_host = 'localhost'; 
$db_user = 'root'; 
$db_pass = '';
$db_name = 'id6340571_sql7238268'; 

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
    die('Failed to connect to MySQL: ' . mysqli_connect_error());
}



if (isset($_POST['sort2'])) {
    
    $rfid = $_COOKIE['user'];
    $mjesec = $_POST['mjeseci'];
   $upit1='select dolazak,odlazak from id_num where rfid="'.$rfid.'" and date(dolazak) like "%-' . $mjesec . '-%" and date(odlazak) like "%-' . $mjesec . '-%"';
    $query = mysqli_query($conn, $upit1);
    if (!$query) {
        die('SQL Error: ' . mysqli_error($conn));
    }
}
?>

<html>
    <head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

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
            .container{
                margin: 0 15%;
                text-align: center;
            }
            
       .fa {
 
  
    padding: 3px 0px;
    font-size: 15px;
    cursor: pointer;
    width: 5%;
}

        </style>
        
        <style type="text/css" media="print">
@media print {
  a[href]:after {
    content: none !important;
     
  }
  
    @page { margin: 0; }
  body  { margin: 1.6cm; }
}

.fa {


                padding: 3.5px 0px;
                font-size: 16px;
                cursor: pointer;
                width: 15%;
            }


</style>
        
    </head>
    <body class="container">

        <div class="center1">
            <h2>Mjesečni izvještaj</h2>
        </div>
        <table class="table">
            <caption class="title"> </caption>
            <thead>
                <tr>
                    <th>Dolazak</th>
                    <th>Odlazak</th>
                </tr>
            </thead>
            <tbody>
            <div>
                <?php
                $upit_zaposlenik = 'select ime,prezime from zaposlenici where rfid="' . $rfid . '"';
                $query1 = mysqli_query($conn, $upit_zaposlenik);
                $row1 = mysqli_fetch_array($query1);
                echo $row1['ime'] . " " . $row1['prezime'];
                ?>
                
                <button id="printPageButton" class="fa" onClick="window.print();">&#xf02f;</button>
                <a href="index.php"><span class="fa fa-home" style="font-size:20px;"></span></a>
                 
            </div><br>

            <div>
<?php
while ($row = mysqli_fetch_array($query)) {


    echo '<tr>
                                        <td>' . $row['dolazak'] . '</td>
                                        <td>' . $row['odlazak'] . '</td>   
				</tr>';
}
?>
            </div>




        </tbody>
    </table>
</body>
</html>
