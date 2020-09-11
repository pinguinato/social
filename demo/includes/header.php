<?php

    // check the session like this
    if(session_id() == ''){ 
        session_start();
    }
    // and then
    if (isset($_SESSION["username"])) {
        $userLoggedIn = $_SESSION["username"];
    } else {
        header("Location: register.php");
    }
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <title>Swirlfeed</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    <script type="text/javascript" src="assets/js/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.js"></script>
    <script type="text/javascript" src="assets/js/register.js"></script>
    <link rel="icon" type="ico" href="assets/images/favicon/favicon.ico"/>
</head>
<body>
    