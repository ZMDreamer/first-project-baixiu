<?php require_once "../../config.php";
    require_once "../../function.php";
    $categoryId = $_POST['categoryId'];
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $classname = $_POST['classname'];
    $connect = connect();
    $sql = "update categories set name = '{$name}',slug = '{$slug}',classname = '{$classname}' where id = '{$categoryId}'";
    $result = mysqli_query($connect,$sql);
    $response = ["code"=>0,"msg"=>"操作失败"];
    if (mysqli_affected_rows($connect)>0) {
        $response["code"] = 1;
        $response["msg"] = "操作成功";
    }
    header('content-type: application/json;charset=utf-8');
    echo json_encode($response);
?>