<!--
  file-name: index.php
  used-for: Student Form creation assignment for mindifire training session
  created-by: r s devi prasad
  description: it is a html file for creating and validating a student registration form, creating table from
  the form data and editing the data from the table.
-->

<!-- Header included-->
<?php

  $PageTitle = "Student Registration Form";

  include_once 'header.php' ;

 ?>
 <!-- End of including header -->

 <?php

  ob_start();
  session_start();

  include_once 'dbconnect.php' ;

  $error = false;

  if (isset($_POST['submit'])) {

    $name = trim($_POST['Name']);
    $category = trim($_POST['category']);
    $gender = trim($_POST['gender']);
    $dob = trim($_POST['dob']);
    $nation = trim($_POST['nationality']);
    $guardian = trim($_POST['guardian']);
    $institute = trim($_POST['institute']);
    $address = trim($_POST['address']);
    $city = trim($_POST['city']);
    $state = trim($_POST['state']);
    $pincode = trim($_POST['pincode']);
    $email = trim($_POST['user_mail']);
    $phone = trim($_POST['contact']);
    $idproof = trim($_POST['proof']);

    if (!$error) {
      try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO studentdata (studentName, studentCategory, studentGender, studentDob, studentNationality, studentGuardian, studentInstitute, studentAddress, studentCity, studentState, studentPincode, userEmail, studentPhone, studentIdProof) VALUES ('$name', '$category', '$gender', '$dob', '$nation', '$guardian', '$institute', '$address', '$city', '$state', '$pincode', '$email', '$phone', '$idproof')";
        $conn->exec($sql);
        echo "New record created";
      } catch (PDOException $e) {
          echo $sql . "<br>" . $e->getMessage();
      }
    }
    $conn = null;

    $message = "Your Activation Code";
    $to=$email;
    $subject="Activation Code For Student Registration Form";
    $from = 'rsdevi@mindfiresolutions.com';
    $body='Please Click On <a href="enterdata.php">This link</a>to activate  your account.';
    $headers = "From:".$from;
    mail($to,$subject,$body);
    echo "An Activation Code Is Sent To You Check You Emails";
  }

  ?>
    <div class="container">
      <h1>Student Registration Form</h1>
      <form class="form-horizontal" name="StudentForm" id="student-form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <div id="applicant-details">
          <h2>Applicant Details</h2>
          <div class = "form-group">
            <label for="name" class="col-sm-2 control-label">Name: </label>
            <div class="col-sm-7">
              <input type="text" id="name" class = "form-control" name="Name"/>
            </div>
            <div class="col-sm-3">
            <span id="name-info"></span><br/>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Category: </label>
            <div class="col-sm-7">
              <select class="form-control" name="category"  >
                <option value="general">General</option>
                <option value="others">Others</option>
              </select><br/>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Gender: </label>
            <label class="radio-inline">
              <input type="radio" name="gender" value="male" checked>male
            </label>
            <label class="radio-inline">
              <input type="radio" name="gender" value="female">female
            </label>
            <label class="radio-inline">
              <input type="radio" name="gender" value="other">other<br/>
            </label>
          </div>
          <div class="form-group">
            <label for="dob" class="col-sm-2 control-label">D.O.B: </label>
            <div class="col-sm-7">
              <input type="text" id="dob" class="form-control" name="dob"/>
            </div>
            <div class="col-sm-3">
              <span id="dob-info"></span><br/>
            </div>
          </div>
          <div class="form-group">
            <label for="nationality" class="col-sm-2 control-label">Nationality: </label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="nationality" id="nationality"/>
            </div>
            <div class="col-sm-3">
              <span id="nation-info"></span><br/>
            </div>
          </div>
          <div class="form-group">
            <label for="guardian" class="col-sm-2 control-label">Guardian Name: </label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="guardian" id="guardian"/>
            </div>
            <div class="col-sm-3">
              <span id="guard-info"></span><br/>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Institute: </label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="institute"/><br/>
            </div>
          </div>
        </div>
        <div id="contact-info">
          <h2>Communication Details</h2>
          <div class="form-group">
            <label for="line1" class="col-sm-2 control-label">Address : </label>
            <div class="col-sm-7">
              <input type="text" id="line1" class="form-control" name="address"/><br/>
            </div>
          </div>
          <div class="form-group">
            <label for="city" class="col-sm-2 control-label">City: </label>
            <div class="col-sm-7">
              <input type="text" id="city" class="form-control" name="city"/><br/>
            </div>
          </div>
          <div class="form-group">
            <label for="state" class="col-sm-2 control-label">State: </label>
            <div class="col-sm-7">
              <input type="text" id="state" class="form-control" name="state"/><br/>
            </div>
          </div>
          <div class="form-group">
            <label for="pin" class="col-sm-2 control-label">Pincode: </label>
            <div class="col-sm-7">
              <input type="number" id="pin" class="form-control" name="pincode"/><br/>
            </div>
          </div>
          <div class="form-group">
            <label for="mail" class="col-sm-2 control-label">E-mail: </label>
            <div class="col-sm-7">
              <input type="text" id="mail" class="form-control" name="user_mail"/>
            </div>
            <div class="col-sm-3">
              <span id="minfo"></span><br/>
            </div>
          </div>
          <div class="form-group">
            <label for="phone" class="col-sm-2 control-label">Phone Number: </label>
            <div class="col-sm-7">
              <input type="tel" id="phone" class="form-control" name="contact"/>
            </div>
            <div class="col-sm-3">
              <span id="cinfo"></span><br/>
            </div>
          </div>
          <div class="form-group">
            <label for="idproof" class="col-sm-2 control-label">ID Proof: </label>
            <div class="col-sm-7">
              <input type="text" id="idproof" class="form-control" name="proof"/><br/>
            </div>
          </div>
        </div>
        <div id="form-btn">
          <button class="btn btn-primary" id="sub-button" name="submit" type="submit">Submit</button>
          <button id="reset-btn" class="btn btn-danger" type="reset" >Reset</button>
        </div>
      </form>
      </div>
      <?php
        include_once 'footer.php' ;
       ?>