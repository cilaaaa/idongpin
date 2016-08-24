/**
 * Created by xkl on 2016/8/4.
 */

$(document).ready(function(){
    $('.form .form-control').attr('disabled',true);
    $('.unit').attr('disabled',true);
});
$('.updating').click(function(){
    $('.form .form-control').attr('disabled',false);
    $('.unit').attr('disabled',false);
    $('.saving,.canceling').css('display','block');
    $(this).css('display','none');
});
$('.canceling').click(function(){
    window.location.reload();
});
$('.goback').click(function(){
    window.location.href="http://114.55.150.226:8080/order/orderlist";
});
function change_qty_unit(obj){
    var txt = $(obj).find('a').text();
    $('.qty_unit').text(txt);
    $('#qty_unit').val(txt);
}
function change_price_unit(obj){
    var txt = $(obj).find('a').text();
    $('.price_unit').text(txt);
    $('#price_unit').val(txt);
}
function savingUpdateOrder(){
    showLoading();
    var error_count = 0;
    $('.form-control').each(function(){
        if($(this).hasClass('qty') || $(this).hasClass('unit_price')){
            if($(this).val() == ""){
                if(!$(this).parent().parent().parent().hasClass("has-error")){
                    $(this).parent().parent().parent().addClass("has-error");
                    $(this).parent().parent().append("<strong class='help-block'><b>该选项不能为空!</b></strong>");
                }
                error_count++;
            }
        }else{
            if(!$(this).hasClass('pay_time')&&!$(this).hasClass('send_time')){
                if($(this).val() == ""){
                    if(!$(this).parent().parent().hasClass("has-error")){
                        $(this).parent().parent().addClass("has-error");
                        $(this).parent().append("<strong class='help-block'><b>该选项不能为空!</b></strong>");
                    }
                    error_count++;
                }
            }
        }

    });
    if(error_count == 0){
        form.submit();
    }else{
        hideLoading();
    }
}
$('.form-control').delegate('','focus',function(){
    if($(this).hasClass('qty') || $(this).hasClass('unit_price')){
        if ($(this).parent().parent().parent().hasClass("has-error")) {
            $(this).parent().parent().parent().removeClass("has-error");
            $(this).parent().parent().find('.help-block').remove();
        }
    }else{
        if ($(this).parent().parent().hasClass("has-error")) {
            $(this).parent().parent().removeClass("has-error");
            $(this).parent().find('.help-block').remove();
        }
    }
});