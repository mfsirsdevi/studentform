<?php
    $number = $_POST['del_id'];
    if (isset($number)) {
        include_once './config/dbconnect.php';
        $sql = "DELETE FROM studentdata WHERE studentId =:id";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(":id", $number);
        if ($stmt->execute()) {
            # code...
            echo "YES";
        }else {
            echo "NO";
        }
    }
?>