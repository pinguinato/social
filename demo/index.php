<?php

# parametri di connessione al mio db locale
$host = "mysql57";
$user = "root";
$password = "root";
$database ="social";

$conn = mysqli_connect($host, $user, $password, $database);

if (mysqli_connect_errno()) {
    echo "Failed to connect " . mysqli_connect_errno();
}

# per inserire record ad ogni caricamento basta mettere NULL al posto di 1
$query = mysqli_query($conn, "INSERT INTO test VALUES(1, 'Optimus Prime')");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Swirlfeed</title>
</head>

<body>
    demo
</body>

</html>