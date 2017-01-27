<?php
    /*
    * Name: config.php
    * Use For: Student Registration application
    * Created By: R S DEVI PRASAD
    * Description: File containing all the data required for connecting the web application to the database
    */

    // Include all the necessary files before connecting to the database
    include_once 'studentform.php';

    // Database details of the website
    $database = 'StudentForm.fmp12';
    $host = '172.16.9.62';
    $username = 'admin';
    $password = 'rsRAJA77352@';

    // Declaring the filemaker and studentform objects
    $studentobj = new StudentForm();
    $studentobj->connection = new FileMaker($database, $host, $username, $password);
