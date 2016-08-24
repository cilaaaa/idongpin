/**
 * Created by xkl on 2016/7/26.
 */
function closeAlertDiv(){
    $('.alertDiv').css('display','none');
}
function openAlertDiv(){
    $('.alertDiv .addInventForm .form-group').removeClass('has-error');
    $('.alertDiv .addInventForm .form-group .help-block').remove();
    $('.alertDiv .addInventForm .form-control').val("");
    $('.alertDiv').css('display','block');
}
function addTr(obj){
    var count =  0 ;
    $(obj).parent().parent().parent().find('.form-control').each(function(){
        if($(this).val() == ""){
            count++;
            if(!$(this).parent().parent().parent().hasClass('has-error')){
                $(this).parent().parent().parent().addClass('has-error');
                $(this).parent().parent().append("<span class='help-block'><b>该值不能为空！</b></span>");
            }
        }
    });
    if(count == 0){
        var wholesale_price=$(obj).parent().parent().parent().find('.wholesale_price').val();
        var wholesale_amount=$(obj).parent().parent().parent().find('.wholesale_amount').val();
        var wholesale_unit=$(obj).parent().parent().parent().find('.wholesale_unit').val();
        var wholesale_price_extend=$(obj).parent().parent().parent().find('.wholesale_price_extend').val();
        $("#table").append('<tr> <td class="wholesale_price">'+wholesale_price+'</td> <td class="wholesale_amount">'+wholesale_amount+'</td> <td class="wholesale_unit">'+wholesale_unit+'</td> <td class="wholesale_price_extend">'+wholesale_price_extend+'</td> <td> <a class="btn btn-xs btn-info looking" onclick="updateDiv(this);"> <i class="glyphicon glyphicon-pencil">修改</i></a> <a class="btn btn-xs btn-danger  deleting" onclick="removeTr(this);"><i class="glyphicon glyphicon-trash">删除</i></a></td></tr>');
        closeAlertDiv();
    }
}
function removeTr(obj){
    $(obj).parent().parent().remove();
}
function updateDiv(obj){
    $(obj).parent().parent().remove();
    openAlertDiv();
    var wholesale_price=$(obj).parent().parent().find('.wholesale_price').text();
    var wholesale_amount=$(obj).parent().parent().find('.wholesale_amount').text();
    var wholesale_unit=$(obj).parent().parent().find('.wholesale_unit').text();
    var wholesale_price_extend=$(obj).parent().parent().find('.wholesale_price_extend').text();
    $('.alertDiv .addInventForm .wholesale_price').val(wholesale_price);
    $('.alertDiv .addInventForm .wholesale_amount').val(wholesale_amount);
    $('.alertDiv .addInventForm .wholesale_unit').val(wholesale_unit);
    $('.alertDiv .addInventForm .wholesale_price_extend').val(wholesale_price_extend);
}
/*********************************************
 *                 提交表单                    *
 *********************************************/
function sendPost() {
    showLoading();
    if ($('.pro_type_id').val() == 0) {
        removeMessage($('.pro_type_id'));
        addMessage($('.pro_type_id'), '选择商品类型');
    }
    $('.item .property_text').each(function () {
        if ($(this).val() == "") {
            if (!$(this).parent().parent().parent().hasClass('has-error')) {
                addMessage($(this), '请输入属性值');
            }
        }
    });
    // var inventory_length = $('#table tbody tr').length;
    // if(inventory_length == 0){
    //     alert('请添加至少一条库存记录！');
    //     hideLoading();
    // }else{
    //     var inventory= new Array();
    //     var j = 0;
    //     $('#table tbody tr').each(function(){
    //         var json={};
    //         json['wholesale_price']=$(this).find('.wholesale_price').text();
    //         json['wholesale_amount']=$(this).find('.wholesale_amount').text();
    //         json['wholesale_unit']=$(this).find('.wholesale_unit').text();
    //         json['wholesale_price_extend']=$(this).find('.wholesale_price_extend').text();
    //         inventory[j] = json;
    //         j++;
    //     });
    //     inventory = JSON.stringify(inventory);
    //     $('#inventory').val(inventory);
        if ($('.has-error').length == 0) {
            form1.submit();
        } else {
            hideLoading();
        }
    // }
}

/*********************************************
 *                    动态删除属性             *
 *********************************************/

function removeProperty(obj) {
    $(obj).parent().parent().parent().remove();
}

/*********************************************
 *          添加错误信息以及错误格式             *
 *********************************************/

function addMessage(obj, message) {
    $(obj).parent().parent().parent().addClass("has-error");
    $(obj).parent().parent().append("<span class='help-block'><strong>" + message + "</strong></span>")
}

/*********************************************
 *          删除错误信息以及错误格式             *
 *********************************************/
function removeMessage(obj) {
    $(obj).parent().parent().parent().removeClass("has-error");
    $(obj).parent().parent().parent().find('.help-block').remove();

}
/*********************************************
 *                     弹出选择框              *
 *********************************************/

$('.continues').click(function () {
    createDiv();
});

/*********************************************
 *                     弹出选择框              *
 *********************************************/

function closeDiv() {
    $('.add_div').remove();
}

/*********************************************
 *         判断该商品是否选择商品类型。           *
 *********************************************/
$('.pro_type_id').change(function () {
    if ($(this).val() == 0) {
        addMessage($(this), '选择商品类型');
    } else {
        removeMessage($(this));
    }
});
