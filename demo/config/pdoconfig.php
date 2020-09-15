<?php
// TODO: dobbiamo poi cambiare ttute le query all'inteno del progetto secondo questo modello con i PDO
// Exxample of use of a named query, more secure!!
// creating a new PDO connection
$username = "root";
$password = "root";
$dsn = "mysql:host=mysql57;dbname=social";
$options = [
    PDO::ATTR_EMULATE_PREPARES   => false, // turn off emulation mode for "real" prepared statements
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, //turn on errors in the form of exceptions
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //make the default fetch be an associative array
  ];

  

    try {
        $pdo = new PDO($dsn, $username, $password, $options);
        echo "Success!";
      } catch (Exception $e) {
        error_log($e->getMessage());
        exit('Something weird happened ' . $e->getMessage()); //something a user can understand
      }

// example of secure query using PDO
$stmt = $pdo->prepare("SELECT * FROM users WHERE first_name = :first_name");
$stmt->execute([':first_name' => 'Roberto']);
echo $stmt->rowCount();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $arr[] = $row;
  }


var_dump($arr);