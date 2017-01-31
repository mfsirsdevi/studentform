<?php
    session_start();
    if(isset($_POST['name']) && isset($_POST['admn']) && isset($_POST['email']) && isset($_POST['role'])){
        // include Database connection file
        include("./config/config.php");

        // get values
        $name = $studentobj->Sanitize($_POST['name']);
        $admn = $studentobj->Sanitize($_POST['admn']);
        $email = $studentobj->Sanitize($_POST['email']);
        $role = $studentobj->Sanitize($_POST['role']);

        $record = $studentobj->connection->createRecord('StudentForm');
        $record->setField('studentName', $name);
        $record->setField('studentAdmn', $admn);
        $record->setField('studentEmail', $email);
        $record->setField('userRole', $role);
        $result = $record->commit();
        if (FileMaker::isError($result)) {
            echo "problem executing the request";
        }
    }
?>