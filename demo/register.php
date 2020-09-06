<?php 

require 'config/config.php';
require 'config/constants.php';
require 'includes/form_handlers/register_handler.php';
require 'includes/form_handlers/login_handler.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Welcome to Swirlfeed</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/css/register_style.css">
    <script type="text/javascript" src="assets/js/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="assets/js/register.js"></script>
    <link rel="icon" type="ico" href="assets/images/favicon/favicon.ico"/>
</head>

<body>

<?php

    if(isset($_POST['register_button'])) {
        echo '<script>
        
        $(document).ready(function() {
            $("#first").hide();
            $("#second").show();
        });
        
        </script>';
    }

?>


<div class="wrapper"> <!-- start of class wrapper -->
    
        <div class="login_box">
    
            <div class = "login_header">
                <h1>Swirlfeed</h1>
                Login or signup below!
            </div>
    
    <!-- start login form -->
    <div id="first">
        <form action="register.php" method="POST">
            <input type="email" name="log_email" placeholder="Email Address" value="<?php
            if (isset($_SESSION['log_email'])) {
                echo $_SESSION['log_email'];
            }
            ?>" required>
            <br>
            <input type="password" name="log_password" placeholder="Password" value="<?php
            if (isset($_SESSION['log_password'])) {
                echo $_SESSION['log_password'];
            }
            ?>" required>
            <br>
            <?php if (in_array(LOGIN_KO, $error_array)) { echo LOGIN_KO; } ?>
            <input type="submit" name="login_button" value="Login">
            <br>
            <a href="#" id="signup" class="signup">Need an acount? Register here!</a>
        </form>
    </div> 
    <!-- end login form -->

    <!-- start Registration form -->
    <div id="second">
    <form action="register.php" method="POST">
            <input type="text" name="reg_fname" placeholder="First Name" value="<?php
            if (isset($_SESSION['reg_fname'])) {
                echo $_SESSION['reg_fname'];
            }
            ?>" required>
            <br>

            <?php if (in_array(WRONG_FIRST_NAME, $error_array)) {
                echo WRONG_FIRST_NAME;
            } ?>

            <input type="text" name="reg_lname" placeholder="Last Name" value="<?php 
            if (isset($_SESSION['reg_lname'])) {
                echo $_SESSION['reg_lname'];
            }
            ?>" required>
            <br>

            <?php if (in_array(WRONG_LAST_NAME, $error_array)) {
                echo WRONG_LAST_NAME;
            } ?>

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

            <?php if (in_array(EMAIL_ALREADY_IN_USE, $error_array)) { echo EMAIL_ALREADY_IN_USE; } ?>
            <?php if (in_array(EMAIL_WRONG_FORMAT, $error_array)) { echo EMAIL_WRONG_FORMAT; } ?>
            <?php if (in_array(EMAILS_NOT_MATCH, $error_array)) { echo EMAILS_NOT_MATCH; } ?>

            <input type="password" name="reg_password" placeholder="Password" value="<?php ?>" required>
            <br>
            <input type="password" name="reg_password2" placeholder="Confirm Password" value="<?php ?>" required>
            <br>

            <?php if (in_array(PASSWORD_WRONG_FORMAT, $error_array)) { echo PASSWORD_WRONG_FORMAT; } ?>
            <?php if (in_array(PASSWORD_WRONG_SIZE, $error_array)) { echo PASSWORD_WRONG_SIZE; } ?>
            <?php if (in_array(PASSWORDS_NOT_MATCH, $error_array)) { echo PASSWORDS_NOT_MATCH; } ?>

            <input type="submit" name="register_button" value="Register">
            <br>
            <?php if (in_array(REGISTRATION_OK, $error_array)) { echo REGISTRATION_OK; } ?>
            <a href="#" id="signin" class="signin">Already have an acount? Sign in here!</a>
        </form>
    </div>
    <!-- end Registration form -->
    </div>
</div> <!-- end of class wrapper -->

    
</body>
</html>
