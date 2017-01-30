<?php
    session_start();
    $PageTitle = "Student Registration Form";
    include_once 'header.php';
    include_once './config/config.php';

    /*
     * File Name: index.php
     * Used For: Student Form creation assignment for mindfire training session
     * Created By: r s devi prasad
     * Description: first page of the student App for showing the links for registration and login.
     */

    if (isset($_SESSION["user"]) && isset($_SESSION["role"])) {
        $role = $_SESSION["role"];
        $url = $role == "admin" ? "home.php" : "userhome.php";
        $studentobj->redirectToURL($url);
    }
 ?>

 <div class="container">
   <h1>Student Registration Site</h1>
   <h3>Choose among the following: </h3>
   <ul>
     <li> <a href="register.php">Register</a> </li>
     <li> <a href="login.php">Login</a> </li>
   </ul>
 </div>
<?php include_once 'footer.php' ; ?>