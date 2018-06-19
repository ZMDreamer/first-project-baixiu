<?php
require_once '../function.php';
checkLogin();
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <title>Categories &laquo; Admin</title>
  <link rel="stylesheet" href="../static/assets/vendors/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="../static/assets/vendors/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="../static/assets/vendors/nprogress/nprogress.css">
  <link rel="stylesheet" href="../static/assets/css/admin.css">
  <script src="../static/assets/vendors/nprogress/nprogress.js"></script>
</head>
<body>
  <script>NProgress.start()</script>

  <div class="main">
    <?php include_once './public/_navbar.php'; ?>
    <div class="container-fluid">
      <div class="page-title">
        <h1>分类目录</h1>
      </div>
      <!-- 有错误信息时展示 -->
      <div class="alert alert-danger" style="display:none">
        <strong id = "errorMessage">发生XXX错误</strong>
      </div>
      <div class="row">
        <div class="col-md-4">
          <form id = "add-category">
            <h2>添加新分类目录</h2>
            <div class="form-group">
              <label for="name">名称</label>
              <input id="name" class="form-control" name="name" type="text" placeholder="分类名称">
            </div>
            <div class="form-group">
              <label for="slug">别名</label>
              <input id="slug" class="form-control" name="slug" type="text" placeholder="slug">
              <p class="help-block">https://zce.me/category/<strong>slug</strong></p>
            </div>
            <div class="form-group">
                  <label for="slug">类名</label>
                  <input id="classname" class="form-control" name="classname" type="text" placeholder="类名">
                  <p class="help-block">
              </p></div>
            <div class="form-group">
              <span class="btn btn-primary" id = "add-btn">添加</span>
              <span style = "display:none" class="btn btn-primary" id = "add-edit">编辑完成</span>
              <span style = "display:none" class="btn btn-primary" id = "add-cancel">取消编辑</span>
            </div>
          </form>
        </div>
        <div class="col-md-8">
          <div class="page-action">
            <!-- show when multiple checked -->
            <a class="btn btn-danger btn-sm" href="javascript:;" style="display: none" id = "deleteMore">批量删除</a>
          </div>
          <table class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th class="text-center" width="40"><input type="checkbox"></th>
                <th>名称</th>
                <th>Slug</th>
                <th>类名</th>
                <th class="text-center" width="100">操作</th>
              </tr>
            </thead>
            <tbody>
              <!-- <tr>
                <td class="text-center"><input type="checkbox"></td>
                <td>未分类</td>
                <td>uncategorized</td>
                <td class="text-center">
                  <a href="javascript:;" class="btn btn-info btn-xs">编辑</a>
                  <a href="javascript:;" class="btn btn-danger btn-xs">删除</a>
                </td>
              </tr>
              <tr>
                <td class="text-center"><input type="checkbox"></td>
                <td>未分类</td>
                <td>uncategorized</td>
                <td class="text-center">
                  <a href="javascript:;" class="btn btn-info btn-xs">编辑</a>
                  <a href="javascript:;" class="btn btn-danger btn-xs">删除</a>
                </td>
              </tr>
              <tr>
                <td class="text-center"><input type="checkbox"></td>
                <td>未分类</td>
                <td>uncategorized</td>
                <td class="text-center">
                  <a href="javascript:;" class="btn btn-info btn-xs">编辑</a>
                  <a href="javascript:;" class="btn btn-danger btn-xs">删除</a>
                </td>
              </tr>
              <tr>
                <td class="text-center"><input type="checkbox"></td>
                <td>未分类</td>
                <td>uncategorized</td>
                <td class="text-center">
                  <a href="javascript:;" class="btn btn-info btn-xs">编辑</a>
                  <a href="javascript:;" class="btn btn-danger btn-xs">删除</a>
                </td>
              </tr>
              <tr>
                <td class="text-center"><input type="checkbox"></td>
                <td>未分类</td>
                <td>uncategorized</td>
                <td class="text-center">
                  <a href="javascript:;" class="btn btn-info btn-xs">编辑</a>
                  <a href="javascript:;" class="btn btn-danger btn-xs">删除</a>
                </td>
              </tr> -->
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <!-- <div class="aside">
    <div class="profile">
      <img class="avatar" src="../static/uploads/avatar.jpg">
      <h3 class="name">布头儿</h3>
    </div>
    <ul class="nav">
      <li>
        <a href="index.php"><i class="fa fa-dashboard"></i>仪表盘</a>
      </li>
      <li class="active">
        <a href="#menu-posts" data-toggle="collapse">
          <i class="fa fa-thumb-tack"></i>文章<i class="fa fa-angle-right"></i>
        </a>
        <ul id="menu-posts" class="collapse in">
          <li><a href="posts.php">所有文章</a></li>
          <li><a href="post-add.php">写文章</a></li>
          <li class="active"><a href="categories.php">分类目录</a></li>
        </ul>
      </li>
      <li>
        <a href="comments.php"><i class="fa fa-comments"></i>评论</a>
      </li>
      <li>
        <a href="users.php"><i class="fa fa-users"></i>用户</a>
      </li>
      <li>
        <a href="#menu-settings" class="collapsed" data-toggle="collapse">
          <i class="fa fa-cogs"></i>设置<i class="fa fa-angle-right"></i>
        </a>
        <ul id="menu-settings" class="collapse">
          <li><a href="nav-menus.php">导航菜单</a></li>
          <li><a href="slides.php">图片轮播</a></li>
          <li><a href="settings.php">网站设置</a></li>
        </ul>
      </li>
    </ul>
  </div> -->
  <?php $currentPage = "categories"; ?>
  <?php include_once './public/_aside.php'; ?>
  <script src="../static/assets/vendors/jquery/jquery.js"></script>
  <script src="../static/assets/vendors/bootstrap/js/bootstrap.js"></script>
  <script>NProgress.done()</script>
  <script>
  $(function(){
    //渲染界面
      $.ajax({
        type: "get",
        url: "./api/_getCategories.php",
        dataType: "json",
        success: function (res) {
          var str = "";
          var data = res.data;
          $.each(data, function(index,value){
            str +=` <tr data-categoryId = ${value['id']} >
                    <td class="text-center"><input type="checkbox"></td>
                    <td>${value['name']}</td>
                    <td>${value['slug']}</td>
                    <td>${value['classname']}</td>
                    <td class="text-center">
                      <a href="javascript:;"  data-categoryId = ${value['id']} class="btn btn-info btn-xs" id = "edit">编辑</a>
                      <a href="javascript:;" class="btn btn-danger btn-xs" id = "delete">删除</a>
                    </td>
                  </tr>`
          })
          // $(str).appendTo($('tbody'));
          // $(str).appendTo($('tbody'))
        $('tbody').append(str);
        }
      });    
    //给category添加数据
      $('#add-btn').on('click',function(){
        var add_name = $('#name').val();
        var add_slug = $('#slug').val();
        var add_classname = $('#classname').val();
        if (add_name == "") {
          $('#errorMessage').text("请输入名称")
          $('.alert').show();
          return;
        }else{
          $('.alert').hide();
        }
        if (add_slug == "") {
          $('#errorMessage').text("请输入别名")
          $('.alert').show();
          return;
        }else{
          $('.alert').hide();
        }
        if (add_classname == "") {
          $('#errorMessage').text("请输入类名")
          $('.alert').show();
          return;
        }else{
          $('.alert').hide();
        }
        $.ajax({
          type: "post",
          url: "./api/_addCategories.php",
          data: $('#add-category').serialize(),
          dataType: "json",
          success: function (res) {
            if (res.data) {
              $('#errorMessage').text("该用户已存在,请重新输入")
              $('.alert').show();
              return;
            } else {
              $('.alert').hide();
            }
            if (res.code == 1) {
                location.reload(false);
              }
          }
        });
      })

  //编辑功能
      $('tbody').on('click','#edit',function(){
        var categoryId = $(this).attr('data-categoryid');
        $('#add-edit').attr("data-categoryId",categoryId);
        var name = $(this).parents('tr').children().eq(1).text();
        var slug = $(this).parents('tr').children().eq(2).text();
        var classname = $(this).parents('tr').children().eq(3).text();
        $('#name').val(name);
        $('#slug').val(slug);
        $('#classname').val(classname);
        $('#add-edit').show();
        $('#add-cancel').show();
        $('#add-btn').hide();
      });
      //编辑完成
      $('#add-edit').on('click',function(){
        var categoryId = $(this).attr('data-categoryId');
        var add_name = $('#name').val();
        var add_slug = $('#slug').val();
        var add_classname = $('#classname').val();
        if (add_name == "") {
          $('#errorMessage').text("请输入名称")
          $('.alert').show();
          return;
        }else{
          $('.alert').hide();
        }
        if (add_slug == "") {
          $('#errorMessage').text("请输入别名")
          $('.alert').show();
          return;
        }else{
          $('.alert').hide();
        }
        if (add_classname == "") {
          $('#errorMessage').text("请输入类名")
          $('.alert').show();
          return;
        }else{
          $('.alert').hide();
        }
        $.ajax({
          type: "post",
          url: "./api/_editCategories.php",
          data: {name:add_name,slug:add_slug,classname:add_classname,categoryId:categoryId},
          dataType: "json",
          success: function (res) {
            if (res.code == 1) {
              location.reload();
            }
          }
        });
      })
      //取消编辑
      $('#add-cancel').on('click',function(){
        $('#name').val();
        $('#slug').val();
        $('#classname').val();

      })





//删除数据
      $('tbody').on('click','#delete',function(){
        var row = $(this).parents('tr');
        var categoryId = row.attr('data-categoryId');
        $.ajax({
          type: "get",
          url: "./api/_deleteCategory.php",
          data: {categoryId:categoryId},
          dataType: "json",
          success: function (res) {
            if (res.code == 1) {
              row.remove();
            }
          }
        });
      });

//批量删除
      $('thead input').on('change',function(){
        var status = $(this).prop('checked');
        $('tbody input').prop('checked',status);
        if (status) {
          $('#deleteMore').show();
        }else{
          $('#deleteMore').hide();
        }
      });
      

      $('tbody').on('change','input',function(){
        var cks = $('tbody input');
        $('thead input').prop('checked',cks.size()==$('tbody input:checked').size());
        if ($('tbody input:checked').size() >=2) {
          $('#deleteMore').show();
        }else{
          $('#deleteMore').hide();
        }
      });
      $('#deleteMore').on('click',function(){
        var ids = [];
        $('tbody input:checked').each(function(index,ele){
          ids.push($(ele).parents('tr').attr('data-categoryId'));
        })
        $.ajax({
          type: "post",
          url: "./api/_deleteCategories.php",
          data: {id:ids},
          dataType: "json",
          success: function (res) {
            if (res.code==1) {
              $('tbody input:checked').parents('tr').remove();
              $('#deleteMore').hide();
            }
          }
        });
      })

//删除完成
  







  
  
  
  
  
  
  
 
 
 
 
 
 
 
 


















 
 
  })
  
  
  
  
  
  
  
  </script>
</body>
</html>
