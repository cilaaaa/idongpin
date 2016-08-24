/**
 * Created by xkl on 2016/7/25.
 */
$(document).ready(function(){
    $('.update input').attr('disabled',true);
    $('.update select').attr('disabled',true);

});
$('.updating').click(function(){
    $('.update input').attr('disabled',false);
    $('.update select').attr('disabled',false);
    $('.saving,.canceling').css('display','block');
    $(this).css('display','none');
    $('.goback').css('display','none');
});
$('.canceling').click(function(){
    window.location.reload();
});
$('.saving').click(function(){
});
$('.goback').click(function(){
    window.location.href='http://114.55.150.226:8080/user/list';
});
function saveUpdate(){
    showLoading();
    if($("#company_type").attr('data-display') == 'false'){
        company_id="";
    }else{
        company_id=$(".company_id").val();
    }
    var userjson={
        user_phone:$('.user_phone').val(),
        user_name: $('.user_name').val(),
        password:$('.password').val(),
        user_type:$('.user_type').val(),
        groupid:$('.groupid').val(),
        company_id:company_id
    };
    $.ajax({
        url: 'http://114.55.150.226:8080/user/update',
        type: 'post',
        cache: 'false',
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            userinfo: JSON.stringify(userjson),
            do_method: 'update'
        },
        success: function (data) {
            if (data.msg == 'success') {
                alert('修改成功！');
                window.location.reload();
            }else{
                hideLoading();
                alert('修改失败！');
                console.log(data);
            }
        },
        error: function (data) {
            alert('网络或服务器错误，请检查设置！');
            hideLoading();
            $.each(data.responseJSON,function($k,$v){
                $("."+$k).parent().parent().addClass("has-error");
                $("."+$k).parent().append("<span class='help-block'><strong>"+$v+"</strong></span>")
            });
        }
    });
}