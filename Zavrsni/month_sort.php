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
if(isset ($_POST['sort'])){
    $mjesec=$_POST['mjeseci'];
    $rfid = $_COOKIE['user'];
    $upit1='select z.ime,z.prezime,z.rfid,o.dnevni_odmor,o.tjedni_odmor,o.godisnji,o.neradni_dani,o.blagdani,o.bolovanje,o.roditeljski_dopust,o.mirovanje,o.placeni_dopust,o.neplaceni_dopust,o.nocni_rad,o.prekovremeni,o.zastoj,e.vrijeme '
            . 'from zaposlenici z '
            . 'join zaposlenici_has_evidencija zhe on z.rfid=zhe.zaposlenici_rfid '
            . 'join evidencija e on zhe.evidencija_id=e.id_evidencije '
            . 'join odsustvo_has_evidencija ohe on ohe.evidencija_id=e.id_evidencije '
            . 'join odsustvo o on ohe.odsustvo_id=o.id_odsustva where z.rfid="' . $rfid . '" and (date(e.vrijeme) like "%-'.$mjesec.'-%")';
    $query1 = mysqli_query($conn, $upit1);
}
if (!$query1) {
    die('SQL Error: ' . mysqli_error($conn));
}
?>
<html>
    <head>
          <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

        
        <title>Prikaz Evidencije</title>
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
                padding: 5px;
                text-align: center;
            }

            tr:nth-child(even){background-color: #f2f2f2}

            th {
                background-color: #4CAF50;
                color: white;
             
            }

          

h2 { 
    padding: 1%;
    display: block;
    font-size: 2em;
    margin-top: 0.67em;
    margin-bottom: 0.67em;
    margin-left: 0;
    margin-right: 0;
   
}

.fa {
 
  
    padding: 3.5px 0px;
    font-size: 16px;
    cursor: pointer;
    width: 15%;
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
</style>
        
    </head>
    <body>


      
           <div><h2 align="center">Evidencija</h2></div>
       
        <div class="form-group">
         <label class="control-label col-sm-1">
        <div>Ukupna Mjesečna evidencija</div>
        </label>
            
            
            <div class="col-sm-3"> 
        <form action="month_sort.php" method="post">
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
            <button name="sort" class="button "type="submit">Sortiraj</button>
            <button id="printPageButton" class="fa" onClick="window.print();">&#xf02f;</button>
            <a href="index.php"><span class="fa fa-home" style="font-size:20px;"></span></a>
        </form>
             </div></div>
        
         <div class="form-group">
        <label class="control-label col-sm-1">
        <div> Mjesečna evidencija</div>
        </label>
            
            
            <div class="col-sm-5"> 
        <form action="month_report.php" method="post">
            
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
            <button name="sort2" class="button "type="submit">Mjesečna evidencija</button>
        </form>
        
        </div></div>
        <form action="uredi_korisnika.php" method="post">
            <button name="uredi" class="button "type="submit" value="<?php echo $selektiraniUser ?>">Dodaj odsustvo</button>
        </form>
        
         </div>
        
                
        <table class="table">
            <caption class="title"> </caption>
            <thead>
                <tr>
                    <th>Zaposlenik</th>
                    <th>Dnevni odmor</th>
                    <th>Tjedni odmor</th>
                    <th>Godisnji</th>
                    <th>Neradni dani</th>
                    <th>Blagdani</th>
                    <th>Bolovanje</th>
                    <th>Roditeljski dopust</th>
                    <th>mirovanje</th>
                    <th>Placeni dopust</th>
                    <th>Neplaceni dopust</th>
                    <th>Nocni rad</th>
                    <th>Prekovremeni</th>
                    <th>Zastoj</th>  

                </tr>
            </thead>
            <tbody>
                 <?php
            
            if (isset($_SESSION['admin'])) {
   

            while ($row = mysqli_fetch_array($query1)) {
                ?>
                <tr>


                    <td><?php echo $row['ime']; ?></td>
                    <td><?php echo $row['dnevni_odmor']; ?></td>
                    <td><?php echo $row['tjedni_odmor']; ?></td>
                    <td><?php echo $row['godisnji']; ?></td>
                    <td><?php echo $row['neradni_dani']; ?></td>
                    <td><?php echo $row['blagdani']; ?></td>
                    <td><?php echo $row['bolovanje']; ?></td>
                    <td><?php echo $row['roditeljski_dopust']; ?></td>
                    <td><?php echo $row['mirovanje']; ?></td>
                    <td><?php echo $row['placeni_dopust']; ?></td>
                    <td><?php echo $row['neplaceni_dopust']; ?></td>
                    <td><?php echo $row['nocni_rad']; ?></td>
                    <td><?php echo $row['prekovremeni']; ?></td>
                    <td><?php echo $row['zastoj']; ?></td>



                    <td><a href="edit.php?rfid_id=<?php echo $row["rfid"]; ?>&evidencija_id=<?php echo $row["id_evidencije"]; ?>">uredi</a></td>





                </tr><?php
            }}else
            {
                while ($row = mysqli_fetch_array($query1)) {
                ?>
                <tr>


                    <td><?php echo $row['ime']; ?></td>
                    <td><?php echo $row['dnevni_odmor']; ?></td>
                    <td><?php echo $row['tjedni_odmor']; ?></td>
                    <td><?php echo $row['godisnji']; ?></td>
                    <td><?php echo $row['neradni_dani']; ?></td>
                    <td><?php echo $row['blagdani']; ?></td>
                    <td><?php echo $row['bolovanje']; ?></td>
                    <td><?php echo $row['roditeljski_dopust']; ?></td>
                    <td><?php echo $row['mirovanje']; ?></td>
                    <td><?php echo $row['placeni_dopust']; ?></td>
                    <td><?php echo $row['neplaceni_dopust']; ?></td>
                    <td><?php echo $row['nocni_rad']; ?></td>
                    <td><?php echo $row['prekovremeni']; ?></td>
                    <td><?php echo $row['zastoj']; ?></td>






                </tr><?php
            }
            }
            ?>


            </tbody>
            <tfoot>

            </tfoot>
        </table>
    </body>
</html>

