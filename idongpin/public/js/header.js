/**
 * 该方法是点击左面选项，子菜单在右边显示出来
 * @return null
 * @param object
 */
//加入收藏
function AddFavorite(sURL, sTitle) {
    sURL = encodeURI(sURL);
    try {
        window.external.addFavorite(sURL, sTitle);
    } catch (e) {
        try {
            window.sidebar.addPanel(sTitle, sURL, "");
        } catch (e) {
            alert("加入收藏失败，请使用Ctrl+D进行添加,或手动在浏览器里进行设置.");
        }
    }
}
//设为首页
function SetHome(url) {
    if (document.all) {
        document.body.style.behavior = 'url(#default#homepage)';
        document.body.setHomePage(url);
    } else {
        alert("您好,您的浏览器不支持自动设置页面为首页功能,请您手动在浏览器里设置该页面为首页!");
    }
}

$(document).ready(function(){

    //二维码弹窗遮罩层
    var screenHeight = $(window).height();
    var QRTop = (screenHeight - 488)/2;
    $(".QRWindow").css({
        height : screenHeight + "px",
        paddingTop : QRTop + "px"
    });
    //点击我要弹出二维码
    $(".purcher").delegate("","click",function(){
        $(".QRWindow").css("display","block");

    });
    //低级x关闭弹窗
    $(".close_1").delegate("","click",function(){
        $(".QRWindow").css("display","none");

    });

    //默认第一个为选中
    $("#carte>:first").children("img").css("display","block");

    //鼠标移到导航栏上背景图片显示出来
    $(".firstCarte").each(function(){
        $(this).hover(function(){
            $(this).children("img").css("display","block");
            $(".firstCarte").not(this).children("img").css("display","none");
        });
    });

    //轮播图片居中
    var screenWidth = $("body").css("width").split("px")[0];
    var imgWidth = (screenWidth-1920)/2;
    $(".image img").each(function(){
        $(this).css({
            marginLeft : imgWidth+"px"
        });
    });
    $(".image li").each(function(){
        var color = $(this).attr("data-color");
        $(this).css("backgroundColor",color);
    });

    //二级菜单显示
    $(".firstCarte").mouseenter(function(){
        var number = $(this).attr("data-type");
        $('.secondCarte').each(function(){
            if($(this).attr('data-type') == number){
                $(this).addClass('secondCarteActive');
                $('.secondCarte').not(this).removeClass('secondCarteActive');
            }
        });
    });

    //鼠标移动到二级菜单上，第三级菜单栏相对应的显示出来
    $(".topCarte div").each(function(){
        $(this).hover(function(){
            $(this).addClass("secondActive");
            $(this).parent().children("div").not(this).removeClass("secondActive");
            $(this).children("img").addClass("imgActive");
            $(this).parent().children("div").not(this).children("img").removeClass("imgActive");
            $(this).children("span").css("color","#ffa800");
            $(this).parent().children("div").not(this).children("span").css("color","#666666");
            var type = $(this).attr("data-type");
            $(".bottomCarte_"+type).addClass("bottomCarteActive");
            $(this).parent().siblings(".bottomCarte").not(".bottomCarte_"+type).removeClass("bottomCarteActive");
        });
    });
        
    //下拉至搜索栏刚好消失时，搜索栏固定到顶部
    showSearchBar();
    
    //鼠标移入展示搜索分类的二级菜单
    $(".searchKind").delegate("","mouseenter",function(){
        $(".kindOption li").slideDown("fast");
        $("#dropDown").css({
            transform : "rotate(180deg)",
            webkitTransform : "rotate(180deg)",
            mozTransform : "rotate(180deg)",
            msTransform : "rotate(180deg)",
            oTransform : "rotate(180deg)"
        });
        $(".searchKind div").css({
            backgroundColor : "#f0f0f0"
        });
        $(".kindOption li").css({
            backgroundColor : "#f0f0f0"
        });
    });

    //鼠标移入展示搜索分类的二级菜单
    $(".searchKind").delegate("","mouseleave",function(){
        $(".kindOption li").slideUp("fast");
        $("#dropDown").css({
            transform : "rotate(0deg)",
            webkitTransform : "rotate(0deg)",
            mozTransform : "rotate(0deg)",
            msTransform : "rotate(0deg)",
            oTransform : "rotate(0deg)"
        });
        $(".searchKind div").css({
            backgroundColor : "#ffffff"
        });
        $(".kindOption li").css({
            backgroundColor : "#ffffff"
        });
    });

    //下拉选择分类搜索
    $("#classifiedSearch span").delegate("","click",function(){
        $(this).addClass("searchActive");
        
        $("#classifiedSearch span").not(this).removeClass("searchActive");
        var select_text = $(this).text();
        $("#searchItem").text(select_text);
        switch(select_text){
            case "冻品": $("#searchType").attr("value","product");break;
            case "商铺": $("#searchType").attr("value","company");
        }
    });
    $(".kindOption li").each(function(){
        $(this).delegate("","click",function(){
            var selectedTxt = $(this).text();
            $("#searchItem").text(selectedTxt);
            $(".kindOption li").slideUp("fast");
            $("#dropDown").css({
                transform : "rotate(0deg)",
                webkitTransform : "rotate(0deg)",
                mozTransform : "rotate(0deg)",
                msTransform : "rotate(0deg)",
                oTransform : "rotate(0deg)"
            });
            $(".searchKind div").css({
                backgroundColor : "#ffffff"
            });
            $(".kindOption li").css({
                backgroundColor : "#ffffff"
            });
            $("#classifiedSearch span").each(function(){
                var text = $(this).text();
                if(text == selectedTxt){
                    $(this).addClass("searchActive");
                    $("#classifiedSearch span").not(this).removeClass("searchActive");
                }    
            });
            switch(selectedTxt){
                case "冻品": $("#searchType").attr("value","product");break;
                case "商铺": $("#searchType").attr("value","company");
            }
        });
    });

    //点击下拉箭头展开/收起导航
    $(".navTtl").delegate("","click",function(){
        var flag = $("#firstCarte").attr("data-flag");
        if(flag != "show"){
            $("#firstCarte,#secondCarte").slideUp("fast");
            $("#firstCarte").attr("data-flag","show");
            $("#showMenu").css({
                transform : "rotate(180deg)",
                webkitTransform : "rotate(180deg)",
                mozTransform : "rotate(180deg)",
                msTransform : "rotate(180deg)",
                oTransform : "rotate(180deg)"
            });
        }else{
            $("#firstCarte,#secondCarte").slideDown("fast");
            $("#firstCarte").attr("data-flag","none");
            $("#showMenu").css({
                transform : "rotate(0deg)",
                webkitTransform : "rotate(0deg)",
                mozTransform : "rotate(0deg)",
                msTransform : "rotate(0deg)",
                oTransform : "rotate(0deg)"
            });
        }
    });

   $(".menuItem").hover(function(){
        $(this).addClass("activeItem");
        $(".menuItem").not(this).removeClass("activeItem");
    });

    //鼠标移入，导航栏样式改变
    $(".nav .navMenu ul li a").each(function(){
        $(this).hover(function(){
                $(this).addClass("active");
            },function(){
                $(this).removeClass("active");
        }); 
    });

});


