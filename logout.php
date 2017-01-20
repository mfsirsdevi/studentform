<?php

    session_start();
    $_SESSION = array();
    unset($_SESSION);
    session_destroy();
    header("Cache-Control: no-cache, no-store, must-revalidate");
    header("location:login.php");
    exit;

 ?>