<?php
require('./database.php');
require('./read.php');

session_start();


if($_SESSION['status'] == 'invalid' || empty($_SESSION['status'])){
        $_SESSION['status'] = 'invalid';


    // unset user data
    unset($_SESSION['username']);

    // redirect to login page

    echo "<script> window.location.href = '/my-facebook/login.php'  </script>";
}



if(isset($_POST['upload'])){
    $image = $_FILES['image']['name'];
    $target = "php-login/".basename($_FILES['image']);
    $db = mysqli_connect("localhost", "root", "", "php-login");

    

    $sql = "INSERT INTO accounts (image)";
    mysqli_query($db, $sql);
    
    if( move_uploaded_file($_FILES['tep_name']['name'], $target) ){
        $msg = "image uploaded successfully";
    }
    else{
        $msg = "there was a problem uploading image";
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>facebook</title>
    <link rel="stylesheet" href="./css/home.css">
    <link rel="icon" href="img/fb.png">
</head>
<body>


<div class="main">
<h1>welcome to facebook</h1>

<?php
        echo 'WELCOME '.$_SESSION['username'].' !!!!';
?>

<?php
$db = mysqli_connect("localhost", "root", "", "php-login");
$sql = "SELECT * FROM accounts";

$result = mysqli_query($db, $sql);
while ($row = mysqli_fetch_array($result)) {
    echo "<div id='img_div'> ";
    echo "<img src='images/".$row['image']."'>";
    echo "</div>";

}
?>



<form action="" method="post" enctype="multipart/from-data">
    <input type="hidden" name="size" value="100000">
<div>

    <input type="file" name="image" >

</div>
<div>

<input type="submit" name="upload" value="upload profile picture">
    
</div>
</form>



<form action="/my-facebook/logout.php" method="post">
<input type="submit" value="Logout" />
</form>


</div>
    
</body>
</html>