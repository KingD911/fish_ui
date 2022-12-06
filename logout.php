<?php

session_start();

if(isset($_SESSION['farmer_id']))
{
    unset($_SESSION['farmer_id']);
}

header("Location: login.php");
die;
