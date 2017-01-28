<?php
    /*
     * File Name: config.php
     * Used For: Student Form creation assignment for mindfire training session
     * Created By: R S DEVI PRASAD
     * Description: php page containing all the important information about the database with which the app is linked to.
     */
    include_once 'studentform.php';

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "studentdb";

    $studentobj = new StudentForm();

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

 ?>