<?php
    $number = $_POST['id'];
    $col = $_POST['column'];
    $editValue = $_POST['editVal'];
    if (isset($number)) {
        include_once './config/dbconnect.php';
        $sql = "UPDATE studentdata SET :column = :editVal WHERE studentId =:id";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(":id", $number);
        $stmt->bindValue(":column", $col);
        $stmt->bindValue(":editVal", $editValue);
        if ($stmt->execute()) {
            # code...
            echo "YES";
        }else {
            echo "NO";
        }
    }
?>