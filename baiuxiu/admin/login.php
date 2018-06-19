<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <title>Sign in &laquo; Admin</title>
  <link rel="stylesheet" href="../static/assets/vendors/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="../static/assets/css/admin.css">
</head>
<body>
  <div class="login">
    <form class="login-wrap">
      <img class="avatar" src="../static/assets/img/default.png">
      <!-- 有错误信息时展示 -->
       <div class="alert alert-danger" style = "display: none">
        <strong class="message">用户名或密码错误！</strong>
      </div>
      <div class="form-group">
        <label for="email" class="sr-only">邮箱</label>
        <input id="email" type="email" class="form-control" placeholder="邮箱" name="email" autofocus >
      </div>
      <div class="form-group">
        <label for="password" class="sr-only">密码</label>
        <input id="password" type="password" class="form-control" name = "password" placeholder="密码">
      </div>
      <span class="btn btn-primary btn-block" >登 录</span>
    </form>
  </div>
  <script src="../static/assets/vendors/jquery/jquery.min.js"></script>
  <script>
  $('.btn-primary').on('click',function(){
    var email = $('#email').val();
    var password = $('#password').val();
    var reg = /^\w+@\w+\.\w+$/;
    if (!reg.test(email)) {
      $('.message').text('用户名格式错误！');
      $('.alert').show();
      return;
    }else {
      $('.alert').hide();
    }
    $.ajax({
      type: "post",
      url: "./api/_userLogin.php",
      data: $('.login-wrap').serialize(),
      dataType: "json",
      success: function (response) {
        if (response.code == 1) {
        location.href = 'index.php';
        }else{
      $('.message').text('用户名或密码错误');
      $('.alert').show();

        }
      }
    });



  })
  </script>
</body>
</html>
