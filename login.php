<?php

  $PageTitle = "Student Login Page";

  include_once 'header.php' ;

 ?>

<?php
  session_start();
  require_once './config/dbconnect.php';

  // it will never let you open index(login) page if session is set
  if ( isset($_SESSION['user'])!="" ) {
    header("Location: home.php");
    exit;
  }

  $error = false;

  if( isset($_POST['login']) ) {

    // prevent sql injections/ clear user invalid inputs
    $email = trim($_POST['email']);
    $email = strip_tags($email);
    $email = htmlspecialchars($email);

    $pass = trim($_POST['pass']);
    $pass = strip_tags($pass);
    $pass = htmlspecialchars($pass);
    // prevent sql injections / clear user invalid inputs

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

      $res="SELECT studentId, studentName, studentPass FROM studentdata WHERE studentEmail='$email'";
      $row=$conn->query($res);
      $count = $row->rowCount(); // if uname/pass correct it returns must be 1 row
      if( $count == 1 && $row['studentPass']==$password ) {
        $_SESSION['user'] = $row['studentId'];
        header("Location: home.php");
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
      <div id="form-btn">
          <button class="btn btn-primary" id="login" name="login" type="submit">Login</button>
      </div>
    </form>
    <?php
      if (isset($errMSG)) {
        echo "$errMSG";
      }
     ?>
  </div>
