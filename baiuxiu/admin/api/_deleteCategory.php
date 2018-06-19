<?php
require_once '../../config.php';
require_once '../../function.php';
$categoryId = $_GET['categoryId'];
$connect = connect();
$sql = "delete from categories where id = '{$categoryId}'";
$result = mysqli_query($connect,$sql);
$response = ["code" =>0,"msg" => "删除失败"];
if ($result) {
    $response["code"] = 1;
    $response["msg"] = "删除成功";
}
header('content-type: application/json;charset=utf-8');
 echo json_encode($response);
?>