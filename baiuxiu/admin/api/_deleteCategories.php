<?php
require_once "../../config.php";
require_once "../../function.php";
$id = $_POST['id'];
$connect = connect();
$sql = "delete from categories where id in('".implode("','",$id)."') ";
$result = mysqli_query($connect,$sql);
$response = ['code'=>0,"msg"=>"操作失败"];
if ($result) {
    $response['code'] = 1;
    $response["msg"] = "操作成功";
}
header('content-type: application/json;charset=utf-8');
echo json_encode($response);
?>