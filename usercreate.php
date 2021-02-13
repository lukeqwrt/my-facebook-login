<?php
require('./read.php');

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

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/user-create.css">
    <title>Create</title>
</head>
<body>

<div class="main">

    <form class="create-main" action="/my-facebook/create.php" method="post" />
        <h3>CREATE USER</h3>
        <input type="text" name="email" placeholder="Email" required />
        <input type="password" name="password" placeholder="Password" required />
        <input type="submit" name="create" value="Create account" />
        

    </form>
    <button class="btn" style="height: 30px;">LogIn</button>

</div>

<script src="./js/user-create.js"></script>
    
</body>
</html>