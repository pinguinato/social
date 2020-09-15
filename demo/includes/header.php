<?php

require 'config/config.php';
// check the session like this
if(session_id() == ''){ 
    session_start();
}
// and then
if (isset($_SESSION["username"])) {
        $userLoggedIn = $_SESSION["username"];
        $user_details_query = mysqli_query($conn, "SELECT * FROM users WHERE username='$userLoggedIn'");
        $user = mysqli_fetch_array($user_details_query, MYSQLI_BOTH); // for print the current username
    } else {
        header("Location: register.php");
    }
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <title>Swirlfeed</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- css -->
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!-- javascript -->
    <script type="text/javascript" src="assets/js/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.js"></script>
    <script type="text/javascript" src="assets/js/register.js"></script>
    <link rel="icon" type="ico" href="assets/images/favicon/favicon.ico"/>
</head>
<body>
    <div class="top_bar">
        <div class="logo">
            <a href="index.php">
                Swirlfeed!
            </a>
        </div>
    
        <nav>
            <a href="#">
                <?php echo $user['first_name'] . " " .  $user['last_name'] . " "; ?>
            </a>
            <a href="index.php">
                <i class="fa fa-home fa-lg"></i>
            </a>
            <a href="#">
                <i class="fa fa-envelope fa-lg"></i>
            </a>
            <a href="#">
                <i class="fa fa-bell fa-lg"></i>
            </a>
            <a href="#">
                <i class="fa fa-users fa-lg"></i>
            </a>
            <a href="#">
                <i class="fa fa-cog fa-lg"></i>
            </a>
        </nav>

    </div>

    <div class="wrapper">

    
    