
$(document).ready(function(){

    var pageMax=99; // 最大翻页99页
    var pageSpace=4;//跳翻页数
    var text; //当前页数数字
    var content;//要加载的页数内容
    var parentOn;//当前页面的前一个或后一个页面


    $(".pageNav ").on('click ','.initSpan',function(){
        $(".pageNav .initSpan ").not(this).each(function(){
            if($(this).hasClass("pc"))
                $(this).removeClass("pc");
        });
        $(this).addClass("pc");
    });
});

$(document).ready(function(){
    var pageCount = $(".pageNavRight").attr("data-pageCount");
    //pagingDefault(pageCount);
    var select = parseInt($(".pc").text());
    if(pageCount <= 6){
        $(".preMore").css("display","none");
        $(".nextMore").css("display","none");
    }else{
        if(select <4){
            $(".preMore").css("display","none");
        }else if(select >= (pageCount - 3)){
            $(".nextMore").css("display","none");
        }
    }
});

//默认样式
// function pagingDefault(pageCount){
//     if(pageCount > 6){
//         $(".preMore").css("display","none");
//         $(".initSpan").each(function(){
//             var val = parseInt($(this).text());
//             if(val > 6){
//                 $(this).parent("a").css("display","none");
//             }
//         });
//         clickPageCount(pageCount);
//         prePage();
//         nextPage(pageCount);
//     }else{
//         $(".preMore").css("display","none");
//         $(".nextMore").css("display","none");
//         $(".initSpan").each(function(){
//             $(this).delegate("","click",function(){
//                 $(this).addClass("pc");
//                 $(".initSpan").not(this).removeClass("pc");
//             });
//             $("#pageNavBefore").delegate("","click",function(){
//                 var select = parseInt($(".pc").text());
//                 select = select - 1;
//                 if(select >= 1){
//                     $(".initSpan").each(function(){
//                         var val = parseInt($(this).text());
//                         if(val == select){
//                             $(this).addClass("pc");
//                             $(".initSpan").not(this).removeClass("pc");
//                         }
//                     });
//                 }
//             });
//             $("#pageNavNext").delegate("","click",function(){
//                 var select = parseInt($(".pc").text());
//                 select = select + 1;
//                 if(select <= pageCount){
//                     $(".initSpan").each(function(){
//                         var val = parseInt($(this).text());
//                         if(val == select){
//                             $(this).addClass("pc");
//                             $(".initSpan").not(this).removeClass("pc");
//                         }
//                     });
//                 }
//             });
//         });
//     }
// }

// function clickPageCount(pageCount){
//     $(".initSpan").delegate("","click",function(){
//         var count = parseInt($(this).text());
//         if(count > 3 && count < (pageCount - 3)){
//             $(".preMore").css("display","inline-block");
//             $(".nextMore").css("display","inline-block");
//             $(".initSpan").each(function(){
//                 var val = parseInt($(this).text());
//                 if(val > (count - 3) && val <= (count + 3)){
//                     $(this).parent("a").css("display","inline-block");
//                 }else{
//                     $(this).parent("a").css("display","none");
//                 }
//             });
//         }else if(count >= (pageCount - 3)){
//             $(".nextMore").css("display","none")
//             $(".preMore").css("display","inline-block");
//             $(".initSpan").each(function(){
//                 var val = parseInt($(this).text());
//                 if(val > pageCount - 6){
//                     $(this).parent("a").css("display","inline-block");
//                 }else{
//                     $(this).parent("a").css("display","none");
//                 }
//             });
//         }else if(count <= 3){
//             $(".nextMore").css("display","inline-block")
//             $(".preMore").css("display","none");
//             $(".initSpan").each(function(){
//                 var val = parseInt($(this).text());
//                 if(val <= 6){
//                     $(this).parent("a").css("display","inline-block");
//                 }else{
//                     $(this).parent("a").css("display","none");
//                 }
//             });
//         }
//     });
// }
//
// function prePage(){
//     $("#pageNavBefore").delegate("","click",function(){
//         var select = parseInt($(".pc").text());
//         select = select - 1;
//         if(select >= 1){
//             $(".initSpan").each(function(){
//                 var val = parseInt($(this).text());
//                 if(val == select){
//                     $(this).addClass("pc");
//                     $(".initSpan").not(this).removeClass("pc");
//                     $(this).parent("a").css("display","inline-block");
//                     if(select == 1){
//                         $(".preMore").css("display","none");
//                     }
//                     $(".initSpan").each(function(){
//                         var page = parseInt($(this).text());
//                         if(page > (select + 5)){
//                             $(this).parent("a").css("display","none");
//                             if(select < 5){
//                                 $(".nextMore").css("display","inline-block");
//                             }
//                         }
//                     });
//                 }
//             });
//         }
//     });
// }
//
// function nextPage(pageCount){
//      $("#pageNavNext").delegate("","click",function(){
//         var select = parseInt($(".pc").text());
//         select = select + 1;
//         if(select <= pageCount){
//             $(".initSpan").each(function(){
//                 var val = parseInt($(this).text());
//                 if(val == select){
//                     $(this).addClass("pc");
//                     $(".initSpan").not(this).removeClass("pc");
//                     $(this).parent("a").css("display","inline-block");
//                     if(select == pageCount){
//                         $(".nextMore").css("display","none");
//                     }
//                     $(".initSpan").each(function(){
//                         var page = parseInt($(this).text());
//                         if(page < (select - 5)){
//                             $(this).parent("a").css("display","none");
//                             if(select > 6){
//                                 $(".preMore").css("display","inline-block");
//                             }
//                         }
//                     });
//                 }
//             });
//         }
//     });
// }