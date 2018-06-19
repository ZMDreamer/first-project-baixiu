<?php
include_once "../../config.php";
include_once '../../function.php';
$connect = connect();
$sql = "select*from categories";
$result = select($connect,$sql);
$response = ["code" =>0, "msg" => "操作失败"];
if ($result) {
    $response["code"] = 1;
    $response["msg"] = "操作成功";
    $response["data"] = $result;
}
header('content-type: application/json;charset=utf-8');
echo json_encode($response);
?>