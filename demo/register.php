<?php 
session_start();

# parametri di connessione al mio db locale
$host = "mysql57";
$user = "root";
$password = "root";
$database ="social";

$conn = mysqli_connect($host, $user, $password, $database);

if (mysqli_connect_errno()) {
    echo "Failed to connect " . mysqli_connect_errno();
}


#variabili del form di registrazione
$fname = ""; // first name
$lname = ""; // last name
$em = ""; // email 
$em2 = ""; // email 2
$password = ""; // password
$password2 = ""; // password2
$date = ""; // sign up date
$error_array = array(); // holds error messages

if (isset($_POST['register_button'])) {

// registration form values

// first name
$fname = strip_tags($_POST['reg_fname']); // remove html tags
$fname = str_replace(' ', '', $fname); // remove spaces
$fname = ucfirst(strtolower($fname)); // put a capital letter and all lowercase
$_SESSION['reg_fname'] = $fname; // store first name in the session variable
// last name
$lname = strip_tags($_POST['reg_lname']); // remove html tags
$lname = str_replace(' ', '', $lname); // remove spaces
$lname = ucfirst(strtolower($lname)); // put a capital letter and all lowercase
$_SESSION['reg_lname'] = $lname; // store last name in the session variable
// email
$em = strip_tags($_POST['reg_email']); // remove html tags
$em = str_replace(' ', '', $em); // remove spaces
$em = ucfirst(strtolower($em)); // put a capital letter and all lowercase
$_SESSION['reg_email'] = $em; // store email in the session variable
//email 2
$em2 = strip_tags($_POST['reg_email2']); // remove html tags
$em2 = str_replace(' ', '', $em2); // remove spaces
$em2 = ucfirst(strtolower($em2)); // put a capital letter and all lowercase
$_SESSION['reg_email2'] = $em2; // store email 2 in the session variable
// password & password2
$password = strip_tags($_POST['reg_password']);
$password2 = strip_tags($_POST['reg_password2']);
// date
$date = date("Y-m-d"); // register current date

    // email validation
    if($em == $em2) {
        // check if email is in a valid format
        if(filter_var($em, FILTER_VALIDATE_EMAIL)) {
            $em = filter_var($em, FILTER_VALIDATE_EMAIL);
            // check if an email already exists
            $e_check = mysqli_query($conn, "SELECT email FROM users WHERE email ='$em'");
            // count the number of rows returned
            $num_rows = mysqli_num_rows($e_check);
            // verify if email is already in use
            if ($num_rows > 0) {
                array_push($error_array, "Email already in use<br>");
            }
        } else {
            array_push($error_array, "Invalid format<br>");
        }
    } else {
        array_push($error_array, "Emails don't match<br>");  
    }

    // Validation for first name
    if(strlen($fname) > 25 || strlen($fname) < 2) {
        array_push($error_array, "Your First Name must be beetween 2 and 25 characters<br>");
    }

    // Validation for last name
    if(strlen($lname) > 25 || strlen($lname) < 2) {
        array_push($error_array, "Your Last Name must be beetween 2 and 25 characters<br>");
    }

    // password validation
    if($password != $password2) {
        array_push($error_array, "Your passwords do not match<br>");
    } else {
        if(preg_match('/[^A-Za-z0-9]/', $password)) {
            array_push($error_array, "Your password can only contain english chcaracters or numbers<br>");
        }
    }

    if(strlen($password) > 30 || strlen($password) < 5) {
        array_push($error_array, "Your password must be beetween 5 and 30 characters<br>");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Welcome to Swirlfeed</title>
</head>

<body>
    <form action="register.php" method="POST">
        <input type="text" name="reg_fname" placeholder="First Name" value="<?php
        if (isset($_SESSION['reg_fname'])) {
            echo $_SESSION['reg_fname'];
        }
        ?>" required>
        <br>
        <input type="text" name="reg_lname" placeholder="Last Name" value="<?php 
        if (isset($_SESSION['reg_lname'])) {
            echo $_SESSION['reg_lname'];
        }
        ?>" required>
        <br>
        <input type="email" name="reg_email" placeholder="Email" value="<?php 
        if (isset($_SESSION['reg_email'])) {
            echo $_SESSION['reg_email'];
        }
        ?>" required>
        <br>
        <input type="email" name="reg_email2" placeholder="Confirm Email" value="<?php 
        if (isset($_SESSION['reg_email2'])) {
            echo $_SESSION['reg_email2'];
        } 
        ?>" required>
        <br>
        <input type="password" name="reg_password" placeholder="Password" value="<?php ?>" required>
        <br>
        <input type="password" name="reg_password2" placeholder="Confirm Password" value="<?php ?>" required>
        <br>
        <input type="submit" name="register_button" value="Register">
        
    </form>
</body>

</html>