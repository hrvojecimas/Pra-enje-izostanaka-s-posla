<?php
session_start();
if(isset($_POST['submit'])){
    if($_POST['uname']=="admin" && $_POST['psw']=="admin"){
        $_SESSION['admin']=$_POST['uname'];
        header('Location: http://localhost/Zavrsni/index.php');
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

button:hover {
    opacity: 0.8;
}

.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
}

img.avatar {
    width: 40%;
    border-radius: 50%;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}


@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
</style>
</head>
<body>

<h2>Prijava</h2>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

  <div class="container">
    <label for="uname"><b>Ime</b></label>
    <input type="text" placeholder="Unesite ime" name="uname" required>

    <label for="psw"><b>Lozinka</b></label>
    <input type="password" placeholder="Unesite lozinku" name="psw" required>
        
    <button name="submit" type="submit">Prijava</button>
  </div>
</form>

</body>
</html>

