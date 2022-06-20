<?php
session_start();
require_once($_SERVER["DOCUMENT_ROOT"].'/inc/dbconn.php');

$temp = $_POST["temp"];
$tip = $_POST["tip"];
$youtube = $_POST["youtube"];
$tag_idx = $_POST["tag_idx"];
$count = count($_POST["tag_idx"]);
$writer = "admin";
$allowed_ext = ['png', 'jpg', 'gif'];
$order = 0;


// 태그 삭제
if($count > 0) {
    $sql = "DELETE FROM recipe_join_tag_temp WHERE temp_idx = '$temp'";
        
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
    $tag_idx = $_POST["tag_idx"][$i];
    $tag_num = $i+1;

    if($tag_idx != "") {
        $sql = "INSERT INTO recipe_join_tag_temp (temp_idx, tag_idx, tag_num) VALUES ('$temp', '$tag_idx', '$tag_num')";
                
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
}

$sql = "UPDATE recipe_temp SET tip = '$tip', youtube = '$youtube' WHERE temp_idx = '$temp'";
            
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



foreach ($_FILES as $file)
{
    if ( $file['error'] == 0)
    {
        // 실제 파일 업로드부
        $target_dir = '../../uploads/';
        $filename = $file['name'];
        $filename_modified = md5($filename . time() . $writer);
        $ex_filename = explode('.', $filename);
        $ext = array_pop($ex_filename);

        $target_file = $target_dir . $filename_modified . '.' . $ext;
        
        //확장자 확인
        if( !in_array($ext, $allowed_ext) ) 
        {
            // $stmt = $conn->prepare("DELETE FROM influencer WHERE idx = ?");
            // $stmt->bind_param('dsd', $order, $attachment_list, $current_idx);
            // $stmt->execute();
            // $conn->commit();
            // if($conn -> connect_error || $conn -> connect_errno || mysqli_stmt_error($stmt) || mysqli_stmt_errno($stmt))
            // {
            //     echo 'MySQL Connection Error: ('.$conn -> connect_errno.')'.$conn -> connect_error ;
            //     echo mysqli_stmt_errno($stmt).' - '.mysqli_stmt_error($stmt);
            // }
            // $stmt->close();
            // exit;
        }
        else if ( $file['size'] > 1024 * 1024)
        {
            // echo "
            // <script type='text/javascript'>
            //     alert('1MB 이하의 파일을 업로드해 주세요.');
            //     document.location.href='./influencer_add.php';
            // </script>";
            // $stmt = $conn->prepare("DELETE FROM influencer WHERE idx = ?");
            // $stmt->bind_param('dsd', $order, $attachment_list, $current_idx);
            // $stmt->execute();
            // $conn->commit();
            // if($conn -> connect_error || $conn -> connect_errno || mysqli_stmt_error($stmt) || mysqli_stmt_errno($stmt))
            // {
            //     echo 'MySQL Connection Error: ('.$conn -> connect_errno.')'.$conn -> connect_error ;
            //     echo mysqli_stmt_errno($stmt).' - '.mysqli_stmt_error($stmt);
            // }
            // $stmt->close();
            // exit;
        }

        // 파일 이동
        move_uploaded_file( $file['tmp_name'], $target_file);

        // 기존 DB 삭제
        $stmt = $conn->prepare("DELETE FROM attachment_temp WHERE from_temp_id = '$temp' AND from_table_id = 'recipe_interview'");
        $stmt->execute();
        $conn->commit();
        if($conn -> connect_error || $conn -> connect_errno || mysqli_stmt_error($stmt) || mysqli_stmt_errno($stmt))
        {
            echo 'MySQL Connection Error: ('.$conn -> connect_errno.')'.$conn -> connect_error ;
            echo mysqli_stmt_errno($stmt).' - '.mysqli_stmt_error($stmt);
        }
        $stmt->close();

        // 디비 입력
        $stmt = $conn->prepare("INSERT INTO attachment_temp (ordering_index, file_url, file_name, from_temp_id, from_table_id) VALUES (?, ?, ?, ?, 'recipe_interview')");
        $stmt->bind_param('dssd', $order, $target_file, $filename, $temp);
        $stmt->execute();
        $conn->commit();
        if($conn -> connect_error || $conn -> connect_errno || mysqli_stmt_error($stmt) || mysqli_stmt_errno($stmt))
        {
            echo 'MySQL Connection Error: ('.$conn -> connect_errno.')'.$conn -> connect_error ;
            echo mysqli_stmt_errno($stmt).' - '.mysqli_stmt_error($stmt);
        }
        $stmt->close();
        
        $stmt = $conn->prepare('SELECT LAST_INSERT_ID()');
        $stmt->execute();
        $stmt->bind_result($current_file_idx);
        $stmt->store_result();
        $stmt->fetch();
        $stmt->free_result();
        $stmt->close();	

        $attachment_list[$order] = $current_file_idx;
        $order = $order + 1;
    }
}



exit;