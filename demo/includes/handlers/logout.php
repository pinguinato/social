<?php
// distruggi tutto che ce ne andiamo alla pagina di login
session_start();
session_destroy();
header("Location: ../../register.php");
?>