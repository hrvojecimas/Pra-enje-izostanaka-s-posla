<?php

$db_host = 'localhost'; // Server Name
$db_user = 'root'; // Username
$db_pass = ''; // Password
$db_name = 'id6340571_sql7238268'; // Database Name

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);



$sql = 'SELECT * 
		FROM id_num' ;
		
$query = mysqli_query($conn, $sql);

 $rfid='';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}  

if (isset($_POST['submit'])) {
    

    $rfid = $_POST['rfid'];
    $ime = $_POST['ime'];
    $prezime = $_POST['prezime'];
   
      $tip = $_POST['tip'];
    $odjel = $_POST['odjel'];
    $save_upit = "insert into zaposlenici(rfid,ime,prezime,tip_zaposlenika_id,odjel_id) values ('$rfid','$ime','$prezime','$tip','$odjel')";
    $conn->query($save_upit);


$page = $_SERVER['PHP_SELF'];
$sec = "0";
//refresh in 1 second.
header("Refresh: $sec; url=$page");
   }
      
    
  
  
  if (isset($_POST["refresh1"])){
      $result = mysqli_query ($conn,$sql);
  
 while ($row = mysqli_fetch_array($result)){    
    $rfid=$row['rfid'];
    }

} 
    /*
if (isset($_POST['submit'])) {
    $conn = new mysqli($servername, $username, $password, $dbname);

$sql2="TRUNCATE TABLE id_num";
    $conn->query($sql2);

    
} */
  /*
    
   * <?php if(!empty($rfid)){ ?>
             <input type="text" name="rfid" value="<?php echo $rfid; ?>" readonly><br>
           <?php } ?>
  */
  
 
    

    
    

     
?>

<!DOCTYPE HTML>
<head>
  <title>Dodajte novog korisnika</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>

<?php
if (isset($_POST["refresh"])) {

    header("Refresh: 500");
}
?>


<div class="container">
    <h1 align='center'>Dodajte novog zaposlenika</h1>


    <form class="form-horizontal" action="" method="post">
            <div class="form-group">
      
                <label class="control-label col-sm-2">
                    <input type="submit" class="button2" name="refresh1" value="Prkiaži" />
                </label>
            
            
            <div class="col-sm-10"> 
            <input type="text" class="form-control" name="rfid" value="<?php echo $rfid; ?>" readonly>
            </div></div>
        
            <div class="form-group">
            <label class="control-label col-sm-2">Ime:</label>
            <div class="col-sm-10"> 
            <input  class="form-control" name="ime"  placeholder="Enter ime">
            </div>
            </div>
        
            <div class="form-group">
            <label class="control-label col-sm-2">Prezime:</label>
            <div class="col-sm-10"> 
            <input  class="form-control" name="prezime"  placeholder="Enter prezime">
            </div>
            </div>
        
            <div class="form-group">
            <label class="control-label col-sm-2">Tip zaposlenika:</label>  
            <div class="col-sm-10"> 
            <select name="tip">
                <?php
                $upit = "select id_tipa, naziv from tip_zaposlenika";
                $tipovi_zaposlenika = $conn->query($upit);
                while ($row = mysqli_fetch_array($tipovi_zaposlenika)) {
                    echo "<option value=" . $row['id_tipa'] . ">" . $row['naziv'] . "</option>";
                }
                ?>
            </select>
            </div>
            </div>
            
            <div class="form-group">
            <label class="control-label col-sm-2">Odjel:</label>
            <div class="col-sm-10"> 
            <select name="odjel">
                <?php
                $upit2 = "select id_odjela, naziv_odjela from odjeli";
                $odjeli = $conn->query($upit2);
                while ($row = mysqli_fetch_array($odjeli)) {
                    echo "<option value=" . $row['id_odjela'] . ">" . $row['naziv_odjela'] . "</option>";
                }
                ?>
            </select>
            </div>
            </div>

            <div class="form-group">        
            <div class="col-sm-offset-2 col-sm-3">
            <button name="submit" type="submit" class="btn btn-default">Spremi</button>

            </div>
            </div>

            </form>  
</div>

            <style>
            body {font-family: Arial, Helvetica, sans-serif;}
            * {box-sizing: border-box}



            /* Full-width input fields */
            input[type=text], input[type=password] {
                width: 100%;
                padding: 15px;
                margin: 5px 0 22px 0;
                display: inline-block;
                border: none;
                background: #f1f1f1;
            }

            /* Add a background color when the inputs get focus */


            /* Set a style for all buttons */
            button {
                background-color: #4CAF50;
                color: white;
                padding: 14px 20px;
                margin: 8px 0;
                border: none;
                cursor: pointer;
                width: 100%;
                opacity: 0.9;
            }






            button:hover {
                opacity:1;
            }

            /* Extra styles for the cancel button */
            .cancelbtn {
                padding: 14px 20px;
                background-color: #f44336;
            }

            /* Float cancel and signup buttons and add an equal width */
            .cancelbtn, .signupbtn {
              float: left;
              width: 50%;
            }

            /* Add padding to container elements */
            .container {
                padding: 5px;
            }

            /* The Modal (background) */
            .modal {
                display: none; /* Hidden by default */
                position: fixed; /* Stay in place */
                z-index: 1; /* Sit on top */
                left: 0;
                top: 0;
                width: 100%; /* Full width */
                height: 100%; /* Full height */
                overflow: auto; /* Enable scroll if needed */
                background-color: #474e5d;
                padding-top: 50px;
            }

            /* Modal Content/Box */
            .modal-content {
                background-color: #fefefe;
                margin: 4% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
                border: 1px solid #888;
                width: 80%; /* Could be more or less, depending on screen size */
            }

            /* Style the horizontal ruler */
            hr {
                border: 1px solid #f1f1f1;
                margin-bottom: 25px;
            }
 
            /* The Close Button (x) */
            .close {
                position: absolute;
                right: 35px;
                top: 15px;
                font-size: 40px;
                font-weight: bold;
                color: #f1f1f1;
            }

            .close:hover,
            .close:focus {
                color: #f44336;
                cursor: pointer;
            }

            /* Clear floats */
            .clearfix::after {
                content: "";
                clear: both;
                display: table;
            }

            /* Change styles for cancel button and signup button on extra small screens */
            @media screen and (max-width: 300px) {
                .cancelbtn, .signupbtn {
                   width: 100%;
                }
            }



            .center {

   
                text-align: center;
   

            }
    
            </style>
            <body>
                </html>
