<?php

require('./database.php');

if(isset($_POST['create'])){
    $username = $_POST['email'];
    $password = $_POST['password'];
    
    

    $queryCreate = "INSERT INTO accounts VALUES (null, '$username', md5('$password'))";
    $sqlCreate = mysqli_query($connection, $queryCreate);

    echo "<script> alert('successfully created') </script>";
    echo "<script> window.location.href = '/my-facebook/usercreate.php' </script>";
}

?>