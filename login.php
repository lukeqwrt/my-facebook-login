<?php 

require('./database.php');

session_start();


if($_SESSION['status'] == 'invalid' || EMPTY($_SESSION['status'])){
    // set default to invalid
    $_SESSION['status'] = 'invalid';
}

if($_SESSION['status'] == 'valid'){
    echo "<script> window.location.href = '/my-facebook/home.php' </script>";
}

if(isset($_POST['lipat'])){
    echo "<script> window.location.href = '/my-facebook/usercreate.php' </script>";

}

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    


if(empty($email) || empty($password)){
    echo "<script> alert('fill up all fields') </script>";
}else{
    $queryValidate = "SELECT * FROM accounts WHERE username = '$email' AND password = md5('$password') ";
    $sqlValidate = mysqli_query($connection, $queryValidate);
    $rowValidate = mysqli_fetch_array($sqlValidate);

    if(mysqli_num_rows($sqlValidate) > 0){
        $_SESSION['status'] = 'valid';
        $_SESSION['username'] = $rowValidate['username'];
        echo "<script> window.location.href = '/my-facebook/home.php' </script>";
    }else{
        $_SESSION['status'] = 'invalid';
        echo "<script> window.alert('forgot password?') </script>";
    }
}

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>facebook</title>
    <link rel="icon" href="img/fb.png">
    <link rel="stylesheet" href="./css/login.css">
</head>
<body>

<div class="main">
    <div class="left">
        <div class="content">
        <h3>facebook</h3>
        
        <div class="bla">
        <h4>Recent Logins</h4>
        <p>Click your picture or add an account.</p>

        </div>
        
        </div>

        <div class="container">
            <div class="child1">
            <div class="image">
                <img src="./img/IMG_20200606_132248_378.jpg" alt="error">
                
                <div class="myname">
                    <p>Luke</p>
                </div>
            </div>
             
            </div>

            <div class="child2">
                <div class="white">

                </div>

                <div class="add">
                    <p>add account</p>
                </div>
            </div>
        </div>
    </div>

<div class="myform">
  <form action="/my-facebook/login.php" method="post">
  <div class="dikit">
        <input type="text" class="padd" name="email" placeholder="Email address or phone number">
        <input type="password" class="padd" name="password" placeholder="Password">
        <input type="submit" class="login" name="login" value="Log In">
    </div>
        <li><a href="#"> Forgot password? </a></li>
        <span></span>
        <input type="submit" name="lipat" class="create" value="Create New Account" >
    </form>
</div>


</div>

<script src="./js/login.js"></script>
  
</body>
</html>