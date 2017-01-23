<!--
  file-name: index.php
  used-for: Student Form creation assignment for mindifire training session
  created-by: r s devi prasad
  description: login page of the student App for taking and verifying credentials.
-->

<?php

  $PageTitle = "Student Login Page";

  include_once 'header.php' ;

 ?>

<?php
  session_start();
  include_once './config/dbconnect.php';
  include_once './config/studentform.php';

  if (isset($_SESSION["user"]) && isset($_SESSION["role"])) {
    $role = $_SESSION["role"];
    $url = $role == "admin" ? "home.php" : "userhome.php";
    $studentobj->redirectToURL($url);
  }

  $error = false;

  if( isset($_POST['login']) ) {

    $email = trim($_POST['email']);
    $email = strip_tags($email);
    $email = htmlspecialchars($email);

    $pass = trim($_POST['pass']);
    $pass = strip_tags($pass);
    $pass = htmlspecialchars($pass);

    if (isset($_POST['role'])) {
        # code...
        $role = $_POST['role'];
    }


    if(empty($email)){
      $error = true;
      $emailError = "Please enter your email address.";
    } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
      $error = true;
      $emailError = "Please enter valid email address.";
    }

    if(empty($pass)){
      $error = true;
      $passError = "Please enter your password.";
    }

    // if there's no error, continue to login
    if (!$error) {

      $password = hash('sha256', $pass); // password hashing using SHA256
      $res="SELECT studentId, userRole FROM studentdata WHERE studentPass='$password' AND studentEmail='$email'";
      $stmt=$conn->query($res);
      $row= $stmt->fetchObject();
      $count = $stmt->rowCount(); // if uname/pass correct it returns must be 1 row
      if( $count == 1) {
        $errMSG = "Success... You will be redirected soon.";
        $_SESSION["user"] = $row->studentId;
        $_SESSION["role"] = $row->userRole;
        $url = (($row->userRole) == 'admin') ? "home.php" : "userhome.php";
        header("Location: $url");
      } else {
        $errMSG = "Incorrect Credentials, Try again...";
      }

    }

  }
?>


  <div class="container">
    <h1>Login Page For Student Registration</h1>
    <form class="form-horizontal" action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" id="login" method="post">
      <div class="form-group">
        <label for="email" class="col-sm-2 control-label">Email: </label>
        <div class="col-sm-7">
          <input type="text" id="email" class="form-control" name="email"/>
        </div>
        <div class="col-sm-3">
          <span id="mailinfo">
            <?php
              if(isset($emailError)){
                echo $emailError;
              }
             ?>
          </span><br/>
        </div>
      </div>
      <div class="form-group">
        <label for="pass" class="col-sm-2 control-label">Password: </label>
        <div class="col-sm-7">
          <input type="password" id="pass" class="form-control" name="pass"/>
        </div>
        <div class="col-sm-3">
          <span id="mailinfo">
            <?php
              if(isset($passError)){
                echo $passError;
              }
             ?>
          </span><br/>
        </div>
      </div>
      <div class="form-group">
            <label class="col-sm-2 control-label">Type: </label>
            <label class="radio-inline">
              <input type="radio" name="role" value="user" checked>user
            </label>
            <label class="radio-inline">
              <input type="radio" name="role" value="admin">admin
            </label>
          </div>
      <div id="form-btn">
          <button class="btn btn-primary" id="login" name="login" type="submit">Login</button>
      </div>
    </form>
    <?php
      if (isset($errMSG)) {
        echo "$errMSG";
      }
      /*
      if (isset($role)) {
        # code...
        echo "$role";
      }*/
     ?>
  </div>
