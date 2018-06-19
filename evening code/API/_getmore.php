<?php
sleep(1);
include_once "../mysql.php";
$categoryId = $_POST['categoryId'];
$pageSize = $_POST['pageSize'];
$currentPage = $_POST['currentPage'];
$offset = ($currentPage - 1) * $pageSize;
$sql = "select p.id, p.title, p.feature, p.created, p.content, p.views, p.likes, c.`name`, u.nickname,
        (select count(id) from comments where comments.post_id = p.id) as countComment
        from posts p
        LEFT JOIN categories c on c.id = p.category_id
        LEFT JOIN users u on u.id = p.user_id
        WHERE p.`category_id`={$categoryId}
        order by p.created desc
        limit {$offset},{$pageSize}";
$result = select($sql);
$totalSql = "select count(id) as postCount from posts  WHERE posts.`category_id`={$categoryId}";
$postCount = select($totalSql);
$response = ['code' => 0, 'msg' => '操作不成功'];
if ($result) {
    $response['code'] = 1;
    $response['msg'] = "操作成功";
    $response['postCount'] = $postCount;
    $response['data'] = $result;
}
header('content-type:application/json;charset=utf-8');
echo json_encode($response);
