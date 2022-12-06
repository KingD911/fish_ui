<?php 
session_start();
    include('connection.php');
    include('functions.php');
    
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        //something was posted
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];

        if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
        {
            //read from  database 
            $farmer_id = random_num(20);
            $query = "select * from users where user_name = '$user_name' limit 1";
            $result = mysqli_query($con, $query);
            if($result)
            {
                if($result && mysqli_num_rows($result) > 0)
                {
                    $user_data = mysqli_fetch_assoc($result);
                    if($user_data['password'] === $password)
                    {
                        $_SESSION['farmer_id'] = $user_data['farmer_id'];
                        header("Location: index.php");
                        die;
                    }
                }
            }
            echo "wrong username or password";
        } else 
        {
            echo "wrong username or password";
        }

        
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="./CSS/control.css">
    <link rel="stylesheet" href="./CSS/login.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <div class="engage">
        <form method="post">
            <div class="form-control">
                <label for="name">Username</label>
                <input type="text" placeholder="username" name="user_name" id="user-name" value=""> 
            </div>
            <div class="form-control">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="password" value="">
            </div>
             <div class="btn">
                <button>SignIn</button>
             </div>
             <a href="./signup.php">I do not have an account?</a>
            
        </form>
    </div>
    
</body>
</html>