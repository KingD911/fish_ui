<?php 
session_start();
    include('connection.php');
    include('functions.php');
    $user_data = check_login($con);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="./CSS/control.css">
    <link rel="stylesheet" href="./CSS/index.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fish GUI</title>
</head>
<body>
    <div class="engage">
        <div class="container">
            <div class="space">WELCOME TO HORMONE DOSING APP FARMER <?php echo $user_data['first_name'];?></div>
            <a class="link space" href="./dashboard.php"><strong>START</strong></a> 
            <a href="logout.php">logout</a>
        </div>
    </div>
    
</body>
</html>