<?php

include("../../config/config.php");
include("../classes/User.php");
include("../classes/Post.php");

$limit = 10; // numero dei post che si possono caricare al massimo per chiamata

$posts = new Post($conn, $_REQUEST['userLoggedIn']);
$posts->loadPostsFriends();