/**
 * 该方法是当下拉至搜索栏刚好消失时，顶部固定一个搜索栏
 * @returen null
 * @param object
 */
function showSearchBar(){
    $(window).scroll(function(){
        var scrollTop = $(window).scrollTop();
        //获取高度
        var searchToolHeight = $(".searchTool").height();
        var loginInfoHeight = $(".loginInfo").height()
        if(scrollTop >= (searchToolHeight + loginInfoHeight)){
            $(".searchContainer").removeClass().addClass("scrollSearch");
            $(".searchBar").removeClass().addClass("seachContent");
            $(".logo").children("div").css({
                display : "none"
            });
            $(".logo").removeClass().addClass("companyLogo");
            $(".search").removeClass().addClass("searchMode");
            $(".classifiedSearch").css({
                display : "none"
            });
             $(".searchKind").css({
                display : "block"
            });
            $(".searchBox").css({
                width : "auto",
                height : "auto",
                border : "none"
            });
           
             $(".searchInput").css({
                width : "440px"
             });

        }else{
           $(".scrollSearch").removeClass().addClass("searchContainer");
            $(".seachContent").removeClass().addClass("searchBar");
            $(".logo").children("div").css({
                display : "block"
            });
            $(".companyLogo").removeClass().addClass("logo");
            $(".searchMode").removeClass().addClass("search");
            $(".classifiedSearch").css({
                display : "block"
            });
             $(".searchKind").css({
                display : "none"
            });
            $(".searchBox").css({
                width : "654px",
                height : "34px;",
                border : "3px solid #e02341"
            });
           
             $(".searchInput").css({
                width : "547px"
             });
        }
    });

    //鼠标移动到商品图片上图片放大，商品出现边框
    $(".goodsMode .goodsImg img").each(function(){
        $(this).hover(function(){
            $(this).animate({
                width : "120%",
                height : "120%",
                marginTop : "-10px",
                marginLeft : "-10px"
            },500);
        },function(){
            $(this).animate({
                width : "100%",
                height : "100%",
                marginTop : "0px",
                marginLeft : "0px"
            },500);
        });
    });

    // $(".goodsMode li").each(function(){
    //     $(".goodsMode li").hover(function(){
    //         $(this).css({
    //             border : "1px solid #ffa800",
    //         });
    //         $(".goodsMode li").not(this).css({
    //             border : "none",
    //             borderBottom : "1px solid #e8e8e8",
    //             borderRight : "1px solid #e8e8e8",
    //         });
    //     },function(){
    //          $(".goodsMode li").css({
    //             border : "none",
    //             borderBottom : "1px solid #e8e8e8",
    //             borderRight : "1px solid #e8e8e8",
    //             marginTop : "-1px"
    //         });
    //     });
    // });
}

//该方法是给按钮添加样式
function btnCss(object,color){
    var oldColor;
    $(object).delegate("","mousedown",function(){
        oldColor = $(object).css("backgroundColor");
        $(object).css("backgroundColor",color);
    });
    $(object).delegate("","mouseup",function(){
        $(object).css("backgroundColor",oldColor);
    });
}