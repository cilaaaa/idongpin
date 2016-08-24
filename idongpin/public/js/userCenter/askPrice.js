$(document).ready(function () {
    var windowHeight = $(window).height();
    var loginInfoHeight = $(".loginInfo").height();
    var searchToolHeight = $(".searchTool").height();
    var minHeight = windowHeight - loginInfoHeight - searchToolHeight - 183;

    $(".afterThreeMonth").css("minHeight", minHeight);
    $(".beforeThreeMonth").css("minHeight", minHeight);

    //切换订单日期
    $(".selectDate").each(function () {
        $(this).click(function () {
            $(this).addClass("selectDateActive");
            var txt = $(this).text();
            $(".selectDate").not(this).removeClass("selectDateActive");
            if (txt == "近三个月订单") {
                $(".afterThreeMonth").css("display", "block");
                $(".beforeThreeMonth").css("display", "none");
            } else if (txt == "三个月前订单") {
                $(".afterThreeMonth").css("display", "none");
                $(".beforeThreeMonth").css("display", "block");
            }
        });
    });

    //
    $(".tradeMenu li").each(function () {
        var liTxt = $(this).children("a").text();
        if (liTxt == "我的询价单") {
            $(this).children("a").css("color", "#ff6c00");
        }
    });

    //状态筛选
    $(".status").each(function () {
        $(this).delegate("", "click", function () {
            $(this).addClass("statusActive");
            $(".status").not(this).removeClass("statusActive");
        });
    });

    $(".merchant").each(function () {
        $(this).delegate("", "click", function () {
            var _this = $(this);
            var obj = $(this).attr('data-count');
            if (obj > 0) {
                var detail = $(this).attr("data-detail");
                if (typeof(detail) == "undefined" || detail == "no") {
                    $(".merchant").not(this).parent().siblings(".trdetail").remove();
                    $(".merchant").not(this).children("img").css({
                        transform: "rotate(-90deg)",
                        webkitTransform: "rotate(-90deg)",
                        mozTransform: "rotate(-90deg)",
                        msTransform: "rotate(-90deg)",
                        oTransform: "rotate(-90deg)",
                    });
                    $(".merchant").not(this).attr("data-detail", "no");
                    $.ajax({
                        url: host+'/user/getQuote',
                        type: 'get',
                        cache: 'false',
                        dataType: 'json',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            launch_order_id: $(this).parent().attr('data-order'),
                        },
                        success: function (data) {
                            if (data.msg == 'success') {
                                var quotes = JSON.parse(data.quotes);
                                var str = "";
                                for (i = 0; i < quotes.length; i++) {
                                    str = str + "<li class='tr trdetail'>"
                                        + "<div class='goodsName'></div>"
                                        + "<div class='merchant'>" + quotes[i].company_name + "</div>"
                                        + "<div class='offer'>¥" + quotes[i].quote_price + "</div>"
                                        + "<div class='freight'>" + quotes[i].quote_freight + "</div>"
                                        + "<div class='operation'><span class='finish'" +
                                        " onclick=\"window.location.href=host+'/company/contact?companyid="+ quotes[i].quote_user_id +"'\">详情</span></div>"
                                        + "</li>";
                                }
                                _this.parent().after(str);
                            }
                        },
                        error: function (data) {
                            console.log(data);
                        }
                    });
                    $(this).children("img").css({
                        transform: "rotate(0deg)",
                        webkitTransform: "rotate(0deg)",
                        mozTransform: "rotate(0deg)",
                        msTransform: "rotate(0deg)",
                        oTransform: "rotate(0deg)",
                    });
                    $(this).attr("data-detail", "yes");
                } else {
                    $(this).parent().siblings(".trdetail").remove();
                    $(this).children("img").css({
                        transform: "rotate(-90deg)",
                        webkitTransform: "rotate(-90deg)",
                        mozTransform: "rotate(-90deg)",
                        msTransform: "rotate(-90deg)",
                        oTransform: "rotate(-90deg)",
                    });
                    $(this).attr("data-detail", "no");
                }
            }
        });
    });

    $(".btn.update .modify").delegate("", "click", function () {
        $('.info li').find('span').show();
        $('.info li').find('.form-control .help-block strong').empty();
        $('.info li').find('.form-control .help-block').hide();
        $('.info li').find('.form-control').hide();
        $('.info li').find('select').hide();
        $('.info li').removeClass("has-error");
        $(".btn.update").hide();
        $(".btn.order").show();
    });

    $(".orderInfoTtl img").delegate("", "click", function () {
        $(".detailMode").css("display", "none");
        $('.info li').find('span').show();
        $('.info li').find('.form-control .help-block strong').empty();
        $('.info li').find('.form-control .help-block').hide();
        $('.info li').find('.form-control').hide();
        $('.info li').find('select').hide();
        $('.info li').removeClass("has-error");
        $(".btn.update").hide();
        $(".btn.order").show();
        $(".offerInfo ul .offerTb").remove();
    });
});

