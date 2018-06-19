<?php
require_once "../../config.php";
require_once "../../function.php";
session_start();
$userId = $_SESSION["userId"];
$connect = connect();
$sql = "select * from users where id = {$userId}";
$result = select($connect,$sql);
$response = ["code"=>0,"msg"=>"操作失败"];
if ($result) {
    $response["code"] = 1;
    $response["msg"] = "操作成功";
    $response["avatar"] = $result[0]["avatar"];
    $response["nickname"] = $result[0]["nickname"];
};
// header('content-type: application/json;charset=utf-8');
header("Content-Type:application/json;charset=utf-8");
echo json_encode($response);
?>