/**
 * Created by xubm on 2016/7/6.
 */

$(document).ready(function(){
    
    // //二级菜单隐藏显示
    // var tag=0;
    // $(" .navTtlP").click(function(){
    //     if(tag)
    //     {
    //         tag=0;
    //         if($(".navTtlP").hasClass("activecc"))
    //             $(".navTtlP").removeClass("activecc");
    //         $(".navTtlP").addClass("activec");
    //         $(".navTtlP").addClass("activec");
    //
    //     }
    //     else{
    //         tag=1;
    //         if($(".navTtlP").hasClass("activec") ){
    //             $(".navTtlP").removeClass("activec");
    //             $(".navTtlP").addClass("activecc");
    //         }
    //     }
    //     $("#carte").slideToggle();
    // });
    //
    //
    // $(".nav .navMenuP ul li .nva").each(function () {
    //     $(this).hover(function () {
    //         if($(this).hasClass("activecc"))
    //             $(this).removeClass("activec");
    //         else
    //             $(this).addClass("activec");
    //     },function () {
    //
    //         $(this).removeClass("activec");
    //     });
    // });

    //二级菜单隐藏显示
    // var tag=0;
    // $(" .navTtlP").click(function(){
    //     if(tag)
    //     {
    //         tag=0;
    //         if($(".navTtlP").hasClass("activecc"))
    //             $(".navTtlP").removeClass("activecc");
    //         $(".navTtlP").addClass("activec");
    //
    //     }
    //     else{
    //         tag=1;
    //         if($(".navTtlP").hasClass("activec") ){
    //             $(".navTtlP").removeClass("activec");
    //             $(".navTtlP").addClass("activecc");
    //         }
    //     }
    //     $("#carte").slideToggle();
    // });
    //
    //
    // $(".nav .navMenuP ul li .nva").each(function () {
    //     $(this).hover(function () {
    //         if($(this).hasClass("activecc"))
    //             $(this).removeClass("activec");
    //         else
    //             $(this).addClass("activec");
    //     },function () {
    //
    //         $(this).removeClass("activec");
    //     });
    // });

    // 一级菜单移入移除改变样式
    // $(".menuItem").hover(function(){
    //     $(this).addClass("activeItem");
    //     $(".menuItem").not(this).removeClass("activeItem");
    // });
    // $("#carte").delegate("","mouseleave",function(){
    //     $(".menuItem").removeClass("activeItem");
    // });
    //
    // //鼠标点击，筛选样式改变
    // $(".productList ul li ").each(function(){
    //     $(this).click(function(){
    //         $(".productList ul li ").not(this).each(function(){
    //             if($(this).hasClass("productListActive"))
    //                 $(this).removeClass("productListActive");
    //         });
    //         $(this).addClass("productListActive");
    //     });
    // });
    //
    // $(".proS").each(function(){
    //     $(this).delegate("","click",function(){
    //         $(this).addClass("productListActive");
    //         $(".proS").not(this).removeClass("productListActive");
    //     });
    // });

});

//搜索框内容为空时，不能搜索
function submitSearch(){
    var val = $(".searchBox input").val();
    if($.trim(val) != "" || $.trim(val).length != 0){
        return true;
    }else{
        return false;
    }
}