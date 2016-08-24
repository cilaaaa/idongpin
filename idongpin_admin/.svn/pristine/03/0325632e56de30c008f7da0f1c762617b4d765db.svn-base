/**
 * Created by chendongnan on 16/7/28.
 */
var TreeView = function () {

    return {
        //main function to initiate the module
        init: function () {

            var DataSourceTree = function (options) {
                this.url = options.url;
            };

            DataSourceTree.prototype = {
                data: function (options, callback) {

                    var param = null;

                    if (!("name" in options) && !("type" in options)) {
                        param = 0;//load the first level
                    } else if ("type" in options && options.type == "folder") {
                        if ("type_id" in options) {
                            param = options.type_id;
                        }
                    }

                    if (param != null) {
                        $.ajax({
                            url: this.url,
                            data: 'type_par_id=' + param,
                            type: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            dataType: 'json',
                            success: function (response) {
                                callback({data: response})
                            },
                            error: function (response) {
                                console.log(response);
                            }
                        })
                    }
                }
            };


            $('#FlatTree').tree({
                dataSource: new DataSourceTree({url: '/getTypes'}),
                loadingHTML: '<img src="/images/input-spinner.gif"/>',
            });

        }

    };

}();
TreeView.init();


$('.updateForm .formHeader .closeForm').click(function () {
    $('.updateForm').hide();
    $(".formTitle").html("");
    $("#type_id").val("");
    $("#type_par_id").val("");
    $("#do_method").val("");
    $(".type_name").val("");
});

$(".add-main").click(function () {
    $('.updateForm').show();
    $(".formTitle").html("添加主分类");
    $("#type_id").val("");
    $(".type_name").val("");
    $("#type_par_id").val(0);
    $("#do_method").val('add');
});

function addType(obj) {
    $('.updateForm').show();
    $(".formTitle").html("添加子分类");
    $("#type_id").val("");
    $(".type_name").val("");
    $("#do_method").val('add');
    if($(obj).parent().hasClass('tree-item')){
        $("#type_par_id").val($(obj).siblings(".tree-item-name").attr("data"));
    }else{
        $("#type_par_id").val($(obj).siblings(".tree-header-wrap").find(".tree-folder-name").attr("data"));
    }
}

function editType(obj) {
    $('.updateForm').show();
    $(".formTitle").html("编辑分类");
    $("#type_par_id").val("");
    $("#do_method").val('update');
    if($(obj).parent().hasClass('tree-item')){
        $("#type_id").val($(obj).siblings(".tree-item-name").attr("data"));
        $(".type_name").val($(obj).siblings(".tree-item-name").html());
    }else{
        $(".type_name").val($(obj).siblings(".tree-header-wrap").find(".tree-folder-name").html());
        $("#type_id").val($(obj).siblings(".tree-header-wrap").find(".tree-folder-name").attr("data"));
    }
}

function delType(obj) {
    if (window.confirm("确认删除该分类码")) {
        $(".type_name").val("");
        $("#type_par_id").val("");
        $("#do_method").val('del');
        if($(obj).parent().hasClass('tree-item')){
            $("#type_id").val($(obj).siblings(".tree-item-name").attr("data"));
        }else{
            $("#type_id").val($(obj).siblings(".tree-header-wrap").find(".tree-folder-name").attr("data"));
        }
        $("#typeBtn").click();
    }
}