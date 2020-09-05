<?php
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
$em = strtolower($em); // put a capital letter and all lowercase
$_SESSION['reg_email'] = $em; // store email in the session variable
//email 2
$em2 = strip_tags($_POST['reg_email2']); // remove html tags
$em2 = str_replace(' ', '', $em2); // remove spaces
$em2 = strtolower($em2); // put a capital letter and all lowercase
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
                array_push($error_array, EMAIL_ALREADY_IN_USE);
            }
        } else {
            array_push($error_array, EMAIL_WRONG_FORMAT);
        }
    } else {
        array_push($error_array, EMAILS_NOT_MATCH);  
    }

    // Validation for first name
    if(strlen($fname) > 25 || strlen($fname) < 2) {
        array_push($error_array, WRONG_FIRST_NAME);
    }

    // Validation for last name
    if(strlen($lname) > 25 || strlen($lname) < 2) {
        array_push($error_array, WRONG_LAST_NAME);
    }

    // password validation
    if($password != $password2) {
        array_push($error_array, PASSWORDS_NOT_MATCH);
    } else {
        if(preg_match('/[^A-Za-z0-9]/', $password)) {
            array_push($error_array, PASSWORD_WRONG_FORMAT);
        }
    }

    if(strlen($password) > 30 || strlen($password) < 5) {
        array_push($error_array, PASSWORD_WRONG_SIZE);
    }

    // if no errors in the form
    if(empty($error_array)) {
        $password = md5($password); // encrypt password before sending to database
        
        // generate user name by concatenating first and last name
        $username = strtolower($fname . "_" . $lname);
        $check_username_query = mysqli_query($conn, "SELECT username FROM users WHERE username='$username'");
        $i = 0;
        // if username exists
        while(mysqli_num_rows($check_username_query) != 0) {
            $i++;
            $username = $username . "_" . $i;
            $check_username_query = mysqli_query($conn, "SELECT username FROM users WHERE username='$username'");
        }

        // profile picture assignment
        $rand = rand(1, 2);

        if($rand == 1) {
            $profile_pic = "assets/images/profile_pics/defaults/head_deep_blue.png";
        } else if ($rand == 2) {
            $profile_pic = "assets/images/profile_pics/defaults/head_green_sea.png";
        }

        // insert data into database
        $query = mysqli_query($conn, "INSERT INTO users VALUES (NULL, '$fname', '$lname', '$username', '$em', '$password', '$date', '$profile_pic', '0', '0', 'no', '')");
        array_push($error_array, REGISTRATION_OK);

        // clear session variables
        $_SESSION['reg_fname'] = "";
        $_SESSION['reg_lname'] = "";
        $_SESSION['reg_email'] = "";
        $_SESSION['reg_email2'] = "";

    }
}
?>