/**
 * Created by chendongnan on 16/7/28.
 */
$('.updateForm .formHeader .closeForm').click(function () {
    $('.updateForm').hide();
    $(".formTitle").html("");
    $(".property_name").val("");
    $(".property_text").val("");
    $("#do_method").val("");
    $("#fieldid").val("");
});

$(".add").click(function(){
    $('.updateForm').show();
    $(".formTitle").html("添加商品属性");
    $(".property_name").val("");
    $(".property_text").val("");
    $("#fieldid").val("");
    $("#do_method").val('add');
});

function editfield(obj) {
    $('.updateForm').show();
    $(".formTitle").html("编辑分类");
    $("#do_method").val('update');
    $("#fieldid").val($(obj).parent().siblings().eq(0).html());
    $(".property_name").val($(obj).parent().siblings().eq(1).html());
    $(".property_text").val($(obj).parent().siblings().eq(2).html());
}

function delfield(obj) {
    if (window.confirm("确认删除该分类码")) {
        $(".formTitle").html("");
        $(".property_name").val("");
        $(".property_text").val("");
        $("#fieldid").val($(obj).parent().siblings().eq(0).html());
        $("#do_method").val('del');
        $("#fieldBtn").click();
    }
}