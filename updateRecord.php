<?php
    session_start();
    // include Database connection file
    include("./config/config.php");

    // check request
    if(isset($_POST))
    {
        // get values
        $id = $_POST['id'];
        $name = $_POST['name'];
        $admn = $_POST['admn'];
        $email = $_POST['email'];

        // Update User details
        $record = $studentobj->connection->newEditCommand('StudentForm', $id);
        $record->setField('studentName', $name);
        $record->setField('studentAdmn', $admn);
        $record->setField('studentEmail', $email);
        $result = $record->execute();
    }