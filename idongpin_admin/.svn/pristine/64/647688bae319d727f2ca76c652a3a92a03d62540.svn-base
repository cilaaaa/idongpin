///**
// * Created by xkl on 2016/7/25.
// */
$(document).ready(function(){
    $('#Form input,select').attr('disabled',true);
    $('#picker').datepicker({
        language: "zh-CN",
        format: 'yyyy-mm-dd',
        autoclose: true,
        todayHighlight: true
    });
});
$('.updating').click(function(){
    $('#Form  input,select').attr('disabled',false);
    $('.continues,.saving,.canceling').css('display','inline-block');
    $(this).css('display','none');
    $('.goback').css('display','none');
    $('.input-group-addon').each(function(){
        $(this).attr('onclick','removeProperty(this)');
    });
});
$('.canceling').click(function(){
    showLoading();
    window.location.reload();
});
$('.saving').click(function(){
    showLoading();
    var error_count = 0;
    $('#form1 .form-group').find('input').each(function(){
        if($(this).val() == "" ||$(this).val() == " "){
            error_count++;
            if(!$(this).parent().parent().parent().hasClass('has-error')){
                $(this).parent().parent().parent().addClass('has-error');
                $(this).parent().parent().append("<span class='help-block'><strong>该属性值不能为空！</strong></span>");
            }
        }
    });
    if(error_count == 0){
        form1.submit();
    }else{
        hideLoading();
    }
});
$('.goback').click(function(){
    showLoading();
    window.location.href='http://114.55.150.226:8080/product/list';
});
function removeProperty(obj){
    $(obj).parent().parent().parent().remove();
}
function hideError(obj){
    $(obj).parent().parent().parent().removeClass('has-error');
    $(obj).parent().parent().find('.help-block').remove();
}
// function closeAddInventory(){
//     $('.add_invent').css('display','none');
// }
// function openAddInventory(){
//     $('.add_invent').css('display','block');
// }
// function closeUpdateInventory(){
//     $('.update_invent').css('display','none');
// }

function closeDiv(){
    $('.add_div').remove();
}
function datepicker_init(){
    $('#datepicker').datepicker({
        language: "zh-CN",
        format: 'yyyy-mm-dd',
        autoclose: true,
        todayHighlight: true
    });
}
// function openUpdateInventory(obj){
//     $('.update_invent').css('display','block');
//     var wholesale_price= $(obj).parent().parent().find('.td_wholesale_price').text();
//     var wholesale_amount= $(obj).parent().parent().find('.td_wholesale_amount').text();
//     var wholesale_unit= $(obj).parent().parent().find('.td_wholesale_unit').text();
//     var wholesale_price_extend= $(obj).parent().parent().find('.td_wholesale_price_extend').text();
//     var id = $(obj).parent().parent().find('.td_id').text();
//     $('.update_invent .inventory_id').val(id);
//     $('.update_invent .wholesale_price').val(wholesale_price);
//     $('.update_invent .wholesale_amount').val(wholesale_amount);
//     $('.update_invent .wholesale_unit').val(wholesale_unit);
//     $('.update_invent .wholesale_price_extend').val(wholesale_price_extend);
// }
// function sendUpdateInentoryAjax(){
//     var count = 0;
//     $('.update_invent .addInventForm .form-control').each(function(){
//         if($(this).val() =="") {
//             count++;
//             if (!$(this).parent().parent().hasClass('has-error')) {
//                 $(this).parent().parent().addClass('has-error');
//                 $(this).parent().append("<span class='help-block'><strong>该值不能为空！</strong></span>");
//             }
//         }
//     });
//     if(count == 0){
//         showLoading();
//         $.ajax({
//             url: 'http://114.55.150.226:8080/inventory/update',
//             type: 'post',
//             cache: 'false',
//             dataType: 'json',
//             headers: {
//                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//             },
//             data: {
//                 inventoryid:$('.update_invent .inventory_id').val(),
//                 do_method: 'update',
//                 wholesale_price: $('.update_invent .wholesale_price').val(),
//                 wholesale_amount:$('.update_invent .wholesale_amount').val(),
//                 wholesale_unit:$('.update_invent .wholesale_unit').val(),
//                 wholesale_price_extend:$('.update_invent .wholesale_price_extend').val(),
//             },
//             success: function (data) {
//                 if (data.msg == 'success') {
//                     alert('修改成功！');
//                     window.location.reload();
//
//                 } else {
//                     alert('修改失败！');
//                     console.log(data);
//                     hideLoading();
//                 }
//             },
//             error: function (data) {
//                 alert('网络或服务器错误，请检查网络连接！');
//                 console.log(data);
//                 hideLoading();
//             }
//         });
//     }
//
// }
// function delUpdateInventory(obj){
//     var r=confirm('确定要删除该条库存记录吗？');
//     if(r == true){
//         showLoading();
//         $.ajax({
//             url: 'http://114.55.150.226:8080/inventory/update',
//             type: 'post',
//             cache: 'false',
//             dataType: 'json',
//             headers: {
//                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//             },
//             data: {
//                 inventoryid:$(obj).attr('data-inventoryid'),
//                 do_method: 'del',
//             },
//             success: function (data) {
//                 if (data.msg == 'success') {
//                     alert('删除成功！');
//                     window.location.reload();
//
//                 } else {
//                     alert('删除失败！');
//                     console.log(data);
//                     hideLoading();
//                 }
//             },
//             error: function (data) {
//                 alert('网络或服务器错误，请检查网络连接！');
//                 console.log(data);
//                 hideLoading();
//             }
//         });
//     }
//
// }
// function addUpdateInventory(){
//     var count = 0;
//     $('.add_invent .addInventForm .form-control').each(function(){
//         if($(this).val() =="") {
//             count++;
//             if (!$(this).parent().parent().hasClass('has-error')) {
//                 $(this).parent().parent().addClass('has-error');
//                 $(this).parent().append("<span class='help-block'><strong>该值不能为空！</strong></span>");
//             }
//         }
//     });
//     if(count == 0){
//         showLoading();
//         $.ajax({
//             url: 'http://114.55.150.226:8080/inventory/update',
//             type: 'post',
//             cache: 'false',
//             dataType: 'json',
//             headers: {
//                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//             },
//             data: {
//                 do_method: 'add',
//                 proid:$('.add_invent .addInventForm .proid').val(),
//                 wholesale_price:$('.add_invent .addInventForm .wholesale_price').val(),
//                 wholesale_amount:$('.add_invent .addInventForm .wholesale_amount').val(),
//                 wholesale_unit:$('.add_invent .addInventForm .wholesale_unit').val(),
//                 wholesale_price_extend:$('.add_invent .addInventForm .wholesale_price_extend').val(),
//             },
//             success: function (data) {
//                 if (data.msg == 'success') {
//                     alert('添加成功！');
//                     window.location.reload();
//                 } else {
//                     alert('添加失败！');
//                     console.log(data);
//                     hideLoading();
//                 }
//             },
//             error: function (data) {
//                 alert('网络或服务器错误，请检查网络连接！');
//                 console.log(data);
//                 hideLoading();
//             }
//         });
//     }
// }
function removeErrorMessage(obj) {
    $(obj).parent().parent().parent().removeClass('has-error');
    $(obj).parent().parent().find('.help-block').remove();
}