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
    <title>admin</title>
</head>
<body>

<div class="main">

    

    <table class="read-main">
        <tr>
            <th>ID</th>
            <th>EMAIL</th>
            <th>PASSWORD</th>
            <th>ACTIONS</th>
        </tr>
        
        <?php while($results = mysqli_fetch_array($sqlAccounts)) { ?>
        <tr>
            <td><?php echo $results['id'] ?></td>
            <td><?php echo $results['username'] ?></td>
            <td><?php echo $results['password'] ?></td>

            <td>

            <form action="#" method="post">
            <input type="submit" name="edit" value="edit">
        </form>
            <form action="/my-facebook/delete.php" method="post">
            <input type="submit" name="delete" value="delete">
            <input type="hidden" name="deleteId" value="<?php echo $results['id'] ?>">
             </form>
            </td>
        </tr>

        <?php } ?>
        
    
    
    </table>

</div>
    
</body>
</html>