<?php
  $PageTitle = "Admin Page";
  $user = 'root';
  $password = '';
  $db = 'studentdb';

  // Create connection with the database
  $conn = new mysqli('localhost', $user, $password, $db);

  // Checking the connection
  if ($conn -> connect_error) {
    die("Connection failed: ". $conn->connect_error);
  }

  // Creating the table using sql query
  $createtable = "CREATE TABLE IF NOT EXISTS StudentData (
    name varchar(255) PRIMARY KEY,
    category varchar(255),
    gender varchar(255),
    dob varchar(255),
    age varchar(255),
    nationality varchar(255),
    guardian varchar(255),
    guradianRelation varchar(255),
    institute varchar(255),
    address varchar(255),
    city varchar(255),
    state varchar(255),
    pin varchar(255),
    mail varchar(255),
    phone varchar(255),
    proof varchar(255),
    proofNumber varchar(255)
  )";

  //$conn->close();
 ?>

<?php
  $PageTitle = "Entered Data";
  incude_once 'header.php' ;
 ?>
   <!-- Start of the body part-->
    <?php
      echo "Hello PHP";
     ?>
   <!---->
  <?php
    include_once 'footer.php' ;
   ?>