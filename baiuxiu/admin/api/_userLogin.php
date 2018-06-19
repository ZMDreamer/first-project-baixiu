<?php
require_once '../../config.php';
require_once '../../function.php';
$email = $_POST['email'];
$password = $_POST['password'];
$connect = connect();
$sql = "select*from users where users.email = '{$email}' and users.password = '{$password}' and users.status='activated'";
$result = select($connect,$sql);
$response = ['code'=>0,'msg'=>'验证失败'];
if ($result) {
$response['code'] = 1;
$response['msg'] = '验证成功';
session_start();
$_SESSION["isLogin"]=1;
$_SESSION["userId"] = $result[0]["id"]; 
}
header('content-type: application/json;charset=utf-8');
echo json_encode($response);
?>