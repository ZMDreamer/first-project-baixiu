<?php
function  checkLogin(){
    session_start();
    if(!isset($_SESSION["isLogin"]) || $_SESSION["isLogin"]!=1){
        header("Location:login.php");
    }
}
function connect() {
    $connect = mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_NAME);
    return $connect;
}
function select($connect,$sql) {
    $result = mysqli_query($connect,$sql);
    return fetch($result);
}
function fetch($result) {
    $arr =[];
    while($row =mysqli_fetch_assoc($result)){
        $arr[] = $row;
    }
    return $arr;
}


//给表单添加数据
function insert($connect,$tables,$arr) {
    $keys=array_keys($arr);
    $values=array_values($arr);
    $sqlAdd="insert into $tables (".implode(',',$keys).") values ('".implode("','",$values)."')";
    $insertData = mysqli_query($connect,$sqlAdd);
    return  $insertData;
}
?>