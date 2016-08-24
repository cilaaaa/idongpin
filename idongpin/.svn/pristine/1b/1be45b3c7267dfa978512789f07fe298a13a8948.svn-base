$(document).ready(function(){

//为左右两边模块设置高度
    var windowHeight = $(window).height();
    var loginInfoHeight = $(".loginInfo").height();
    var searchToolHeight = $(".searchTool").height();
    var infoTagsH=$(".infoTags").height();
    var minHeight = windowHeight - loginInfoHeight -searchToolHeight-infoTagsH ;
    $(".infoDetails").css("minHeight",minHeight-3);

    //左侧导航字体样式改变
    $(".leftSide .vipCenter .vipMenu  ").children("li").eq(1).find("a").css("color","rgb(255, 108, 0)");

    //新增事件
    $(".adda").click(function () {
        $(".infoMain .displayBlock").css("display","none");
        $(".infoMain .displayNone").css("display","block");
    });
  
    //单个地址删除事件
    $(".orderTab tr td ").on('click ','.delete',function(){
       $(this).parent().parent().parent().remove();
    });
    
    //单个地址编辑事件
    $(".orderTab tr  ").on('click ','.edit',function(){
       var name= $(this).parent().parent().parent().children("td").eq(1).find(".displayT").children("span").text();
        var address= $(this).parent().parent().parent().children("td").eq(2).find(".displayT").children("span").text();
        var count= $(this).parent().parent().parent().children("td").eq(3).find(".displayT").children("span").text();
        var status= $(this).parent().parent().parent().children("td").eq(4).find(".displayT").children("input").attr("checked");
        $(this).parent().parent().parent().find(".displayT").css("display","none");
        $(this).parent().parent().parent().find(".displayF").css("display","block");
        $(this).parent().parent().parent().children("td").eq(1).find(".displayF").children("input").attr("placeholder",name);
        $(this).parent().parent().parent().children("td").eq(2).find(".displayF").children("input").attr("placeholder",address);
        $(this).parent().parent().parent().children("td").eq(3).find(".displayF").children("input").attr("placeholder",count);
        if(status)
            $(this).parent().parent().parent().children("td").eq(4).find(".displayF").children("img").attr("src","http://www.idongpin.com.cn/images/userCenter/btn_2_2.png");
        else
            $(this).parent().parent().parent().children("td").eq(4).find(".displayF").children("img").attr("src","http://www.idongpin.com.cn/images/userCenter/btn_2_1.png");

    });
    $(".orderTab tr  ").on('click ','.displayFCancel',function(){
        $(this).parent().parent().parent().find(".displayF").css("display","none");
        $(this).parent().parent().parent().find(".displayT").css("display","block");
    });
    //选中某个收货地址信息
    $(".orderTab tr  ").on('click ','.aCheckbox img',function(){
        if($(this).attr("src")=="http://www.idongpin.com.cn/images/userCenter/btn_2_1.png")
            $(this).attr("src","http://www.idongpin.com.cn/images/userCenter/btn_2_2.png");
        else
            $(this).attr("src","http://www.idongpin.com.cn/images/userCenter/btn_2_1.png");
    });
    //默认地址勾选
    $(".orderTab tr  ").on('click ','.aStatus img',function(){
        if($(this).attr("src")=="http://www.idongpin.com.cn/images/userCenter/btn_2_1.png")
            $(this).attr("src","http://www.idongpin.com.cn/images/userCenter/btn_2_2.png");
        else
            $(this).attr("src","http://www.idongpin.com.cn/images/userCenter/btn_2_1.png");
    });

    //新增默认地址勾选
    $(".displayNone ").on('click ','.defaultImg',function(){
        if($(this).attr("src")=="http://www.idongpin.com.cn/images/userCenter/btn_2_1.png")
            $(this).attr("src","http://www.idongpin.com.cn/images/userCenter/btn_2_2.png");
        else
            $(this).attr("src","http://www.idongpin.com.cn/images/userCenter/btn_2_1.png");
    });
});
