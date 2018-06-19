<?php
require_once "./config.php";
require_once "./function.php";
$categoryId = $_GET['categoryId'];
$connect = connect();

// $connect = mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_NAME);
$sql = "SELECT
	p.title,
	p.created,
	p.content,
	p.views,
	p.likes,
	p.feature,
  p.id,
	c. NAME,
	u.nickname,
(SELECT count(id) FROM comments WHERE post_id = p.id) AS countComment
FROM posts p
LEFT JOIN categories c ON c.id = p.category_id
LEFT JOIN users u ON u.id = p.user_id
WHERE
	p.category_id = {$categoryId}
ORDER BY
	created DESC
LIMIT 20";
$postArr = select($connect, $sql);
// $result = mysqli_query($connect,$sql);
// $postArr = [];
// while($row = mysqli_fetch_assoc($result)) {
//   $postArr[] = $row;
// }
// print_r($postArr);
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>阿里百秀-发现生活，发现美!</title>
  <link rel="stylesheet" href="static/assets/css/style.css">
  <link rel="stylesheet" href="static/assets/vendors/font-awesome/css/font-awesome.css">
</head>
<body>
    <?php include_once "./public/_header.php";?>
    <?php include_once "./public/_aside.php";?>
    <div class="content">
      <div class="panel new">
        <h3><?php echo $postArr[0]['NAME']; ?></h3>
        <?php foreach ($postArr as $key => $value): ?>

          <div class="entry">
          <div class="head">
            <span class="sort"><?php echo $value['NAME']; ?></span>
            <a href="./detail.php?categoryId=<?php echo $value['id']; ?>"><?php echo $value['title']; ?></a>
          </div>
          <div class="main">
            <p class="info"><?php echo $value['nickname']; ?> 发表于 <?php echo $value['created']; ?> </p>
            <p class="brief"><?php echo $value['content']; ?></p>
            <p class="extra">
              <span class="reading">阅读(<?php echo $value['views']; ?>)</span>
              <span class="comment">评论(<?php echo $value['countComment']; ?>)</span>
              <a href="javascript:;" class="like">
                <i class="fa fa-thumbs-up"></i>
                <span>赞(<?php echo $value['likes']; ?>)</span>
              </a>
              <a href="javascript:;" class="tags">
                分类：<span><?php echo $value['NAME']; ?></span>
              </a>
            </p>
            <a href="javascript:;" class="thumb">
              <img src="<?php echo $value['feature']; ?>" alt="">
            </a>
          </div>
        <?php endforeach?>
        <div class ="loadmore">
          <span class ="btn">加载更多</span>
         <div id="circle"></div>

         </div>
        <!-- <div class="entry">
          <div class="head">
            <a href="javascript:;">星球大战：原力觉醒视频演示 电影票68</a>
          </div>
          <div class="main">
            <p class="info">admin 发表于 2015-06-29</p>
            <p class="brief">星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯</p>
            <p class="extra">
              <span class="reading">阅读(3406)</span>
              <span class="comment">评论(0)</span>
              <a href="javascript:;" class="like">
                <i class="fa fa-thumbs-up"></i>
                <span>赞(167)</span>
              </a>
              <a href="javascript:;" class="tags">
                分类：<span>星球大战</span>
              </a>
            </p>
            <a href="javascript:;" class="thumb">
              <img src="static/uploads/hots_2.jpg" alt="">
            </a>
          </div>
        </div>

        <div class="entry">
          <div class="head">
            <a href="javascript:;">星球大战：原力觉醒视频演示 电影票68</a>
          </div>
          <div class="main">
            <p class="info">admin 发表于 2015-06-29</p>
            <p class="brief">星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯</p>
            <p class="extra">
              <span class="reading">阅读(3406)</span>
              <span class="comment">评论(0)</span>
              <a href="javascript:;" class="like">
                <i class="fa fa-thumbs-up"></i>
                <span>赞(167)</span>
              </a>
              <a href="javascript:;" class="tags">
                分类：<span>星球大战</span>
              </a>
            </p>
            <a href="javascript:;" class="thumb">
              <img src="static/uploads/hots_2.jpg" alt="">
            </a>
          </div>
        </div>
        <div class="entry">
          <div class="head">
            <a href="javascript:;">星球大战：原力觉醒视频演示 电影票68</a>
          </div>
          <div class="main">
            <p class="info">admin 发表于 2015-06-29</p>
            <p class="brief">星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯</p>
            <p class="extra">
              <span class="reading">阅读(3406)</span>
              <span class="comment">评论(0)</span>
              <a href="javascript:;" class="like">
                <i class="fa fa-thumbs-up"></i>
                <span>赞(167)</span>
              </a>
              <a href="javascript:;" class="tags">
                分类：<span>星球大战</span>
              </a>
            </p>
            <a href="javascript:;" class="thumb">
              <img src="static/uploads/hots_2.jpg" alt="">
            </a>
          </div>
        </div> -->
      </div>
    </div>
    <div class="footer">
      <p>© 2016 XIU主题演示 本站主题由 themebetter 提供</p>
    </div>
  </div>

</body>
</html>
<script src="./static/assets/vendors/jquery/jquery.min.js"></script>
<script>
$(function(){
  var countPage = 1;
 
$('.loadmore .btn').on('click',function(){
  if (countPage==2) {
          $('.loadmore .btn').hide();
          $('#circle').hide();
        }
  countPage++;
  // var categoryId = new URLSearchParams(location.search).get('categoryId');
  var categoryId = location.search.split("=")[1];
  $.ajax({
    type: "post",
    url: "./API/loadmore.php",
    beforeSend: function() {
      //$('.loadmore .btn').text('加载中');
       $('#circle').show();
      $('.loadmore .btn').hide();

    },
    data: {categoryId:categoryId,pageSize:50,currentPage: countPage},
    success: function (res) {
       if (res.code == 1) {
         var data = res.data;
            $.each(data,function(index,value){
               str = `<div class="entry">
          <div class="head">
            <a href="./detail.php?categoryId=${value['id']}">${value['title']}</a>
          </div>
          <div class="main">
            <p class="info">${value['nickname']} 发表于${value['created']}</p>
            <p class="brief">${value['content']}</p>
            <p class="extra">
              <span class="reading">阅读(${value['views']})</span>
              <span class="comment">评论(${value['countComment']})</span>
              <a href="javascript:;" class="like">
                <i class="fa fa-thumbs-up"></i>
                <span>赞(${value['likes']})</span>
              </a>
              <a href="javascript:;" class="tags">
                分类：<span>${value['NAME']}</span>
              </a>
            </p>
            <a href="javascript:;" class="thumb">
              <img src="${value['feature']}" alt="">
            </a>
          </div>
        </div>`
        $('.loadmore').before(str);

       })
     }

    var totalPage = (res.pageCount[0]).postCount;
        var maxPage = Math.ceil(totalPage/50);
        
        if (countPage == maxPage) {
          $('.loadmore .btn').hide();
          $('#circle').hide();
        }else {
        setTimeout(() => {
          $('#circle').hide();
          $('.loadmore .btn').show();
            }, 1000);
        }
    }

  });





})









})







</script>