<?php
    session_start();
    $PageTitle = "Student Login Page";
    //include config file
    include_once './config/config.php';
    include_once 'header.php' ;

    /*
    file-name: login.php
    used-for: Student Form creation assignment for mindfire training session
    created-by: r s devi prasad
    description: login page of the student App for taking and verifying credentials.
    */


  if (isset($_SESSION["user"]) && isset($_SESSION["role"])) {
    $role = $_SESSION["role"];
    $url = $role == "admin" ? "home.php" : "userhome.php";
    $studentobj->redirectToURL($url);
  }

  $error = false;

  if (isset($_POST['login'])) {
      $email = $studentobj->Sanitize($_POST['email']);
      $pass = $studentobj->Sanitize($_POST['pass']);
      if (isset($_POST['role'])) {
          $role = $studentobj->Sanitize($_POST['role']);
      }

      if (empty($email)){
          $error = true;
          $emailError = "Please enter your email address.";
      } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
          $error = true;
          $emailError = "Please enter valid email address.";
      }

      if (empty($pass)){
          $error = true;
          $passError = "Please enter your password.";
      }

    // if there's no error, continue to login
      if (!$error) {
          $password = hash('sha256', $pass); // password hashing using SHA256
          $request = $studentobj->connection->newFindCommand('StudentForm');
          $request->addFindCriterion('studentEmail', '=='.$email);
          $request->addFindCriterion('studentPass', $password);
          $request->addFindCriterion('userRole', $role);
          $result = $request->execute();
        if (FileMaker::isError($result)) {
            $errMSG = "Incorrect credentials. Try again...";
        } else {
            $records = $result->getRecords();
            $errMSG = "Success!";
            foreach ($records as $record) {
              $_SESSION["user"] = $record->getField('studentId');
              $_SESSION["role"] = $record->getField('userRole');
              $_SESSION["userId"] = $record->getRecordId();
              $url = ($record->getField('userRole') == 'admin') ? "home.php" : "userhome.php";
              $studentobj->redirectToURL($url);
            }
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
     ?>
     <div>
       <h3>New User?</h3>
       <a class="btn btn-primary" href="register.php">Sign Up</a>
     </div>
  </div>

  <?php
      include_once 'footer.php';
   ?>
