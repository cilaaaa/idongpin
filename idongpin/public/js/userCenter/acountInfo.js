$(document).ready(function(){

    //为左右两边模块设置高度
    var windowHeight = $(window).height();
    var loginInfoHeight = $(".loginInfo").height();
    var searchToolHeight = $(".searchTool").height();
    var infoTagsH=$(".infoTags").height();
    var minHeight = windowHeight - loginInfoHeight -searchToolHeight-infoTagsH ;
    $(".infoDetails").css("minHeight",minHeight-3);

    //左侧导航字体样式改变
    $(".leftSide .vipCenter .vipMenu  ").children("li").eq(0).find("a").css("color","rgb(255, 108, 0)");
 
    //基本信息与企业信息切换
    $("#basInfo").click(function () {
        $("#comInfo").removeClass("redSpan");
        if(!$(this).hasClass("redSpan"))
            $(this).addClass("redSpan");
        $(".details").css("display","block");
        $(".detailsC").css("display","none");
    });
    $("#comInfo").click(function () {
        $("#basInfo").removeClass("redSpan");
        if(!$(this).hasClass("redSpan"))
            $(this).addClass("redSpan");
        $(".detailsC").css("display","block");
        $(".details").css("display","none");
    });

    //基本信息修改
    $(".details .operaChange").click(function () {
        $(".details .detailsItem .displayT").css("display","none");
        $(".details .detailsItem .displayF").css("display","block");
        var sex=$(".details ").children(".detailsItem").eq(1).children(".displayT").children(".detailsItemText").text();
        var phone=$(".details ").children(".detailsItem").eq(2).children(".displayT").children(".detailsItemText").text();
        var type=$(".details ").children(".detailsItem").eq(3).children(".displayT").children(".detailsItemText").text();
        var address=$(".details ").children(".detailsItem").eq(4).children(".displayT").children(".detailsItemText").text();
        $(".details ").children(".detailsItem").eq(1).children(".displayF").children().children(".typeSelect").children(".typeHeader").children("div").text(sex);
        $(".details ").children(".detailsItem").eq(2).children(".displayF").children("input").attr("placeholder",phone);
        $(".details ").children(".detailsItem").eq(3).children(".displayF").children().children(".typeSelect").children(".typeHeader").children("div").text(type);
        $(".details ").children(".detailsItem").eq(4).children(".displayF").children("input").attr("placeholder",address);

    });
    $(".details .operaConfirm").click(function () {
        $(".details .detailsItem .displayF").css("display","none");
        $(".details .detailsItem .displayT").css("display","block");
    });
    // 性别选择
    $(".details .sexSelect .typeHeader").click(function () {
        $(".details .sexSelect .personalType").toggle();
        $(".details .sexSelect .typeHeader").find("img").toggleClass("tt");
    });
    $(".details .sexSelect .personalType li").each(function () {
        $(this).click(function () {
            $(".details .sexSelect .typeHeader >div").text($(this).text());
            $(".details .sexSelect .personalType").toggle();
            $(".details .sexSelect .typeHeader").find("img").toggleClass("tt");
        });
    });
    // 公司类型选择
    $(".details .companyTypeSelect .typeHeader").click(function () {
        $(".details .companyTypeSelect .personalType").toggle();
        $(".details .companyTypeSelect .typeHeader").find("img").toggleClass("tt");
    });
    $(".details .companyTypeSelect .personalType li").each(function () {
        $(this).click(function () {
            $(".details .companyTypeSelect .typeHeader >div").text($(this).text());
            $(".details .companyTypeSelect .personalType").toggle();
            $(".details .companyTypeSelect .typeHeader").find("img").toggleClass("tt");
        });
    });
    //企业信息修改
    $(".detailsC .operaChange").click(function () {
        $(".detailsC .detailsItem .displayT").css("display","none");
        $(".detailsC .detailsItem .displayF").css("display","block");
        var type=$(".detailsC ").children(".detailsItem").eq(1).children(".displayT").children(".detailsItemText").text();
        var name=$(".detailsC ").children(".detailsItem").eq(2).children(".displayT").children(".detailsItemText").text();
        var address=$(".detailsC ").children(".detailsItem").eq(3).children(".displayT").children(".detailsItemText").text();
        var hangye=$(".detailsC ").children(".detailsItem").eq(4).children(".displayT").children(".detailsItemText").text();
        var product=$(".detailsC ").children(".detailsItem").eq(5).children(".displayT").children(".detailsItemText").text();
        var site=$(".detailsC ").children(".detailsItem").eq(6).children(".displayT").children(".detailsItemText").text();
        $(".detailsC ").children(".detailsItem").eq(1).children(".displayF").children().children(".typeSelect").children(".typeHeader").children("div").text(type);
        $(".detailsC ").children(".detailsItem").eq(2).children(".displayF").children("input").attr("placeholder",name);
        $(".detailsC ").children(".detailsItem").eq(3).children(".displayF").children("input").attr("placeholder",address);
        $(".detailsC ").children(".detailsItem").eq(4).children(".displayF").children().children(".typeSelect").children(".typeHeader").children("div").text(hangye);
        $(".detailsC ").children(".detailsItem").eq(5).children(".displayF").children().children(".typeSelect").children(".typeHeader").children("div").text(product);
        $(".detailsC ").children(".detailsItem").eq(6).children(".displayF").children("input").attr("placeholder",site);
    });
    $(".detailsC .operaConfirm").click(function () {
        $(".detailsC .detailsItem .displayF").css("display","none");
        $(".detailsC .detailsItem .displayT").css("display","block");
    });
    // 公司类型选择
    $(".detailsC .companyTypeSelect .typeHeader").click(function () {
        $(".detailsC .companyTypeSelect .personalType").toggle();
        $(".detailsC .companyTypeSelect .typeHeader").find("img").toggleClass("tt");
    });
    $(".detailsC .companyTypeSelect .personalType li").each(function () {
        $(this).click(function () {
            $(".detailsC .companyTypeSelect .typeHeader >div").text($(this).text());
            $(".detailsC .companyTypeSelect .personalType").toggle();
            $(".detailsC .companyTypeSelect .typeHeader").find("img").toggleClass("tt");
        });
    });
    //主营行业选择
    $(".detailsC .industrySelect .typeHeader").click(function () {
        $(".detailsC .industrySelect .personalType").toggle();
        $(".detailsC .industrySelect .typeHeader").find("img").toggleClass("tt");
    });
    $(".detailsC .industrySelect .personalType li").click(function () {
        if($(this).children("img").attr("src")=="http://www.idongpin.com.cn/images/userCenter/btn_2_1.png")
            $(this).children("img").attr("src","http://www.idongpin.com.cn/images/userCenter/btn_2_2.png");
        else
            $(this).children("img").attr("src","http://www.idongpin.com.cn/images/userCenter/btn_2_1.png");
    });

    $(".industrySelect .industryConfirm").click(function () {
        var text=$("<div></div>");
        var count=0;
        $(".detailsC .industrySelect .personalType li img").each(function () {
            if($(this).attr("src")=="http://www.idongpin.com.cn/images/userCenter/btn_2_2.png"){
               text.append($("<span></span>").append($(this).prev().text()));
                count++;
             }
        });
        if(count==0)
            $(".detailsC .industrySelect .personalType").toggle();
        else{
            count=0;
            $(".detailsC .industrySelect .typeHeader >div ").empty();
            $(".detailsC .industrySelect .typeHeader >div ").append(text);
            $(".detailsC .industrySelect .personalType").toggle();
        }
        $(".detailsC .industrySelect .typeHeader").find("img").toggleClass("tt");
    });
    $(".industrySelect .industryCancel").click(function () {
        $(".detailsC .industrySelect .personalType").toggle();
        $(".detailsC .industrySelect .typeHeader").find("img").toggleClass("tt");
    });
    // 主营产品选择
    $(".detailsC .productSelect .typeHeader").click(function () {
        $(".detailsC .productSelect .personalType").toggle();
        $(".detailsC .productSelect .typeHeader").find("img").toggleClass("tt");
    });
    $(".detailsC .productSelect .personalType li").click(function () {
        if($(this).children("img").attr("src")=="http://www.idongpin.com.cn/images/userCenter/btn_2_1.png")
            $(this).children("img").attr("src","http://www.idongpin.com.cn/images/userCenter/btn_2_2.png");
        else
            $(this).children("img").attr("src","http://www.idongpin.com.cn/images/userCenter/btn_2_1.png");
    });

    $(".productSelect .industryConfirm").click(function () {
        var text=$("<div></div>");
        var count=0;
        $(".detailsC .productSelect .personalType li img").each(function () {
            if($(this).attr("src")=="http://www.idongpin.com.cn/images/userCenter/btn_2_2.png"){
                text.append($("<span></span>").append($(this).prev().text()));
                count++;
            }
        });
        if(count==0)
            $(".detailsC .productSelect .personalType").toggle();
        else{
            count=0;
            $(".detailsC .productSelect .typeHeader >div ").empty();
            $(".detailsC .productSelect .typeHeader >div ").append(text);
            $(".detailsC .productSelect .personalType").toggle();
        }
        $(".detailsC .productSelect .typeHeader").find("img").toggleClass("tt");
    });
    $(".productSelect .industryCancel").click(function () {
        $(".detailsC .productSelect .personalType").toggle();
        $(".detailsC .productSelect .typeHeader").find("img").toggleClass("tt");
    });

});
//上传头像
function upImg(){
    var ie=navigator.appName=="Microsoft Internet Explorer" ? true : false;
    if(ie){
        document.getElementById("upImages").click();
    }else{
        var a=document.createEvent("MouseEvents");//FF的处理
        a.initEvent("click", true, true);
        document.getElementById("upImages").dispatchEvent(a);
    }
}