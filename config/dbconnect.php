<!--
  file-name: dbconnect.php
  used-for: Student Form creation assignment for mindifire training session
  created-by: r s devi prasad
  description: file containing all the database information of the website.
-->

<?php

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