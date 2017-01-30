<?php
    if(isset($_POST['id']) && isset($_POST['id']) != "") {
    // include Database connection file
    include("./config/config.php");
    // get user id
    $str = $_POST['id'];
    preg_match_all('!\d+!', $str, $matches);
    $var = implode('', $matches[0]);
    echo "$var";

    // delete User
    $deleteRecord = $studentobj->connection->newDeleteCommand('StudentForm', $var);
    $result = $deleteRecord->execute();

}
 ?>