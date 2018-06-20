<?php
    require_once "../../config.php";
    require_once "../../function.php";
    $currentPage = $_POST["currentPage"];
    $pageSize = $_POST["pageSize"];
    $offset = ($currentPage-1)*$pageSize;
    $connect = connect();
    $sql = "select c.author,c.created,c.content,c.status,p.slug from comments c
    LEFT JOIN posts p on c.post_id = p.id
    limit {$offset},{$pageSize}";
    $count = "select count(*) as pageCount  from comments";
    $countResult = select($connect,$count);
    $totalPage =ceil($countResult[0]['pageCount']/$pageSize);
    $result = select($connect,$sql);
    $response = ["code" => 0, "msg" => "操作失败"];
    if ($result) {
        $response["code"] = 1;
        $response["msg"] = "操作成功";
        $response["data"] = $result;
        $response["totalPage"] = $totalPage;
    };
    header('content-type: application/json;charset=utf-8');
    echo json_encode($response);
?>