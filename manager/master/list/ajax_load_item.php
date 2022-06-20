<?php
session_start();
require_once($_SERVER["DOCUMENT_ROOT"].'/inc/dbconn.php');

$idx = $_GET['idx'];

// 레시피 불러오기
$sql = "    
SELECT 
    r.recipe_idx, r.influencer_idx, r.title, r.sub_title, r.tag, r.tip, ifnull(r.count, 0) as count, ifnull(r.scrap, 0) as scrap, ifnull(r.basket, 0) as basket, r.ok, r.youtube,
    date_format(r.create_date, '%y.%m.%d') as create_date, 
    date_format(r.update_date, '%y.%m.%d') as update_date,
    (SELECT influencer_name FROM influencer as i WHERE i.influencer_idx = r.influencer_idx) as influencer_name,
    (SELECT tag FROM influencer as i WHERE i.influencer_idx = r.influencer_idx) as influencer_tag,        
    (SELECT COUNT(*) FROM scrap WHERE user_idx = ? AND recipe_idx = r.recipe_idx) as count_fav,
    t.name as t_name, t.t_idx
FROM 
    recipe as r
LEFT OUTER JOIN
    theme AS t ON t.t_idx = r.theme
WHERE
    r.recipe_idx = ?";

if($stmt = $conn->prepare($sql)) { // assuming $mysqli is the connection
    $stmt->bind_param('ss', $_SESSION["idx"], $idx);
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

$stmt->bind_result(
    $result["recipe_idx"], $result["influencer_idx"], $result["title"], $result["sub_title"], $result["tag"], $result["tip"], 
    $result["count"], $result["scrap"], $result["basket"], $result["ok"], $result["youtube"], 
    $result["create_date"], $result["update_date"], $result["influencer_name"], $result["influencer_tag"], $result["count_fav"],
    $result["t_name"], $result["t_idx"]
);
$stmt->store_result();
$rowCount = $stmt->num_rows;

$stmt->fetch();
$stmt->close();

$ridx= $result["recipe_idx"];

    // 레시피 파일 불러오기
    $sql = " SELECT idx, ordering_index, file_url, file_name, from_content_id, from_table_id FROM attachment WHERE from_table_id='recipe' AND from_content_id=? ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('d', $ridx);
    $stmt->execute();
    
    if($conn -> connect_error || $conn -> connect_errno || mysqli_stmt_error($stmt) || mysqli_stmt_errno($stmt))
    {
        echo 'MySQL Connection Error: ('.$conn -> connect_errno.')'.$conn -> connect_error ;
        echo mysqli_stmt_errno($stmt).' - '.mysqli_stmt_error($stmt);
    }
    $stmt->bind_result($idx, $ordering_index, $file_url, $file_name, $from_content_id, $from_table_id);
    $stmt->store_result();
    $rowCountAttach = $stmt->num_rows;

    $list_idx = 0;
    while($stmt->fetch())
    {
        $result["attach"][$list_idx]['idx'] = $idx;
        $result["attach"][$list_idx]['ordering_index'] = $ordering_index;
        $result["attach"][$list_idx]['file_url'] = $file_url;
        $result["attach"][$list_idx]['file_name'] = $file_name;
        $result["attach"][$list_idx]['from_content_id'] = $from_content_id;
        $result["attach"][$list_idx]['from_table_id'] = $from_table_id;
        $list_idx = $list_idx + 1;
    }
    
    $stmt->free_result();
    $stmt->close();


// load recipe_ins 재료
$sql = "
    SELECT
        r.recipe_idx, r.ins_idx, r.amount, r.unit, i.name
    FROM 
        recipe_ins AS r
    LEFT OUTER JOIN 
        ins AS i ON i.ins_idx = r.ins_idx
    where
        r.recipe_idx = '$ridx'";

$stmt = $conn->prepare($sql);
$stmt->execute();
if($conn -> connect_error || $conn -> connect_errno || mysqli_stmt_error($stmt) || mysqli_stmt_errno($stmt))
{
    echo 'MySQL Connection Error: (' . $conn->connect_errno . ')' . $conn->connect_error;
    echo mysqli_stmt_errno($stmt) . ' - ' . mysqli_stmt_error($stmt);
}
$stmt->bind_result($idx, $ins_idx, $amount, $unit, $name);
$stmt->store_result();
$rowCountIns = $stmt->num_rows;

$list_idx = 0;
while($stmt->fetch())
{
    $result["ins"][$list_idx]['recipe_idx'] = $idx;
    $result["ins"][$list_idx]['ins_idx'] = $ins_idx;
    $result["ins"][$list_idx]['amount'] = $amount;
    $result["ins"][$list_idx]['unit'] = $unit;
    $result["ins"][$list_idx]['name'] = $name;
    $list_idx = $list_idx + 1;
}

$stmt->free_result();
$stmt->close();

// load recipe_ins2 양념
$sql = "    
    SELECT
        r.recipe_idx, r.ins_idx, r.amount, r.unit, i.name
    FROM 
        recipe_ins2 AS r
    LEFT OUTER JOIN 
        ins2 AS i ON i.ins_idx = r.ins_idx
    where
        r.recipe_idx = '$ridx'";

$stmt = $conn->prepare($sql);
$stmt->execute();
if($conn -> connect_error || $conn -> connect_errno || mysqli_stmt_error($stmt) || mysqli_stmt_errno($stmt))
{
    echo 'MySQL Connection Error: (' . $conn->connect_errno . ')' . $conn->connect_error;
    echo mysqli_stmt_errno($stmt) . ' - ' . mysqli_stmt_error($stmt);
}
$stmt->bind_result($idx, $ins_idx, $amount, $unit, $name);
$stmt->store_result();
$rowCountIns2 = $stmt->num_rows;

$list_idx = 0;
while($stmt->fetch())
{
    $result["ins2"][$list_idx]['recipe_idx'] = $idx;
    $result["ins2"][$list_idx]['ins_idx'] = $ins_idx;
    $result["ins2"][$list_idx]['amount'] = $amount;
    $result["ins2"][$list_idx]['unit'] = $unit;
    $result["ins2"][$list_idx]['name'] = $name;
    $list_idx = $list_idx + 1;
}

$stmt->free_result();
$stmt->close();


// load recipe_join_tag 
$sql = "    
    SELECT
        rt.rt_idx, rjt.tag_num, rt.name
    FROM 
        recipe_join_tag AS rjt
    LEFT OUTER JOIN 
        recipe_tag AS rt ON rt.rt_idx = rjt.tag_idx
    where
        rjt.recipe_idx = '$ridx'";

$stmt = $conn->prepare($sql);
$stmt->execute();
if($conn -> connect_error || $conn -> connect_errno || mysqli_stmt_error($stmt) || mysqli_stmt_errno($stmt))
{
    echo 'MySQL Connection Error: (' . $conn->connect_errno . ')' . $conn->connect_error;
    echo mysqli_stmt_errno($stmt) . ' - ' . mysqli_stmt_error($stmt);
}
$stmt->bind_result($rt_idx, $tag_num, $name);
$stmt->store_result();
$rowCountTag = $stmt->num_rows;

$list_idx = 0;
while($stmt->fetch())
{
    $result["tag"][$list_idx]['rt_idx'] = $rt_idx;
    $result["tag"][$list_idx]['tag_num'] = $tag_num;
    $result["tag"][$list_idx]['name'] = $name;
    $list_idx = $list_idx + 1;
}

$stmt->free_result();
$stmt->close();


header('Content-type: application/json');
echo(json_encode($result));
exit;