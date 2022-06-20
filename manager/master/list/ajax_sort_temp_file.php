<?php
session_start();
require_once($_SERVER["DOCUMENT_ROOT"].'/inc/dbconn.php');

$temp = $_POST['temp'];

for($i = 0; $i < count($_POST["idx"]); $i++) {
    $sql = "
        UPDATE
            attachment_temp
        SET
            ordering_index = '".($_POST["camera_num"][$i]-1)."'
        WHERE 
            idx = '".$_POST["idx"][$i]."'";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
}

$stmt->close();

$result["success"] = true;

header('Content-type: application/json');
echo(json_encode($result));
exit;
