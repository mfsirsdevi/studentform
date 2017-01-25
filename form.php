<!--
  file-name: information.php
  used-for: Student Form creation assignment for mindfire training session
  created-by: r s devi prasad
  description: form for collecting student and admin additonal information.
-->

<?php
    $PageTitle = "Information Form";
    include_once 'header.php';
    include_once './config/dbconnect.php';
    include_once './config/studentform.php';
 ?>

 <h1>Student Details Form</h1>

 <form class="form-horizontal" name="StudentForm" id="student-form" action="" method="post">
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

<?php
    include_once 'footer.php';
 ?>