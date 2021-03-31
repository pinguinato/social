<?php

class User {

    private $user;
    private $con;

    public function __construct($con, $user) {
        $this->con = $con;
        $user_details_query = mysqli_query($this->con, "SELECT * FROM users WHERE username = '$user'");
        $this->user = mysqli_fetch_array($user_details_query);
    }


    //////////////////////////////////////////////////////////////
    /// funzione che recupera nome e cognome da mostrare a video
    //////////////////////////////////////////////////////////////

    public function getFirstAndLastName() {
        $username = $this->user['username'];
        $query = mysqli_query($this->con, "SELECT first_name, last_name FROM users WHERE username = '$username'");
        $row = mysqli_fetch_array($query);
        return $row['first_name'] . " " . $row['last_name'];
    }

    //////////////////////////////////////////////////////////////
    /// funzione che recupera lo username
    //////////////////////////////////////////////////////////////

    public function getUsername() {
        return $this->user['username'];
    }

    //////////////////////////////////////////////////////////////
    /// funzione che recupera il numero totale dei Posts pubblicati
    //////////////////////////////////////////////////////////////

    public function getNumPosts() {
        $username = $this->user['username'];
        $query = mysqli_query($this->con, "SELECT num_posts FROM users WHERE username = '$username'");
        $row = mysqli_fetch_array($query);
        return $row['num_posts'];
    }

    //////////////////////////////////////////////////////////////
    /// funzione che verifica se un account è stato chiuso
    //////////////////////////////////////////////////////////////
    
    public function isClosed() {
        $username = $this->user['username'];
        $query = mysqli_query($this->con, "SELECT user_closed FROM users WHERE username = '$username'");
        $row = mysqli_fetch_array($query);
        return ($row['user_closed'] == "yes") ? true : false;
    }

}