<?php

$db_host = 'localhost'; // Server Name
$db_user = 'root'; // Username
$db_pass = ''; // Password
$db_name = 'id6340571_sql7238268'; // Database Name

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);


 
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


else{
	$temp1=$_GET['value'];
        echo $temp1;
}

        
$qu1="SELECT DISTINCT date(dolazak) FROM id_num ";

$que = " INSERT INTO id_num(rfid,dolazak,odlazak) 
		
        SELECT * FROM (SELECT '$temp1',CURRENT_TIMESTAMP(),'0000-00-00 00:00:0') as tmp
        WHERE NOT EXISTS(
            SELECT dolazak FROM id_num WHERE date(dolazak)=CURRENT_DATE AND rfid='$temp1'
        )";
        
	
        
        
        $quer1= "UPDATE id_num SET odlazak=CURRENT_TIMESTAMP 
            WHERE rfid='$temp1' AND date(dolazak)=current_date AND time(dolazak)<CURRENT_TIME;";
   	
   	if($conn->query($que) == TRUE){
		echo "radi!";
	}
        if($conn->query($quer1) == TRUE){
		echo "drugi radi!";
	}
        if($conn->query($qu1) == TRUE){
		echo "treci radi!";
	}
	else{
		echo $link->error();
	}
         
         
         


        
?>