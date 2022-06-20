<?php
session_start();
require_once($_SERVER["DOCUMENT_ROOT"].'/inc/dbconn.php');

$r_idx = $_POST["idx"];
$count = count($_POST["ins_idx"]);

// 재료 삭제
if($count > 0) {    
    $sql = "DELETE FROM recipe_ins2 WHERE recipe_idx = '$r_idx'";
        
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

    $sql = "INSERT INTO recipe_ins2 (recipe_idx, ins_idx, amount, unit) VALUES ('$r_idx', '$ins_idx', '$amount', '$unit')";
            
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