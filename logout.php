<?php

session_start();

// set status to invalid
$_SESSION['status'] = 'invalid';


// unset user data
unset($_SESSION['username']);

// redirect to login page

echo "<script> window.location.href = '/my-facebook/login.php'  </script>";
?>