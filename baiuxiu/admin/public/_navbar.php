<nav class="navbar">
      <button class="btn btn-default navbar-btn fa fa-bars"></button>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="profile.php"><i class="fa fa-user"></i>个人中心</a></li>
        <li id = "logout"><a href="javascript:;"><i class="fa fa-sign-out"></i>退出</a></li>
      </ul>
    </nav>
    <script src="../../static/assets/vendors/jquery/jquery.min.js"></script>
    <script>
    $(function(){
    $('#logout').click(function(){
      $.ajax({
        type: "post",
        url: "./api/_userLogout.php",
        success: function (res) {
          location.href = 'login.php';
        }
      });
    })

    })
    
    
    </script>