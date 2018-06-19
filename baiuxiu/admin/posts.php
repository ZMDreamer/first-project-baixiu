<?php
require_once '../function.php';
checkLogin();
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <title>Posts &laquo; Admin</title>
  <link rel="stylesheet" href="../static/assets/vendors/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="../static/assets/vendors/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="../static/assets/vendors/nprogress/nprogress.css">
  <link rel="stylesheet" href="../static/assets/css/admin.css">
  <script src="../static/assets/vendors/nprogress/nprogress.js"></script>
</head>
<body>
  <script>NProgress.start()</script>

  <div class="main">
    <!-- <nav class="navbar">
      <button class="btn btn-default navbar-btn fa fa-bars"></button>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="profile.php"><i class="fa fa-user"></i>个人中心</a></li>
        <li><a href="login.php"><i class="fa fa-sign-out"></i>退出</a></li>
      </ul>
    </nav> -->
    <?php include_once './public/_navbar.php'; ?>
    <div class="container-fluid">
      <div class="page-title">
        <h1>所有文章</h1>
        <a href="post-add.php" class="btn btn-primary btn-xs">写文章</a>
      </div>
      <!-- 有错误信息时展示 -->
      <!-- <div class="alert alert-danger">
        <strong>错误！</strong>发生XXX错误
      </div> -->
      <div class="page-action">
        <!-- show when multiple checked -->
        <a class="btn btn-danger btn-sm" href="javascript:;" style="display: none">批量删除</a>
        <form class="form-inline">
          <select name="" class="form-control input-sm" id = "categories">
            <option value="all">所有分类</option>
          </select>
          <select name="" class="form-control input-sm" id = "select">
            <option value="all">所有状态</option>
            <option value="drafted">草稿</option>
            <option value="published">已发布</option>
          </select>
          <input class="btn btn-default btn-sm" id = "btn-filter" value = "筛选" type = "button">
        </form>
        <ul class="pagination pagination-sm pull-right">
          <!-- <li><a href="#">上一页</a></li>
          <li><a href="#">1</a></li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">下一页</a></li> -->
        </ul>
      </div>
      <table class="table table-striped table-bordered table-hover">
        <thead>
          <tr>
            <th class="text-center" width="40"><input type="checkbox"></th>
            <th>标题</th>
            <th>作者</th>
            <th>分类</th>
            <th class="text-center">发表时间</th>
            <th class="text-center">状态</th>
            <th class="text-center" width="100">操作</th>
          </tr>
        </thead>
        <tbody>
          <!-- <tr>
            <td class="text-center"><input type="checkbox"></td>
            <td>随便一个名称</td>
            <td>小小</td>
            <td>潮科技</td>
            <td class="text-center">2016/10/07</td>
            <td class="text-center">已发布</td>
            <td class="text-center">
              <a href="javascript:;" class="btn btn-default btn-xs">编辑</a>
              <a href="javascript:;" class="btn btn-danger btn-xs">删除</a>
            </td>
          </tr>
          <tr>
            <td class="text-center"><input type="checkbox"></td>
            <td>随便一个名称</td>
            <td>小小</td>
            <td>潮科技</td>
            <td class="text-center">2016/10/07</td>
            <td class="text-center">已发布</td>
            <td class="text-center">
              <a href="javascript:;" class="btn btn-default btn-xs">编辑</a>
              <a href="javascript:;" class="btn btn-danger btn-xs">删除</a>
            </td>
          </tr>
          <tr>
            <td class="text-center"><input type="checkbox"></td>
            <td>随便一个名称</td>
            <td>小小</td>
            <td>潮科技</td>
            <td class="text-center">2016/10/07</td>
            <td class="text-center">已发布</td>
            <td class="text-center">
              <a href="javascript:;" class="btn btn-default btn-xs">编辑</a>
              <a href="javascript:;" class="btn btn-danger btn-xs">删除</a>
            </td>
          </tr> -->
        </tbody>
      </table>
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
          <li class="active"><a href="posts.php">所有文章</a></li>
          <li><a href="post-add.php">写文章</a></li>
          <li><a href="categories.php">分类目录</a></li>
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
  <?php $currentPage = "posts"; ?>
  <?php include_once './public/_aside.php'; ?>
  <script src="../static/assets/vendors/jquery/jquery.js"></script>
  <script src="../static/assets/vendors/bootstrap/js/bootstrap.js"></script>
  <script>NProgress.done()</script>
  <script>
  //渲染界面
  $(function(){
    var statusArr = {
      "drafted": "草稿",
      "published": "已发布",
    };
    var currentPage = 1;
    var maxPageCount = 10;
    var pageSize = 10;
    $.ajax({
      type: "post",
      url: "./api/_renderPosts.php",
      data: {currentPage:currentPage,pageSize:pageSize,status:$('#select').val(),categoryId: $('#categories').val()},
      dataType: "json",
      success: function (res) {
        maxPageCount = res.totalPage;
        if (res.code == 1) {
          var data = res.data;
          createPiganition();
          renderContent(data);
        }
      }
    });

    //分页小图标生成
    
    function createPiganition(){
      var start = currentPage -2;
        if (start < 1) {
          start = 1
        }
        var html = "";
        var end = currentPage+ 4;
        if (end > maxPageCount) {
          end = maxPageCount;
        };
        if (currentPage != 1) {
          html+= `<li class = "item" data-page = "${currentPage -1}"><a href="javascript:;">上一页</a></li>`;
        };
        for(var i = start; i <= end; i++){
          if (i == currentPage) {
            html+=`<li class = "item active" data-page = "${1}"><a href="javascript:;">${i}</a></li>`;
          }else{
            html+=`<li class = "item"  data-page = "${i}"><a href="javascript:;">${i}</a></li>`;
          }
        }
        if (currentPage != maxPageCount) {
          html +=`<li class = "item"  data-page = "${currentPage+1}"><a href="javascript:;">下一页</a></li>`;
        }
        $('.pagination').html(html);
    }
    //封装动态生成表格内容代码
    function renderContent(data){
      $.each(data,function(index,value){
                var str = `<tr>
                              <td class="text-center"><input type="checkbox"></td>
                              <td>${value.title}</td>
                              <td>${value.nickname}</td>
                              <td>${value.name}</td>
                              <td class="text-center">${value.created}</td>
                              <td class="text-center">${statusArr[value.status]}</td>
                              <td class="text-center">
                                <a href="javascript:;" class="btn btn-default btn-xs">编辑</a>
                                <a href="javascript:;" class="btn btn-danger btn-xs">删除</a>
                              </td>
                          </tr>`;
              $(str).appendTo($('tbody'));
              })
    }
    $('.pagination').on('click','.item',function(){
      currentPage = parseInt($(this).attr('data-page'));
      $.ajax({
            type: "post",
            url: "./api/_renderPosts.php",
            data: {currentPage:currentPage,pageSize:pageSize,status:$('#select').val(),categoryId: $('#categories').val()},
            dataType: "json",
            success: function (res) {
              if (res.code == 1) {
                maxPageCount = res.totalPage;
              var data = res.data;
              $('tbody').empty();
            renderContent(data);
            createPiganition()

            }
          }
        });


    })

    //动态生成分类导航栏
    $.ajax({
      type: "post",
      url: "./api/_getCategories.php",
      dataType: "json",
      success: function (res) {
        if (res.code == 1) {
          var str = "";
          $.each(res.data,function(index,value){
            str +=`<option value="${value.id}">${value.name}</option>`
          })
          $(str).appendTo($('#categories'));
        }
      }
    });
    //动态生成分类数据完成

    /*
    点击完成筛选功能
     */
     $('#btn-filter').on('click',function(){
       currentPage = 1;
       $.ajax({
         type: "post",
         url: "./api/_renderPosts.php",
         data: {currentPage:currentPage,pageSize:pageSize,status:$('#select').val(),categoryId: $('#categories').val()},
         dataType: "json",
         success: function (res) {
           if (res.code == 1) {
            maxPageCount = res.totalPage;
             var data = res.data;
             $('tbody').empty();
             createPiganition()
             renderContent(data);

           }
         }
       });
     })
     //点击筛选功能完成


  })
  
  
  
  
  </script>
</body>
</html>
