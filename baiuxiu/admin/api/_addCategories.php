<?php
require_once "../../config.php";
require_once "../../function.php";
$add_name = $_POST['name'];
$add_slug = $_POST['slug'];
$add_classname = $_POST['classname'];
$connect = connect();
$querySql = "select count(*) as countName from categories where categories.name = '{$add_name}'";
$queryResult = select($connect,$querySql); 
$countName = $queryResult[0]['countName'];
$response = ["code" =>0,"msg" =>"操作失败"];
if ($countName > 0) {
  $response["data"] = "该用户已经存在";
}else{
   $addResult = insert($connect,"categories",$_POST);
   if ($addResult) {
    $response["code"] = 1;
   $response["msg"] = "操作成功";
   }
  
}
header('content-type: application/json;charset=utf-8');
echo json_encode($response);
?>