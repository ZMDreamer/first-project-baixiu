<?php
if (!empty($_GET)) {
    $categroy = $_GET['categoryId'];
    $sql = "select p.title,p.created,p.content,p.likes,p.views,p.feature,c.`name`,u.nickname, p.id,
(select count(id) from comments where comments.post_id = p.id) as countComment
from posts p
LEFT JOIN categories c on c.id = p.category_id
LEFT JOIN users u on u.id = p.user_id
where p.category_id = {$categroy}
order by  p.created desc
limit 5";
} else {
    $sql = "select p.title,p.created,p.content,p.likes,p.views,p.feature,c.`name`,u.nickname, p.id,
(select count(id) from comments where comments.post_id = p.id) as countComment
from posts p
LEFT JOIN categories c on c.id = p.category_id
LEFT JOIN users u on u.id = p.user_id
order by  p.created desc
limit 5";
}

$postArr = select($sql);
?>
    <div class="panel new">
                <h3><?php echo $postArr[0]['name']; ?></h3>
                <?php foreach ($postArr as $value): ?>
                <div class="entry">
                    <div class="head">
                        <span class="sort"><?php echo $value['name']; ?></span>
                        <a href="../detail.php?categoryId=<?php echo $value['id']; ?>"><?php echo $value['title']; ?></a>
                    </div>
                    <div class="main">
                        <p class="info"><?php echo $value['nickname']; ?> 发表于 <?php echo $value['created']; ?></p>
                        <p class="brief"><?php echo $value['content']; ?></p>
                        <p class="extra">
                        <span class="reading">阅读(<?php echo $value['views']; ?>)</span>
                        <span class="comment">评论(<?php echo $value['countComment']; ?>)</span>
                        <a href="javascript:;" class="like">
                            <i class="fa fa-thumbs-up"></i>
                            <span>赞(<?php echo $value['likes']; ?>)</span>
                        </a>
                        <a href="javascript:;" class="tags">
                            分类：<span><?php echo $value['name']; ?></span>
                        </a>
                        </p>
                        <a href="javascript:;" class="thumb">
                        <img src="<?php echo $value['feature']; ?>" alt="">
                        </a>
                    </div>
                </div>
                <?php endforeach?>
                 <div class= "loadmore">
                 <span class="btn">加载更多</span>
                 <span class = "circle"></span>
                 </div>

    </div>
    <script src="../static/assets//vendors/jquery/jquery.min.js"></script>
    <script>
    $(function(){
        var currentPage = 1;
  $('.loadmore .btn').click(function() {
      currentPage++;
      var categoryId = location.search.split('=')[1]||2;
        $.ajax({
            type: "post",
            url: "../API/_getmore.php",
            beforeSend: function() {
                $('.circle').show();
                $('.loadmore .btn').hide();
            },
            data: {currentPage:currentPage,categoryId:categoryId,pageSize:30},
            dataType: "json",
            success: function (response) {
                    if (response.code == 1) {
                            $.each(response.data,function(index,value){
                                str = ` <div class="entry">
                                            <div class="head">
                                                <span class="sort">${value['name']}</span>
                                                <a href="../detail.php?categoryId=${value['id']}">${value['title']}</a>
                                            </div>
                                            <div class="main">
                                                <p class="info">${value['nickname']} 发表于 ${value['created']}</p>
                                                <p class="brief">${value['content']} </p>
                                                <p class="extra">
                                                <span class="reading">阅读(${value['views']} )</span>
                                                <span class="comment">评论(${value['countComment']})</span>
                                                <a href="javascript:;" class="like">
                                                    <i class="fa fa-thumbs-up"></i>
                                                    <span>赞(${value['likes']})</span>
                                                </a>
                                                <a href="javascript:;" class="tags">
                                                    分类：<span>${value['name']}</span>
                                                </a>
                                                </p>
                                                <a href="javascript:;" class="thumb">
                                                <img src="${value['feature']}" alt="">
                                                </a>
                                            </div>
                                        </div>`;
                            $('.loadmore').before(str);
                            var maxPage =Math.ceil(response.postCount[0].postCount /30);
                            if (currentPage == maxPage) {
                                $('.loadmore .btn').hide();
                            }
                            setTimeout(() => {
                                $('.circle').hide();
                            if (currentPage == maxPage) {
                                $('.loadmore .btn').hide();
                            }else{
                                $('.loadmore .btn').show();

                            }
                            }, 1000);
                    })
                }
            }
        });
    })





    })





    </script>


