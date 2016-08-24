/**
 * Created by chendongnan on 16/7/26.
 */
$('.add').click(function () {
    $("#submit").css('display', 'block');
    $("#Form .formHeader .formTitle").text('添加新用户');
    if (!$('#Form').hasClass('formDisplay')) {
        $('#Form').addClass('formDisplay');
    }
});
$('.updateForm .formHeader .closeForm').click(function () {
    $('#Form').removeClass('formDisplay');
});

function openac(userid) {
    showLoading();
    $.ajax({
        url: 'http://114.55.150.226:8080/user/update',
        type: 'post',
        cache: 'false',
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            user_id: userid,
            do_method: 'open'
        },
        success: function (data) {
            if (data.msg == 'success') {
                window.location.reload();

            } else {
                console.log(data);
                hideLoading();
            }
        },
        error: function (data) {
            console.log(data)
            hideLoading();
        }
    });
}
function closeac(userid) {
    showLoading();
    $.ajax({
        url: 'http://114.55.150.226:8080/user/update',
        type: 'post',
        cache: 'false',
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            user_id: userid,
            do_method: 'close'
        },
        success: function (data) {
            if (data.msg == 'success') {
                window.location.reload();
            } else {
                console.log(data);
                hideLoading();
            }
        },
        error: function (data) {
            console.log(data);
            hideLoading();
        }
    });
}
function submitAdd() {
    showLoading();
    var userjson={
        user_phone:$('.user_phone').val(),
        user_name: $('.user_name').val(),
        password:$('.password').val(),
        user_type:$('.user_type').val(),
        groupid:$('.groupid').val(),
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
            do_method: 'add'
        },
        success: function (data) {
            if (data.msg == 'success') {
                window.location.reload();
            }
        },
        error: function (data) {
            hideLoading();
            $.each(data.responseJSON,function($k,$v){
                $("."+$k).parent().parent().addClass("has-error");
                $("."+$k).parent().append("<span class='help-block'><strong>"+$v+"</strong></span>")
            });
        }
    });
}

