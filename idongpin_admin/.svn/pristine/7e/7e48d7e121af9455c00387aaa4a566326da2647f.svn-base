/**
 * Created by chendongnan on 16/8/8.
 */
$(document).ready(function(){
    $('.saving').show();
});
$('.company_id').change(function() {
    showLoading();
    $.ajax({
        url: 'http://114.55.150.226:8080/order/getCompanyPro',
        type: 'get',
        cache: 'false',
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            companyid:$('.company_id').val(),
        },
        success: function (data) {
            $('.pro_id').empty().append("<option value=''>请选择商品</option>");
            $.each(data,function($k,$v){
                $('.pro_id').append("<option value='" + $v.proid + "'>" + $v.proname + "</option>");
            });
            hideLoading();
        },
        error: function (data) {
            alert('网络或服务器错误，请检查网络连接！');
            console.log(data);
            hideLoading();
        }
    });
});


$('.freight_type').delegate('','change',function(){
    if($(this).val() == ""){
        alert('请选择相应的运费付款方式!');
        $('#freight').val('');
        $('#freight').attr('readonly',true);
    }else if($(this).val() =='自提'){
        $('#freight').val('0');
        $('#freight').attr('readonly',true);
    }else if($(this).val() =='货到付款'){
        $('#freight').val('');
        $('#freight').attr('readonly',false);
    }else if($(this).val() =='免运费'){
        $('#freight').val('0');
        $('#freight').attr('readonly',true);
    }
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
$('.saving').click(function(){
    form.submit();
});