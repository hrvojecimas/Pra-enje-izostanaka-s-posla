<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>


    <style type="text/css">
        body{

            margin: 0;
        }
        .menu ul{
            list-style: none;
            margin: 0;
            padding: 0;
            width: 20%;

            position: fixed;
            height: 100%;



        }
        .menu ul li{

            padding: 15px;
            position: relative;
            width: 180px;
            vertical-align: middle;
            background-color: #34495E;
            cursor: pointer;
            border-top: 1px solid #BDC3C7;
            -wekbit-transition: all 0.3s;
            -o-transition: all 0.3s;
            transition: all 0.3s;

        }
        .menu ul li:hover >ul{
            opacity: 1;
            visibility: visible;
            background-color:#2ECC71;
        }
        .menu ul li:hover{
            background-color:#2ECC71;
        }


        .menu > ul >li{
            border-right: 5px solid #F1C40F;

        }


        .menu ul ul{

            opacity: 0;
            transition: all 0.3s;
            position: absolute;
            border-left: 5px solid #F1C40F;
            visibility:hidden;
            left: 100%;
            top:-2%;
        }

        .menu ul li a{
            color: #fff;
            text-decoration: none;
        }

        span{
            margin-right: 15px;
        }
        .menu > ul > li::nth-of-type::after{
            content: "+";
            position:absolute;
            margin-left: 30%;
            color: #fff;
            font-size: 20px;
        }

        .bar{
            margin-left: 200px; 
            font-size: 20px; 
            padding: 15px;

            display:inline-block;
            float: top;


        }


    </style>

    <?php
 $db_host = 'localhost'; 
$db_user = 'root'; 
$db_pass = '';
$db_name = 'id6340571_sql7238268'; 

    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);


    $upit = 'select ime_tvrtke,sjediste,oib,maticni_broj,broj_zaposlenih,broj_odjela,radno_vrijeme,minutaza,id FROM pocetna  ';


    $result = mysqli_query($conn, $upit);
    ?>



    <body>

        <div class="menu">

            <ul>
                <li><a href="index.php"><span class="fa fa-home"></span>Home</a>
                <li><a href="novi_zaposlenik.php"><span class="fa fa-desktop"></span>Dodajte novog korisnika</a></li>
                <li><a href="display2.php"><span class="fa fa-database"></span>Popis zaposlenih</a></li>
                <li><a href="izvj_dan.php"><span class="fa fa-file"></span>Izvještaj za dan</a>
                <li><a href="godisnji_odmor.php"><span class="fa fa-calendar-o"></span>Godišnji odmor</a>
                <li><a href="pocetni_prikaz.php"><span class="fa fa-university"></span>Pocetni prikaz</a>


                <li><a href=""><span class="fa fa-child"></span>Prikaz korisnika odjela</a>
                    <ul>
                        <li><a href="svi_odjeli.php"><span class="fa fa-edit"></span>Svi odjeli</a></li>
                        <li><a href="svi_korisnici.php"><span class="fa fa-remove"></span>Svi korisnici</a></li>
                    </ul>
                </li>
                <?php
                if (!isset($_SESSION['admin'])) {
                    echo "<li><a href = 'prijava_admin.php'><span class = 'fa fa-university'></span>Prijava admin</a>";
                } else {
                    echo "<li><a href = 'odjava_admin.php'><span class = 'fa fa-university'></span>Odjava</a>";
                }
                ?>

            </ul></div>



        <div class="bar">
            <h1>Podaci o tvrtki</h1>
            <table  class="table-responsive" border="1" bordercolor="white" cellspacing="2" cellpadding="25">

                <tr>
                    <th><img src="slike/slika_imetvrtke.png" width="80" height="60" align="top"></th>
                    <th></th><th></th>
                    <th><img src="slike/slika_home.jpg" width="80" height="60"></th>
                    <th></th><th></th>
                    <th><img src="slike/slika_oib.jpg" width="80" height="60"></th>
                    <th></th><th></th><th></th>
                    <th><img src="slike/slika_maticnibtoj.png" width="80" height="60"></th>
                </tr>
                <tr>


                    <th>Ime tvrtke<p>

                            <?php
                            foreach ($conn->query('SELECT ime_tvrtke FROM pocetna') as $row) {

                                echo "" . $row['ime_tvrtke'] . "";
                            }
                            ?>



                    <th></th>               
                    </p></th>
                    <th></th>
                    <th>Sjedište<p>
                            <?php
                            foreach ($conn->query('SELECT sjediste FROM pocetna') as $row) {

                                echo "" . $row['sjediste'] . "";
                            }
                            ?>            


                        </p></th><th></th><th></th>

                    <th>Oib<p>

                            <?php
                            foreach ($conn->query('SELECT oib FROM pocetna') as $row) {

                                echo "" . $row['oib'] . "";
                            }
                            ?>            


                        </p></th><th></th><th></th><th></th>

                    <th>Matični broj<p>

                            <?php
                            foreach ($conn->query('SELECT maticni_broj FROM pocetna') as $row) {

                                echo "" . $row['maticni_broj'] . "";
                            }
                            ?>                                    

                        </p></th>      
                </tr>
                <tr>
                    <th><img src="slike/slika1.jpg" width="80" height="60"></th>
                    <th></th>
                    <th></th>
                    <th><img src="slike/slika_brojodjela.png" width="80" height="60"></th>
                    <th></th><th></th>
                    <th><img src="slike/slika_radnovrijeme1.png" width="80" height="60"></th>
                    <th></th><th></th><th></th>
                    <th><img src="slike/slika_minutaza.png" width="80" height="60"></th>
                </tr>
                <tr>

                    <th>Broj Zaposlenika<p>

                            <?php
                            foreach ($conn->query('SELECT COUNT(ime) FROM zaposlenici') as $row) {

                                echo "" . $row['COUNT(ime)'] . "";
                            }
                            ?>

                        </p></th>
                    <th></th> <th></th>
                    <th>Broj odjela<p>

                            <?php
                            foreach ($conn->query('SELECT COUNT(naziv_odjela) FROM odjeli') as $row) {

                                echo "" . $row['COUNT(naziv_odjela)'] . "";
                            }
                            ?>
                        </p></th>
                    <th></th> <th></th>
                    <th>Radno vrijeme<p>
                            <?php
                            foreach ($conn->query('SELECT radno_vrijeme FROM pocetna') as $row) {

                                echo "" . $row['radno_vrijeme'] . "";
                            }
                            ?>    


                        </p></th><th></th><th></th><th></th>

                    <th>Minutaža<p>

                            <?php
                            foreach ($conn->query('SELECT minutaza FROM pocetna') as $row) {

                                echo "" . $row['minutaza'] . "";
                            }
                            ?>    

                        </p></th>			







                    </p></th>
                </tr>


            </table>
        </div>

    </div>


</body>


</html>