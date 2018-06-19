<?php
$ext = strrchr($_FILES['file']['name'],'.');
$filename = "../../static/uploads/".time().rand().$ext;
$bool = move_uploaded_file($_FILES['file']['tmp_name'],$filename);
$response = ["code" =>0, "msg" => "操作失败"];
if ($bool) {
    $response["code"] = 1;
    $response["msg"] = "操作成功";
    $response["src"] = $filename;

}
header('content-type: application/json;charset=utf-8');
echo json_encode($response);

?>