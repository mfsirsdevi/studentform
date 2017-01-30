<?php
    if(isset($_POST['name']) && isset($_POST['admn']) && isset($_POST['email']) && isset($_POST['pass']))
    {
        // include Database connection file
        include("./config/config.php");

        // get values
        $name = $studentobj->Sanitize($_POST['name']);
        $admn = $studentobj->Sanitize($_POST['admn']);
        $email = $studentobj->Sanitize($_POST['email']);
        $pass = $studentobj->Sanitize($_POST['pass']);

        $password = hash('sha256', $pass);

        $record = $studentobj->connection->createRecord('StudentRegister');
        $record->setField('studentName', $name);
        $record->setField('studentAdmn', $admn);
        $record->setField('studentEmail', $email);
        $record->setField('studentPass', $password);
        $result = $record->commit();
        if ($result) {
            echo "1 Record Added!";
        }
    }
?>