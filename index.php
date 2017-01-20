<!--
  file-name: index.php
  used-for: Student Form creation assignment for mindfire training session
  created-by: r s devi prasad
  description: first page of the student App for showing the links for registration and login.
-->

<!-- Header included-->
<?php

  $PageTitle = "Student Registration App";
  include_once 'header.php' ;

  if (isset($_SESSION["user"]) && isset($_SESSION["role"])) {
        $role = $_SESSION["role"];
        $url = $role == "admin" ? "home.php" : "userhome.php";
        header($url);
  }

 ?>
 <!-- End of including header -->

 <div class="container">
   <h1>Student Registration Site</h1>
   <h3>Choose among the following: </h3>
   <ul>
     <li> <a href="register.php">Register</a> </li>
     <li> <a href="login.php">Login</a> </li>
   </ul>
 </div>
 <!-- Footer started -->
<?php
    include_once 'footer.php' ;
 ?>
 <!-- End of footer -->