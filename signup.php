<?php 
session_start();
    include('connection.php');
    include('functions.php');
    
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        //something was posted
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];
        

        if(!empty($first_name) && !empty($last_name) && !empty($user_name) && !empty($password) && !is_numeric($user_name))
        {
            //save tp database 
            $farmer_id = random_num(20);
            $query = "insert into users (farmer_id, first_name, last_name, password, user_name) values ('$farmer_id', '$first_name','$last_name', '$password', '$user_name')";
            mysqli_query($con, $query);
            header("Location: login.php");
            die;
        } else 
        {
            echo "Please enter some valid information!";
        }

        
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="./CSS/control.css">
    <link rel="stylesheet" href="./CSS/signup.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="engage">
        <form method="post">
            <div class="si">
                <strong>SignUp</strong>
            </div>
            <div class="form-control">
                <label for="name">Firstname: </label>
                <input type="text" placeholder="firstname" name="first_name" id="first_name"> 
            </div>
            <div class="form-control">
                <label for="name">Lastname: </label>
                <input type="text" placeholder="lastname" name="last_name" id="last_name"> 
            </div>
            <div class="form-control">
                <label for="name">Username</label>
                <input type="text" placeholder="username" name="user_name" id="user_name"> 
            </div>
            <div class="form-control">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="password">
            </div>
             <div class="btn">
                <button>Confirm</button>
             </div>
             <a href="./login.php">login instead...</a>
            
        </form>
    </div>
</body>
</html>