function checkQuote(obj){
    var check = $(obj).find(".checkbox").attr("data-check");
    var src = $(obj).find(".checkbox").attr("src");
    if (check == "unselected") {
        src = $(obj).find(".checkbox").attr("src").replace("unchecked.png", "checked.png");
        $(obj).find(".checkbox").attr("data-check", "selected");
        $(obj).find(".checkbox").attr("src", src);
        $(".offer").not(obj).find(".checkbox").attr("data-check", "unselected");
        $(".offer").not(obj).find(".checkbox").attr("src", src.replace("checked.png", "unchecked.png"));
        $("#quote_id").val($(obj).attr("data-id"));
    } else {
        $("#quote_id").val("");
        src = $(obj).find(".checkbox").attr("src").replace("checked.png", "unchecked.png");
        $(obj).find(".checkbox").attr("data-check", "unselected");
        $(obj).find(".checkbox").attr("src", src);
    }
}

//点击查看详情
$(".finish").each(function () {
    $(this).delegate("", "click", function () {
        var launchid = $(this).attr('data-launchid');
        $.ajax({
            url: host+'/user/getLaunchOrder',
            type: 'get',
            cache: 'false',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                launch_order_id: launchid,
            },
            success: function (data) {
                if (data.msg == 'success') {
                    var order = JSON.parse(data.launchOrder);
                    $.each(order,function(name,value){
                        if(name == 'quotes'){
                            var str = "";
                            if(value.length == 0){
                                if($("#flag").length ==0){
                                    $('.order .confirm').before('<button class="modify" id="flag">修改</button>');
                                }
                            }else{
                                $('.order .modify').remove();
                            }
                            for(var i = 0;i<value.length;i++){
                                str = str+"<li class=\"offer offerTb\" onclick='checkQuote(this)' data-id='" + value[i].quote_id + "'><span" +
                                    " class=\"select\"><img class=\"checkbox\" src="+host+"/images/userCenter/unchecked.png data-check=\"unselected\"></span><span class=\"Business\">"
                                    + value[i].company_name + "</span><span class=\"quote\">¥ " + value[i].quote_price + "</span><span class=\"carriage\">" + value[i].quote_freight + "</span></li>"
                            }
                            $(".offerInfo ul").append(str);
                        }else{
                            $('.' + name).html(value).siblings("input").val(value);;
                            if(name=='madein'){
                                $("."+name).siblings("select").find("option").each(function(){
                                    if($(this).html()==value){
                                        $(this).attr('selected',true);
                                    }
                                })
                            }
                        }
                    });
                    //设置弹窗的宽度和高度
                    var windowWidth = $(".detailMode").width();
                    var htmlHeight = $("body").height();
                    var detailHeight = $(".detail").height();
                    $(".detailMode").css({
                        width: windowWidth + "px",
                        height: htmlHeight - ($(window).height() - detailHeight) / 8 + "px"
                    });
                    $(".detailMode").css("padding-top", ($(window).height() - detailHeight) / 8 + "px");
                    $('.detailMode').show();
                }
            },
            error: function (data) {
                console.log(data);
            }
        });
    });

    $(".order").delegate(".modify","click",function () {
        console.log("111");
        $(".info .list input").each(function(){
            $(this).val($(this).parent().siblings("span").html());
        });
        $('.info li').find('span').not(".help-block").hide();
        $('.info li').find('.form-control').show();
        $('.info li').find('select').show();
        $(".btn.update").show();
        $(".btn.order").hide();
    });
});

