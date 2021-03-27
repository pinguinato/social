<?php

class Post {

    private $user_obj;
    private $con;

    public function __construct($con, $user) {
        $this->con = $con;
        $this->user_obj = new User($con, $user);
    }

    public function submitPost($body, $user_to) {

        $body = strip_tags($body); // remove html tags
        $body = mysqli_real_escape_string($this->con, $body);

        //// questo codice ci permette di inserire i tag br all'interno del testo dei nostri post /////
        $body = str_replace('\r\n', '\n', $body);
        $body = nl2br($body); // line break before new line in a string!!!
        ////////////////////////////////////////////////////////////////////////////////////////////////
        
        $check_empty = preg_replace('/\s+/', '', $body); // delete all spaces

        if($check_empty != "") {
            // current date and time
            $date_added = date("Y-s-d H:i:s");
            // get username
            $added_by = $this->user_obj->getUsername();
            // se lo user è lo stesso del profilo allora non postare user_to = none
            if($user_to == $added_by) {
                $user_to = "none";
            } 

            // inserimento del post
            $query = mysqli_query($this->con, "INSERT INTO posts VALUES (NULL,'$body', '$added_by', '$user_to', '$date_added', 'no', 'no', '0')"); 
            
            $returned_id = mysqli_insert_id($this->con);
            
            // Insert notification
            
            // Update post count for user
            $num_posts = $this->user_obj->getNumPosts();
            $num_posts++;
            $update_query = mysqli_query($this->con, "UPDATE users SET num_posts = '$num_posts' WHERE username = '$added_by'");

        }
    }

}