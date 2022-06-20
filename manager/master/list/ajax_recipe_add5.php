<?php
session_start();
require_once($_SERVER["DOCUMENT_ROOT"].'/inc/dbconn.php');

$temp = $_POST["temp"];

// 레시피 입력
$sql = "INSERT INTO recipe 
            (   influencer_idx, theme, title, sub_title, tip, 
                youtube, tag, count, scrap, basket, 
                ok, create_date, update_date
            )   SELECT 
                    influencer_idx, theme, title, sub_title, tip, 
                    youtube, tag, count, scrap, basket, 
                    ok, now(), now()
                FROM
                    recipe_temp
                WHERE
                    temp_idx = '$temp' ";
        
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

$stmt = $conn->prepare('SELECT LAST_INSERT_ID()');
$stmt->execute();
$stmt->bind_result($recipe_idx);
$stmt->store_result();
$stmt->fetch();
$stmt->free_result();
$stmt->close();	

// 재료 입력 
$sql = "
    INSERT INTO recipe_ins
        ( recipe_idx, ins_idx, amount, unit )   
    SELECT 
        '$recipe_idx', ins_idx, amount, unit
    FROM
        recipe_ins_temp
    WHERE
        temp_idx = '$temp' ";

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

// 양념 입력 
$sql = "
    INSERT INTO recipe_ins2
        ( recipe_idx, ins_idx, amount, unit )   
    SELECT 
        '$recipe_idx', ins_idx, amount, unit
    FROM
        recipe_ins2_temp
    WHERE
        temp_idx = '$temp' ";

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

// 태그 입력 
$sql = "
    INSERT INTO recipe_join_tag
        ( recipe_idx, tag_idx, tag_num )
    SELECT 
        '$recipe_idx', tag_idx, tag_num
    FROM
        recipe_join_tag_temp
    WHERE
        temp_idx = '$temp' ";

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

// 파일 입력 
$sql = "
    INSERT INTO attachment
        ( ordering_index, file_url, file_name, from_content_id, from_table_id )
    SELECT 
        ordering_index, file_url, file_name, '$recipe_idx', from_table_id
    FROM
        attachment_temp
    WHERE
        from_temp_id = '$temp' ";

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


exit;