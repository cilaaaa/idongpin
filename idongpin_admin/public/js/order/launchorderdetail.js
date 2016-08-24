/**
 * Created by xkl on 2016/8/3.
 */
$(document).ready(function(){
    $(".form1 .form-group input").attr("disabled","disabled");
    $(".form1 .form-group select").attr("disabled","disabled");
});
/*编辑状态*/
function edit() {
    $(".form1 .form-group input").removeAttr("disabled");
    $(".form1 .form-group select").removeAttr("disabled");
    $(".formHeader .updating").css("display","none");
    $(".formHeader .goback").css("display","none");
    $(".formHeader .canceling").css("display","block");
    $(".formHeader .saving").css("display","block");
}
/*取消操作*/
function cancels() {
    window.location.reload();
}
/*修改保存*/
function saves() {
    showLoading();
    var error_count=0;
    $('#form1 .form-group input').each(function(){
        if($(this).val() =="" || $(this).val() ==" " ){
            error_count++;
            if(!$(this).parent().parent().hasClass('has-error')){
                $(this).parent().parent().addClass('has-error');
                $(this).parent().append("<span class='help-block'><b>该值不能为空！</b></span>");
            }
        }
        if(error_count == 0){
            $("#form1").submit();
        }else{
            hideLoading();
        }
    });
}
function hideError(obj){
    $(obj).parent().parent().removeClass('has-error');
    $(obj).parent().find('.help-block').remove();
}
$('#limit_time_start,#limit_time_end,#review_time_s').datepicker({
    language: "zh-CN",
    format: 'yyyy-mm-dd',
    autoclose: true,
    todayHighlight: true
});
/*打开添加窗口*/
function add_price(){
    $('.add_price .form-group').removeClass('has-error');
    $('.help-block').remove();
    $('.add_price .form-control').val("");
    $(".add_price").css('display','block');
}
/*关闭添加窗口*/
function close_add_price(){
    $('.add_price').css('display','none');
}
/*发送添加请求*/
function sendAddPrice(){
    showLoading();
    var error_count = 0;
    if($('.add_price form .form-group select').val()==0){
        error_count++;
        $(this).parent().parent().addClass('has-error');
        $(this).parent().append("<span><b>请选择公司！</b></span>");
    }
    $('.add_price form .form-group input').each(function(){
        if($(this).val() ==""){
            error_count++;
            if(!$(this).parent().parent().hasClass('has-error')){
                $(this).parent().parent().addClass('has-error');
                $(this).parent().append("<span class='help-block'><b>该值不能为空！</b></span>");
            }
        }
    });
    if(error_count == 0){
        $.ajax({
            url: 'http://114.55.150.226:8080/launchOrder/quote',
            type: 'post',
            cache: 'false',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                do_method: 'add',
                quote_launch_order_id:$('.add_price .quote_launch_order_id').val(),
                quote_user_id:$('.add_price .quote_user_id').val(),
                quote_freight:$('.add_price .quote_freight').val(),
                quote_price:$('.add_price .quote_price').val(),
            },
            success: function (data) {
                if (data.msg == 'success') {
                    alert('添加成功！');
                    window.location.reload();

                } else {
                    alert(data.msg);
                    console.log(data);
                    hideLoading();
                }
            },
            error: function (data) {
                alert('网络或服务器错误，请检查网络连接！');
                console.log(data);
                hideLoading();
            }
        });
    }else{
        hideLoading();
    }
}
/*关闭更新窗口*/
function close_update_price(){
    $('.update_price').css('display','none');
}
/*打开更新窗口*/
function open_update_price(obj){
    $('.update_price').css('display','block');
    var quote_price=$(obj).parent().parent().find('.td_quote_price').text();
    var quote_freight=$(obj).parent().parent().find('.td_quote_freight').text();
    var company_name=$(obj).parent().parent().find('.td_company_name').text();
    var quote_id=$(obj).parent().parent().find('.td_quote_id').text();
    $('.update_price .quote_id').val(quote_id);
    $('.update_price .quote_price').val(quote_price);
    $('.update_price .quote_freight').val(quote_freight);
    $('.update_price .company_name').val(company_name);
}
/*发送更新请求*/
function sendUpdatePrice(){
    showLoading();
    var error_count = 0;
    if($('.update_price form .form-group select').val()==0){
        error_count++;
        $(this).parent().parent().addClass('has-error');
        $(this).parent().append("<span><b>请选择公司！</b></span>");
    }
    $('.update_price form .form-group input').each(function(){
        if($(this).val() ==""){
            error_count++;
            if(!$(this).parent().parent().hasClass('has-error')){
                $(this).parent().parent().addClass('has-error');
                $(this).parent().append("<span class='help-block'><b>该值不能为空！</b></span>");
            }
        }
    });
    if(error_count == 0){
        var json={
            do_method: 'update',
            quote_id:$('.update_price .quote_id').val(),
            quote_freight:$('.update_price .quote_freight').val(),
            quote_price:$('.update_price .quote_price').val(),
        };
        console.log(json);
        $.ajax({
            url: 'http://114.55.150.226:8080/launchOrder/quote',
            type: 'post',
            cache: 'false',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                do_method: 'update',
                quote_id:$('.update_price .quote_id').val(),
                quote_freight:$('.update_price .quote_freight').val(),
                quote_price:$('.update_price .quote_price').val(),
            },
            success: function (data) {
                if (data.msg == 'success') {
                    alert('修改成功！');
                    window.location.reload();

                } else {
                    alert(data.msg);
                    console.log(data);
                    hideLoading();
                }
            },
            error: function (data) {
                alert('网络或服务器错误，请检查网络连接！');
                console.log(data);
                hideLoading();
            }
        });
    }else{
        hideLoading();
    }
}
/*发送删除请求*/
function del_price(obj){
    showLoading();
    var launchid = $(obj).attr('data-number');
    var r = confirm('确定要删除该条报价吗？');
    if(r){
        $.ajax({
            url: 'http://114.55.150.226:8080/launchOrder/quote',
            type: 'post',
            cache: 'false',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                do_method: 'del',
                quote_id:launchid,
            },
            success: function (data) {
                if (data.msg == 'success') {
                    alert('删除成功！');
                    window.location.reload();

                } else {
                    alert(data.msg);
                    console.log(data);
                    hideLoading();
                }
            },
            error: function (data) {
                alert('网络或服务器错误，请检查网络连接！');
                console.log(data);
                hideLoading();
            }
        });
    }
}