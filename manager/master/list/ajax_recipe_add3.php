<?php
session_start();
require_once($_SERVER["DOCUMENT_ROOT"].'/inc/dbconn.php');

$temp = $_POST["temp"];
$count = count($_POST["ins_idx"]);

// 재료 삭제
if($count > 0) {    
    $sql = "DELETE FROM recipe_ins2_temp WHERE temp_idx = '$temp'";
        
    if($stmt = $conn->prepare($sql)) {
        $stmt->execute();
    } else {
        $error = $conn->errno . ' ' . $conn->error;
        echo $error;
    }
    if($conn -> connect_error || $conn -> connect_errno || mysqli_stmt_error($stmt) || mysqli_stmt_errno($stmt))
    {
        echo 'MySQL Connection Error: ('.$conn -> connect_errno.')'.$conn -> connect_error ;
        echo mysqli_stmt_errno($stmt).' - '.mysqli_stmt_error($stmt);
    }
    $stmt->close();
}

for($i = 0; $i < $count; $i++) {
    $ins_idx = $_POST["ins_idx"][$i];
    $amount = $_POST["amount"][$i];
    $unit = $_POST["unit"][$i];

    $sql = "INSERT INTO recipe_ins2_temp (temp_idx, ins_idx, amount, unit) VALUES ('$temp', '$ins_idx', '$amount', '$unit')";
            
    if($stmt = $conn->prepare($sql)) {
        $stmt->execute();
    } else {
        $error = $conn->errno . ' ' . $conn->error;
        echo $error;
    }
    if($conn -> connect_error || $conn -> connect_errno || mysqli_stmt_error($stmt) || mysqli_stmt_errno($stmt))
    {
        echo 'MySQL Connection Error: ('.$conn -> connect_errno.')'.$conn -> connect_error ;
        echo mysqli_stmt_errno($stmt).' - '.mysqli_stmt_error($stmt);
    }
    $stmt->close();
}

exit;