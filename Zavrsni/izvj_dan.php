<?php
$db_host = 'localhost'; 
$db_user = 'root'; 
$db_pass = ''; 
$db_name = 'id6340571_sql7238268'; 

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
    die('Failed to connect to MySQL: ' . mysqli_connect_error());
}

$upitSve='select z.ime,z.prezime, idn.dolazak, idn.odlazak from id_num idn join zaposlenici z on idn.rfid=z.rfid';
$querySve = mysqli_query($conn, $upitSve);

if (isset($_POST['sort1'])) {
    $mjesec = $_POST['mjeseci'];
    $dani = $_POST['dani'];
 
    $upitSve = 'select z.ime,z.prezime, idn.dolazak, idn.odlazak from id_num idn join zaposlenici z on idn.rfid=z.rfid where date(idn.dolazak) like "%-' . $mjesec . '-' . $dani . '"';
    $querySve = mysqli_query($conn, $upitSve); 
}
?>


<html>
    <head>
         <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Day report</title>
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

                padding: 2px 2px;
                margin: 5px 0;


                width: 15%;
                opacity: 0.9;
            }
            .container{
                margin: 0 15%;
                text-align: center;
            }
            
             .fa {
 
  
    padding: 3px 3px;
    font-size: 16px;
    cursor: pointer;
    width: 4%;
}
            
        </style>
        
        <style type="text/css" media="print">
@page {
    size: auto;  
    margin: 0;  
}

        </style>
    </head>
    <body class="container">


        <div class="center1">
            <h2>Izvještaj za dan:</h2>
        </div>

        <form action="izvj_dan.php" method="post">
            <select name="mjeseci">
                <option value="01">Siječanj</option>
                <option value="02">Veljača</option>
                <option value="03">Ožujak</option>
                <option value="04">Travanj</option>
                <option value="05">Svibanj</option>
                <option value="06">Lipanj</option>
                <option value="07">Srpanj</option>
                <option value="08">Kolovoz</option>
                <option value="09">Rujan</option>
                <option value="10">Listopad</option>
                <option value="11">Studeni</option>
                <option value="12">Prosinac</option>
            </select>

            <select name="dani">
                <option value="01">1</option>
                <option value="02">2</option>
                <option value="03">3</option>
                <option value="04">4</option>
                <option value="05">5</option>
                <option value="06">6</option>
                <option value="07">7</option>
                <option value="08">8</option>
                <option value="09">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
                <option value="21">21</option>
                <option value="22">22</option>
                <option value="23">23</option>
                <option value="24">24</option>
                <option value="25">25</option>
                <option value="26">26</option>
                <option value="27">27</option>
                <option value="28">28</option>
                <option value="29">29</option>
                <option value="30">30</option>
                <option value="31">31</option>
            </select>


            <button name="sort1" class="button "type="submit">Prikaži</button>
            <button class="fa" onClick="window.print()">&#xf02f;</i></button>

            <table class="table">
                <caption class="title"> </caption>
                <thead>
                    <tr>
                        <th>Ime</th>
                        <th>Dolazak</th>
                        <th>Odlazak</th>
                    </tr>
                </thead>
                <tbody>
                <div>

                </div><br>

                <div>
<?php
while ($row = mysqli_fetch_array($querySve)) {


    echo '<tr>
                                        <td>' . $row['ime'] . ' '.$row['prezime'].'</td>
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
