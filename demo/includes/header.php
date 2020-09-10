<?php

    if(session_id() == ''){ 
        session_start();
    }

    if (isset($_SESSION["username"])) {
        $userLoggedIn = $_SESSION["username"];
    } else {
        header("Location: register.php");
    }
?>
<html>
<head>
    <title>Swirlfeed</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    