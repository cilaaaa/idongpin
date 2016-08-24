/**
 * 
 * @param  {[type]} ){} [description]
 * @return {[type]}       [description]
 */
$(document).ready(function(){
	$('.searchBtn').click(function () {
        $('#searchForm').attr('action','/company/supply');
        $('#option').attr('name','companyid');
        $('#option').val(getUrlParam('companyid'));
        $("#searchForm").submit();
    });
    $('.searchBtnQ').click(function () {
        $('#searchForm').attr('action','/search');
        $('#option').attr('name','searchType');
        $('#option').val('product');
        $("#searchForm").submit();
    });

    function getUrlParam(name)
    {
        var reg = new RegExp("(^|&)"+ name +"=([^&]*)(&|$)"); //构造一个含有目标参数的正则表达式对象
        var r = window.location.search.substr(1).match(reg);  //匹配目标参数
        if (r!=null) return unescape(r[2]); return null; //返回参数值
    }
});
