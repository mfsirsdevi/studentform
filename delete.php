<?php
    include('./config/dbconnect.php');
    $number = $_POST['delId'];
    $sql = "DELETE FROM studentdata WHERE studentId =:id";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(":id", $number);
    $stmt->execute();
?>