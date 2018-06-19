<?php
sleep(1.5);
require_once "../config.php";
require_once "../function.php";
$categoryId = $_POST['categoryId'];
$currentPage = $_POST['currentPage'];
$pageSize = $_POST['pageSize'];
$offsetPage = ($currentPage - 1) *$pageSize;
$connect = connect();
$sql = "SELECT
	p.title,
	p.created,
	p.content,
	p.views,
	p.likes,
	p.feature,
	c. NAME,
	p.id,
	u.nickname,
(SELECT count(id) FROM comments WHERE post_id = p.id) AS countComment
FROM posts p
LEFT JOIN categories c ON c.id = p.category_id
LEFT JOIN users u ON u.id = p.user_id
WHERE
	p.category_id = {$categoryId}
ORDER BY created DESC
LIMIT {$offsetPage},{$pageSize}";
$postArr = select($connect,$sql);
//print_r($postArr);
$sqlCount = "select count(id) as postCount from posts where category_id={$categoryId}";
$pageCount = select($connect,$sqlCount);
$response = ["code"=>"0","msg" => "操作失败"];
if ($postArr) {
    $response['code'] = 1;
	$response['msg'] = "操作成功";
	$response['pageCount'] = $pageCount;
    $response['data'] = $postArr;
};
 header("Content-Type:application/json;charset=utf-8");
echo json_encode($response);

?>