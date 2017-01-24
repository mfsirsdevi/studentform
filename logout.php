<!--
  file-name: logout.php
  used-for: Student Form creation assignment for mindifire training session
  created-by: r s devi prasad
  description: logout page of the application which removes all the cache and ends all the sessions logged till now.
-->

<?php

    session_start();
    $_SESSION = array();
    unset($_SESSION);
    session_destroy();
    header("Cache-Control: no-cache, no-store, must-revalidate");
    header("location:login.php");
    exit;

 ?>