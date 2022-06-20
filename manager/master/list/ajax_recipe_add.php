<?php
session_start();
require_once($_SERVER["DOCUMENT_ROOT"].'/inc/dbconn.php');

$temp = $_POST['temp'];
$influencer = $_POST['influencer'];
$theme = $_POST['theme'];
$title = $_POST['title'];
$sub_title = $_POST['sub_title'];

// 레시피 불러오기
$sql = "    
SELECT 
    temp_idx
FROM 
    recipe_temp
WHERE
    temp_idx = '$temp'";

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

$stmt->bind_result($result["temp_idx"]);
$stmt->store_result();
$rowCount = $stmt->num_rows;

$stmt->fetch();
$stmt->close();

$result["success"] = "update";

if($rowCount > 0) {
    $sql = "
        UPDATE recipe_temp SET
            influencer_idx = '$influencer', 
            theme = '$theme', 
            title = '$title', 
            sub_title = '$sub_title'
        WHERE            
            temp_idx = '$temp' ";
} else {
    $result["success"] = "insert";
    $sql = "
        INSERT INTO recipe_temp
            (temp_idx, influencer_idx, theme, title, sub_title)
        VALUES
            ('$temp', '$influencer', '$theme', '$title', '$sub_title') ";
}
 
if($stmt = $conn->prepare($sql)) { // assuming $mysqli is the connection
    $stmt->execute();
    // any additional code you need would go here.
} else {
    $error = $conn->errno . ' ' . $conn->error;
    echo $error; // 1054 Unknown column 'foo' in 'field list'
}

if($conn -> connect_error || $conn -> connect_errno || mysqli_stmt_error($stmt) || mysqli_stmt_errno($stmt))
{
    echo 'MySQL Connection Error: ('.$conn -> connect_errno.')'.$conn -> connect_error ;
    echo mysqli_stmt_errno($stmt).' - '.mysqli_stmt_error($stmt);
}
$stmt->close();

header('Content-type: application/json');
echo(json_encode($result));
exit;