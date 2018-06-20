<?php
require_once "../../config.php";
require_once "../../function.php";
$connect = connect();
$response = ["code" =>0,"msg" =>"操作失败"];
$addResult = insert($connect,"posts",$_POST);
   if ($addResult) {
    $response["code"] = 1;
   $response["msg"] = "操作成功";
   }
   header('content-type: application/json;charset=utf-8');
echo json_encode($response);

?>