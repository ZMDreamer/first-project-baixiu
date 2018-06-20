require.config({
    paths:{
        "jquery": "/static/assets/vendors/jquery/jquery",
        "template": "/static/assets/vendors/art-template/template-web",
        "pagination": "/static/assets/vendors/twbs-pagination/jquery.twbsPagination",
        "bootstrap": "/static/assets/vendors/bootstrap/js/bootstrap"

    },
    shim: {
        "template": {
            deps:['jquery']
        },
        "pagination":{
            deps:['jquery']
        } 
    }
});
require(["jquery","template","pagination","bootstrap"],function($,template,pagination,bootstrap){
            $(function(){
                var currentPage = 1;
                var pageSize = 10;
                var pageCount;
                renderPages();
                function renderPages(){
                 $.ajax({
                    type: "post",
                    url: "./api/_getComments.php",
                    data: {currentPage:currentPage,pageSize:pageSize},
                    dataType: "json",
                    success: function (res) {
                        if (res.code == 1) {
                            var html = template('template',res);
                            $('tbody').html(html);
                            $('.pagination').twbsPagination({
                                totalPages: res.totalPage,
                                visiblePages: 7,
                                onPageClick: function (event, page) {
                                    currentPage = page;
                                    renderPages();
                                }
                              });
                        }
                }
        
            })}
               
        })
  

});