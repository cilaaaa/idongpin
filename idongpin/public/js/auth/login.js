/**
 * Created by chenwu on 2016/6/29.
 */
$(document).ready(function() {

    $("#logining").click(function () {
        if(!isnumber($("#username").val()) || !ispwd($("#pwd").val())){
            $(".formContent .loginPadding .logining button").attr("disabled",true);
            $("#logining ").css("opacity","0.5");
            $("#enteru").addClass("hasError");
            $(".userName_Pwd_Img .labelname").text("手机号错误");
            // $(".formContent .userName_Pwd_Img .upwd").css("display","none");
            $("#enterp").addClass("hasError");
            $(".userName_Pwd_Img .labelpwd").text("6-18位,以字母开头，可包含_和.");
        }
    });
    

//记住密码
    $(".autoLoginForget .autoLogin img").click(function () {
        if($(this).attr("src")=="http://www.idongpin.com.cn/images/auth/btn_2_1.png"){
            $(this).attr("src","http://www.idongpin.com.cn/images/auth/btn_2_2.png");
            $(".autoLoginForget .autoLogin input").prop("checked",true);
        }
        else{
            $(this).attr("src","http://www.idongpin.com.cn/images/auth/btn_2_1.png");
            $(".autoLoginForget .autoLogin input").prop("checked",false);
        }

    });


});
function isnumber(str){
    var s=/^(13[0-9]|14[0-9]|15[0-9]|18[0-9])\d{8}$/;
    return s.test(str);
}
function ispwd(str){
    var s=/^[a-zA-Z]{1}([a-zA-Z0-9]|[._]){5,17}$/;
    return s.test(str);
}
function isphoneRight(obj) {
    if ($(obj).val() != "")
        if (!isnumber($(obj).val())) {
            $(".formContent .userName_Pwd_Img .uimg").css("display", "none");
            $("#enteru").addClass("hasError");
            $(".userName_Pwd_Img .labelname").text("手机号错误");
            $(".formContent .loginPadding .logining button").attr("disabled", true);
            $("#logining ").css("opacity", "0.5");
        }
        else {

            if ($("#enteru").hasClass("hasError"))
                $("#enteru").removeClass("hasError");
            $(".formContent .userName_Pwd_Img .uimg").css("display", "block");
            if (ispwd($("#pwd").val())) {
                $(".formContent .loginPadding .logining button").attr("disabled", false);
                $("#logining ").css("opacity", "1");
            }

        }
}
function ispwdRight(obj) {
    if($(obj).val()!="")
        if (!ispwd($(obj).val()))
        {
            $(".formContent .loginPadding .logining button").attr("disabled",true);
            $("#logining ").css("opacity","0.5");
            $(".formContent .userName_Pwd_Img .upwd").css("display","none");
            $("#enterp").addClass("hasError");
            $(".userName_Pwd_Img .labelpwd").text("6-18位,以字母开头，可包含_和.");
        }
        else {
            if ($("#enterp").hasClass("hasError"))
                $("#enterp").removeClass("hasError");
            $(".formContent .userName_Pwd_Img .upwd").css("display", "block");
            if (isnumber($("#username").val())) {
                $(".formContent .loginPadding .logining button").attr("disabled", false);
                $("#logining ").css("opacity", "1");
            }
        }
}

