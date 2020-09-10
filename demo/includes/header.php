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
</head>
<body>
    