<?php
/*
  file-name: dbconnect.php
  used-for: Student Form creation assignment for mindfire training session
  created-by: r s devi prasad
  description: php page containing all the important information about the database with which the app is linked to.
*/



  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "studentdb";

  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
  catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

 ?>