function sendUpdatelaunchOrderAjax(){
    var launch_order_name = "";
    var amount="";
    var limit_time_from="";
    var limit_time_to="";
    var oil_content="";
    var water_content='';
    var shelf_life="";
    var per_weight="";
    var per_length="";
    var madein=$(".info .list select").val();
    var launch_order_id=$('.launch_order_id').text();
    $(".info .list input").each(function(){
        switch($(this).attr('name')){
            case 'launch_order_name':launch_order_name=$(this).val();break;
            case 'amount':amount=$(this).val();break;
            case 'limit_time_from':limit_time_from=$(this).val();break;
            case 'limit_time_to':limit_time_to=$(this).val();break;
            case 'oil_content':oil_content=$(this).val();break;
            case 'water_content':water_content=$(this).val();break;
            case 'shelf_life':shelf_life=$(this).val();break;
            case 'per_weight':per_weight=$(this).val();break;
            case 'per_length':per_length=$(this).val();break;
            default:break;
        }
    });
    var json={
        launch_order_id: launch_order_id,
        do_method:'update',
        launch_order_name:launch_order_name,
        amount:amount,
        limit_time_from:limit_time_from,
        limit_time_to:limit_time_to,
        oil_content:oil_content,
        water_content:water_content,
        shelf_lif:shelf_life,
        per_weight:per_weight,
        per_length:per_length,
        madein:madein,};
    $.ajax({
        url: host+'/user/launchOrder/update',
        type: 'post',
        cache: 'false',
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            launch_order_id: launch_order_id,
            do_method:'update',
            launch_order_name:launch_order_name,
            amount:amount,
            limit_time_from:limit_time_from,
            limit_time_to:limit_time_to,
            oil_content:oil_content,
            water_content:water_content,
            shelf_life:shelf_life,
            per_weight:per_weight,
            per_length:per_length,
            madein:madein,
        },
        success: function (data) {
            if (data.msg == 'success') {
                alert("修改成功");
                window.location.reload();
                //var order = JSON.parse(data.launchOrder);
                //$.each(order,function(name,value){
                //    $('.' + name).html(value).siblings("input").val(value);;
                //    if(name=='madein'){
                //        $("."+name).siblings("select").find("option").each(function(){
                //            if($(this).html()==value){
                //                $(this).attr('selected',true).not(this).attr('selected',false);
                //            }
                //        })
                //    }
                //});
            }else{
                alert('修改失败!');
                console.log(data);
            }
        },
        error: function (data) {
            console.log(data);
            $(".has-error").each(function () {
                if(submitInput($(this).find("input").val())){
                    $(this).find("strong").empty();
                    $(this).find("help-block").hide();
                    $(this).removeClass("has-error");
                }
            });
            $.each(data.responseJSON,function($k,$v){
                $("."+$k).parent().addClass("has-error");
                $("."+$k).parent().find('.form-control .help-block ').show();
                $("."+$k).parent().find('.form-control .help-block strong').text($v);

            });

            var rowMax=10;
            for(var i=0;i<rowMax;i+=2){
                if($('.info ').children(".list").eq(i).hasClass("has-error")|| $('.detailMode .list').eq(i+1).hasClass("has-error")){
                    $('.info ').children(".list").eq(i+1).children(".form-control").find("span").show() ;
                    $('.info ').children(".list").eq(i).children(".form-control").find("span").show() ;
                }
                else{
                    $('.info ').children(".list").eq(i+1).children(".form-control").find("span").hide() ;
                    $('.info ').children(".list").eq(i).children(".form-control").find("span").hide() ;
                }
            }
        }
    });
}

function makeOrder(){
    if($('#quote_id').val()==""){
        alert('请选择一个供应商');
    }else{
        if(confirm("你确定要选择此供应商?")){
            $.ajax({
                url: host+'/user/makeOrder',
                type: 'post',
                cache: 'false',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    launch_order_id: $('.launch_order_id').html(),
                    quote_id:$('#quote_id').val(),
                },
                success: function (data) {
                    if (data.msg == 'success') {
                        alert("下单成功");
                        window.location.href=host+"/user/order";
                    }
                },
                error: function (data) {
                    console.log(data);
                }
            });
        }
    }
}

//输入框内容为空时，提示错误
function submitInput(val){
    if($.trim(val) != "" || $.trim(val).length != 0){
        return true;
    }else{
        return false;
    }
}
function cancelAskPrice(obj){
    if(confirm("你确定要取消此询价单?")){
        $.ajax({
            url: host+'/user/launchOrder/update',
            type: 'post',
            cache: 'false',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                do_method:'cancel',
                launch_order_id: $(obj).attr('data-launchid'),
            },
            success: function (data) {
                if (data.msg == 'success') {
                    alert("取消成功!");
                    window.location.reload();
                }
            },
            error: function (data) {
                console.log(data);
            }
        });
    }
}