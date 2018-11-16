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
if (isset($_POST['submit'])) {
    $selektiraniUser = $_POST['submit'];
    $cookie_name = "user";
    $cookie_value = $selektiraniUser;
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); 
    $upit = 'select z.ime,z.prezime,z.rfid,o.dnevni_odmor,o.tjedni_odmor,o.godisnji,o.neradni_dani,o.blagdani,o.bolovanje,o.roditeljski_dopust,o.mirovanje,o.placeni_dopust,o.neplaceni_dopust,o.nocni_rad,o.prekovremeni,o.zastoj,o.uk_godisnji,e.vrijeme,e.id_evidencije from zaposlenici z join zaposlenici_has_evidencija zhe on z.rfid=zhe.zaposlenici_rfid join evidencija e on zhe.evidencija_id=e.id_evidencije join odsustvo_has_evidencija ohe on ohe.evidencija_id=e.id_evidencije join odsustvo o on ohe.odsustvo_id=o.id_odsustva where z.rfid="' . $selektiraniUser . '"';
    $query = mysqli_query($conn, $upit);
    
    
}

 $upit = 'select z.ime,z.prezime,z.rfid,o.dnevni_odmor,o.tjedni_odmor,o.godisnji,o.neradni_dani,o.blagdani,o.bolovanje,o.roditeljski_dopust,o.mirovanje,o.placeni_dopust,o.neplaceni_dopust,o.nocni_rad,o.prekovremeni,o.zastoj,o.uk_godisnji,e.vrijeme,e.id_evidencije from zaposlenici z join zaposlenici_has_evidencija zhe on z.rfid=zhe.zaposlenici_rfid join evidencija e on zhe.evidencija_id=e.id_evidencije join odsustvo_has_evidencija ohe on ohe.evidencija_id=e.id_evidencije join odsustvo o on ohe.odsustvo_id=o.id_odsustva';
    $query1 = mysqli_query($conn, $upit);


    
if (!$query1) {
    die('Failed to connect to MySQL: ' . mysqli_connect_error());
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

        
        
        <title>Prikaz godisnji odmora</title>
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
    font-size: 15px;
    cursor: pointer;
    width: 10%;
}

 .span{
        margin-right: 15px;
        font-size: 20px;
        padding: 3.5px 0px;
          width: 50%;
        
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


      
           <div><h2 align="center">Godišnji</h2></div>
       
        
            <div class="col-sm-3"> 
        <form action="">
           
             
            <button class="fa" onClick="window.print()">&#xf02f;</i></button>
     
        </form>
             </div></div>
           
        <table class="table">
            <caption class="title"> </caption>
            <thead>
                <tr>
                    <th>Ime</th>
                    <th>Prezime</th>
                    <th>Iskorišteni godišnji</th>
                    <th>Preostali godišnji</th>
                    <th>Ukpuni godišnji</th>
                    <th></th>
                  

                </tr>
            </thead>
            <tbody>
                <?php
            
            if (isset($_SESSION['admin'])) {
   

            while ($row = mysqli_fetch_array($query1)) {
                ?>
                <tr>
                
                      <td><?php echo $row['ime']; ?></td>
                        <td><?php echo $row['prezime']; ?></td>
                          <td><?php echo $row['godisnji']; ?></td>
                            <td><?php echo $row['uk_godisnji']-$row['godisnji']; ?></td>
                              <td><?php echo $row['uk_godisnji']; ?></td>
                        
            
                                            
                                      
                              <td><a href="uk_godisnji.php?prezime=<?php echo $row["prezime"]; ?>">uredi</a></td>



				
                    
                   
               </tr><?php
            }
            }else
            {
                while ($row = mysqli_fetch_array($query1)) {
                ?>
                <tr>
                
                      <td><?php echo $row['ime']; ?></td>
                        <td><?php echo $row['prezime']; ?></td>
                          <td><?php echo $row['godisnji']; ?></td>
                            <td><?php echo $row['uk_godisnji']-$row['godisnji']; ?></td>
                              <td><?php echo $row['uk_godisnji']; ?></td>
                        
            
                          
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

