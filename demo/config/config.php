<?php

ob_start(); // Turns on output buffering

session_start();

$timezone = date_default_timezone_set("Europe/Rome");

// parametri di connessione al mio db locale
$host = "127.0.0.1";
$user = "root";
$password = "";
$database ="social";

$conn = mysqli_connect($host, $user, $password, $database);

// connection check
if (mysqli_connect_errno()) {
    echo "Failed to connect " . mysqli_connect_errno();
}

