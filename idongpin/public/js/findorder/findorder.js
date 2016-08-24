
$(document).ready(function(){
    $(".indent").each(function(index){
        if((index + 1) % 4 == 0){
            $(this).css("marginRight","0px");
        }
    });

    var windowHeight = $(window).height();
    var tipHeight = $(".tip").height();
    $(".tooltip").css("paddingTop",(windowHeight - tipHeight) / 2);

    $(".topTipBar img").delegate("","click",function(){
        $(".tooltip").css("display","none");
    });

	 //下拉至搜索栏刚好消失时，搜索栏固定到顶部
    showSearchBar();
    // $(".welcome").hover(function(){
    //     $(".userName").css({
    //         backgroundColor : "#ffffff",
    //         color : "#ff6c00"
    //     });
    //     $(".userName img").css({
    //         transform : "rotate(180deg)",
    //         webkitTransform : "rotate(180deg)",
    //         mozTransform : "rotate(180deg)",
    //         msTransform : "rotate(180deg)",
    //         oTransform : "rotate(180deg)"
    //     });
    //     $(".userManage").css({
    //         display : "block"
    //     });
    // },function(){
    //     $(".userName").css({
    //         backgroundColor : "#dfdfdf",
    //         color : "#555555"
    //     });
    //     $(".userName img").css({
    //         transform : "rotate(0deg)",
    //         webkitTransform : "rotate(0deg)",
    //         mozTransform : "rotate(0deg)",
    //         msTransform : "rotate(0deg)",
    //         oTransform : "rotate(0deg)"
    //     });
    //     $(".userManage").css({
    //         display : "none"
    //     });
    // });

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
	
	 //鼠标移入，导航栏样式改变
    $(".nav .navMenu ul li a").each(function(){
        $(this).hover(function(){
                $(this).addClass("active");
            },function(){
                $(this).removeClass("active");
        }); 
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
    //         });
    //     });
    // });

    //点击分类，样式发生改变
	$(".option").delegate("","click",function(){
		clearInterval(Interval);
		optionChangeStyle($(this));
		var type_id = $(this).attr("data-type");
		index = type_id;
		$("#goodsMode"+type_id).addClass("modeActive");
		$(".goodsMode").not($("#goodsMode"+type_id)).removeClass("modeActive");
	});

    function InitStarPro(){
		$("#goodsMode1").addClass("modeActive");
		$(".option").each(function(){
			if($(this).attr("data-type") == $("#goodsMode1").attr("data-type")){
				optionChangeStyle($(this));
			}
		});
	}
	
	function optionChangeStyle(obj){
		$(obj).addClass("optionActive");
		$(".option").not(obj).removeClass("optionActive");
		var width = $(obj).css("width").split("px")[0];
		var imgWidth = $(obj).children(".choiceIcon").children("img").css("width").split("px")[0];
		var left = ((width - imgWidth)/2)+"px";
		$(obj).children(".choiceIcon").children("img").css({
			display : "block",
			marginLeft : left
		});
		$(".option").not(obj).children(".choiceIcon").children("img").css({
			display : "none"
		});
		var url=host+"/search?searchType=product&protype=";
		$(obj).parent().parent().children("a").attr("href",url+$(obj).attr("data-type"));
	}
	/**
	 * 参数传入stop表示停止轮播
	 * 参数传入star表示开始轮播
	 * */
	var index=1;
	var Interval;
	function Carousel_star_pro(flag){
		if(flag =="start"){
			Interval=setInterval(function(){
				$("#goodsMode"+index).addClass("modeActive");
				$(".goodsMode").not("#goodsMode"+index).removeClass("modeActive");
				$(".option").each(function(){
					if($(this).attr("data-type") == index){
						optionChangeStyle($(this));
					}
				});
				index++;
				if(index > 6){
					index = 1;
				}
			},5000);
		}else{
			clearInterval(Interval);
		}
	}
	$(".content").mouseenter(function(){
		Carousel_star_pro("stop");
	});
	$(".content").mouseleave(function(){
		Carousel_star_pro("start");
	});

 
    $(".btn .protocol span").delegate("","click",function(){
        $(".agreementMode").css("disp","block");
    });
    $(".orderInfoTtl img").delegate("","click",function(){
        $(".modifiedMode").css("display","none");
    });
    $(".agreementTtl img").delegate("","click",function(){
        $(".agreementMode").css("display","none");
    });

    $(".checkbox").each(function(){
        $(this).delegate("","click",function(){
            var check = $(this).attr("data-check");
            var src = $(this).attr("src");
            if(check == "unselected"){
                var src = src.replace("unchecked.png","checked.png");
                $(this).attr("data-check","selected");
                $(this).attr("src",src);
            }else{
                var src = src.replace("checked.png","unchecked.png");
                $(this).attr("data-check","unselected");
                $(this).attr("src",src);
            }
        });
    });
});

function showSearchBar(){
	$(window).scroll(function(){

		var scrollTop = $(window).scrollTop();
		if(scrollTop >= 95){
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
				border : "2px solid #e02341"
			});

			$(".searchInput").css({
				width : "547px"
			});
		}
	});    
}

function releaseOrder(){

    $(".modifiedMode").css("display","block");
    // $(".tooltip").css("display","block");
}