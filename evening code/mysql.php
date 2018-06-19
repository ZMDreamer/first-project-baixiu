<?php
function idu($sql) {
    // header('content-type: text/html;charset=utf-8');
    $conn = mysqli_connect('localhost', 'root', 'root', 'db_baixiu');
    if (!$conn) {
        die('链接服务器失败');
    }
    mysqli_set_charset($conn,'uft8');
    $result = mysqli_query($conn,$sql);
    if (mysqli_affected_rows($conn)>0) {
        return true;
    }else{
        return false;
    };
  
}



function select($sql) {
    // header('content-type: text/html;charset=utf-8');
    $conn = mysqli_connect('localhost', 'root', 'root', 'db_baixiu');
    if (!$conn) {
        die('链接服务器失败');
    }
    mysqli_set_charset($conn, 'uft8');
    $result = mysqli_query($conn, $sql);
   if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $arr[] = $row;
        }
        return $arr;
    } else {
        return false;
    };
}
?>
