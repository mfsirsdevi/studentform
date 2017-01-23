<!--
  file-name: register.php
  used-for: Student Form creation assignment for mindfire training session
  created-by: r s devi prasad
  description: registration page of the student App for registering users and admins.
-->

<?php
  $PageTitle = "Student Registration Page";
  include_once 'header.php';
 ?>

<?php
  ob_start();
  session_start();
  include_once './config/dbconnect.php';
  include_once './config/studentform.php';

    if (isset($_SESSION["user"]) && isset($_SESSION["role"])) {
        $role = $_SESSION["role"];
        $url = $role == "admin" ? "home.php" : "userhome.php";
        $studentobj->redirectToURL($url);
    }

  $error = false;

  if ( isset($_POST['submit']) ) {

    // clean user inputs to prevent sql injections
    $name = trim($_POST['name']);
    $name = strip_tags($name);
    $name = htmlspecialchars($name);

    $admn = trim($_POST['admn']);
    $admn = strip_tags($admn);
    $admn = htmlspecialchars($admn);

    $email = trim($_POST['email']);
    $email = strip_tags($email);
    $email = htmlspecialchars($email);

    $pass = trim($_POST['pass']);
    $pass = strip_tags($pass);
    $pass = htmlspecialchars($pass);

    // basic name validation
    if (empty($name)) {
      $error = true;
      $nameError = "Please enter your full name.";
    } else if (strlen($name) < 3) {
      $error = true;
      $nameError = "Name must have atleat 3 characters.";
    } else if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
      $error = true;
      $nameError = "Name must contain alphabets and space.";
    } else {
      $nameError = "";
    }

    //basic email validation
    if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
      $error = true;
      $emailError = "Please enter valid email address.";
    } else {
      $emailError = "";
    }
    // password validation
    if (empty($pass)){
      $error = true;
      $passError = "Please enter password.";
    } else if(strlen($pass) < 6) {
      $error = true;
      $passError = "Password must have atleast 6 characters.";
    } else {
      $passError = "";
    }

    // password encrypt using SHA256();
    $password = hash('sha256', $pass);

    // if there's no error, continue to signup
    if( !$error ) {
      $query = "INSERT INTO studentdata(studentName,studentAdmn, studentEmail,studentPass) VALUES('$name','$admn','$email','$password')";
      $res = $conn->exec($query);

      if ($res) {
        $errTyp = "success";
        $errMSG = "Successfully registered, you may login now";
        unset($name);
        unset($email);
        unset($pass);
        $studentobj->redirectToURL("login.php");
      } else {
        $errTyp = "danger";
        $errMSG = "Something went wrong, try again later...";
        echo "$errMSG";
      }
    }
  }
?>

  <div class="container">
    <h1>Student Registration Form</h1>
    <form class="form-horizontal" action="<?= $studentobj->selfScriptCall(); ?>" method="post">
      <div class = "form-group">
        <label for="name" class="col-sm-2 control-label">Name: </label>
        <div class="col-sm-7">
          <input type="text" id="name" class = "form-control" name="name"/>
        </div>
        <div class="col-sm-3">
          <span id="name-info">
            <?php
            if(isset($nameError)){
              echo $nameError;
            } ?>
          </span><br/>
        </div>
      </div>
      <div class = "form-group">
        <label for="admn" class="col-sm-2 control-label">Admission Number: </label>
        <div class="col-sm-7">
          <input type="text" id="admn" class = "form-control" name="admn"/>
        </div>
        <div class="col-sm-3">
          <span id="adminfo"></span><br/>
        </div>
      </div>
      <div class = "form-group">
        <label for="email" class="col-sm-2 control-label">Email: </label>
        <div class="col-sm-7">
          <input type="text" id="email" class = "form-control" name="email"/>
        </div>
        <div class="col-sm-3">
          <span id="mailinfo"><?php
            if(isset($emailError)){
              echo $emailError;
            } ?>
          </span><br/>
        </div>
      </div>
      <div class = "form-group">
        <label for="pass" class="col-sm-2 control-label">Password: </label>
        <div class="col-sm-7">
          <input type="password" id="pass" class = "form-control" name="pass"/>
        </div>
        <div class="col-sm-3">
          <span id="passinfo">
            <?php
            if(isset($passError)){
              echo $passError;
            } ?>
          </span><br/>
        </div>
      </div>
      <div id="form-btn">
        <button class="btn btn-primary" id="sub-button" name="submit" type="submit">Submit</button>
        <button id="reset-btn" class="btn btn-danger" type="reset" >Reset</button>
      </div>
    </form>
  </div>