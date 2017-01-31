<?php
    session_start();
    // include Database connection file
    include("./config/config.php");

    // check request
    if(isset($_POST['id']) && isset($_POST['id']) != ""){
        // get User ID
        $user_id = $_POST['id'];

        // Get User Details
        $result = $studentobj->connection->getRecordById('StudentForm', $user_id);
        $response = array();
        if(!(FileMaker::isError($result))) {
                $response['studentName'] = $result->getField('studentName');
                $response['studentAdmn'] = $result->getField('studentAdmn');
                $response['studentEmail'] = $result->getField('studentEmail');
        }
        else
        {
            $response['status'] = 200;
            $response['message'] = "Data not found!";
        }
        // display JSON data
        echo json_encode($response);
    } else {
        $response['status'] = 200;
        $response['message'] = "Invalid Request!";
    }