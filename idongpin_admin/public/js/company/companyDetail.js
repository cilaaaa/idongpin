/**
 * Created by xkl on 2016/7/22.
 */
$(document).ready(function(){
    $('#form1 input').attr('disabled',true);
    $('#form1 textarea').attr('disabled','disabled');
});
$('.updating').click(function(){
    $('#form1 input').not('.company_id').attr('disabled',false);
    $('#form1 textarea').attr('disabled',false);
    $('.saving,.canceling').css('display','block');
    $(this).css('display','none');
    $('.deleting').css('display','none');
});
$('.canceling').click(function(){
    $('#form1 input').attr('disabled',true);
    $('#form1 textarea').attr('disabled','disabled');
    $('.updating,.deleting').css('display','block');
    $(this).css('display','none');
    $('.saving').css('display','none');
});
$('.saving').click(function(){
    showLoading();
    var json={
        company_id:$('.company_id').val(),
        company_type: $('.company_type').val(),
        establishment_date:$('.establishment_date').val(),
        company_name:$('.company_name').val(),
        company_aliase:$('.company_aliase').val(),
        company_address:$('.company_address').val(),
        company_major:$('.company_major').val(),
        company_brand:$('.company_brand').val(),
        company_product:$('.company_product').val(),
        advanced: $('.advanced').val(),
        recommendation: $('.recommendation').val(),
        registered_capital:$('.recommendation').val(),
        company_linkman: $('.company_linkman').val(),
        company_mobile: $('.company_mobile').val(),
        company_phone:$('.company_phone').val(),
        company_linkman_extend: $('.company_linkman_extend').val(),
        company_website: $('.company_website').val(),
        company_zipcode:$('.company_zipcode').val(),
        company_desc:$('.company_desc').val()
    };
    $.ajax({
        url:'http://114.55.150.226:8080/company/update',
        type:'post',
        cache:'false',
        dataType:'json',
        headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data:{
            companyid:$('.company_id').val(),
            companyinfo:JSON.stringify(json),
            do_method:'update'
        },
        success:function(data) {
            if(data.msg =='success'){
                window.location.reload();
            }else{
                alert(data.msg);
                hideLoading();
            }
        },
        error:function(data){
            hideLoading();
            $.each(data.responseJSON,function($k,$v){
                $("."+$k).parent().parent().addClass("has-error");
                $("."+$k).parent().append("<span class='help-block'><strong>"+$v+"</strong></span>")
            });
        }
    });
});
$('.deleting').click(function(){
    var r = confirm('确定要删除这条记录吗？');
    if(r == true){
        showLoading();
        $.ajax({
            url:'http://114.55.150.226:8080/company/update',
            type:'post',
            cache:'false',
            dataType:'json',
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:{
                companyid:$('.company_id').val(),
                do_method:'del'
            },
            success:function(data) {
                if(data.msg =='success'){
                   window.location.href='http://114.55.150.226:8080/company/list';
                }else{
                    alert(data.msg);
                    hideLoading();
                }
            },
            error:function(){
                hideLoading();
                alert('网络错误，请检查网络设置！');
            }
        });
    }
});
$('.goback').click(function(){
    window.location.href='http://114.55.150.226:8080/company/list';
});