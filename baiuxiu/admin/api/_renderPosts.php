<?php require_once "../../config.php";
      require_once "../../function.php";
      $currentPage = $_POST['currentPage'];
      $pageSize = $_POST['pageSize'];
      $status = $_POST['status'];
      $categoryId = $_POST['categoryId'];
      $where = "where 1=1";
      if ($status != "all") {
        $where .= " and p.status = '{$status}' "; 
      };
      if ($categoryId != "all") {
        $where .= " and c.id = '{$categoryId}' ";
      };
      $offset = ($currentPage - 1)*$pageSize;
      $connect = connect();
      $sql = "select p.title,p.created,p.status,c.`name`,u.nickname from posts p 
      LEFT JOIN categories c on c.id = p.category_id
      LEFT JOIN users u on u.id = p.user_id ".$where." ORDER BY p.created DESC 
      limit {$offset},{$pageSize}";
      $result = select($connect,$sql);
      $sql = "select count(*) as count from posts  p 
      LEFT JOIN categories c on c.id = p.category_id
      LEFT JOIN users u on u.id = p.user_id ".$where;
      $dataCount = select($connect,$sql);
      $totalPage = ceil($dataCount[0]['count'] / $pageSize);
      $response = ["code"=>0,"msg" =>"操作失败"];
      if ($result) {
        $response["code"] = 1;
        $response["msg"] = "操作成功";
        $response["data"] = $result;
        $response['totalPage'] = $totalPage;
      }
      header('content-type: application/json;charset=utf-8');
      echo json_encode($response);
?>