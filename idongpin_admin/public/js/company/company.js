///**
// * Created by xkl on 2016/7/21.
// */
//$(document).ready(function(){
//    $('.add').click(function() {
//        $("#submit").css('display','block');
//        $("#Form .formHeader .formTitle").text('添加新企业');
//        if (!$('#Form').hasClass('formDisplay')){
//            $('#Form').addClass('formDisplay');
//        }
//    });
//    $('.updateForm .formHeader .closeForm').click(function(){
//        $('#Form').removeClass('formDisplay');
//    });
//    $('.looking').click(function(){
//        $("#Form input").attr('disabled',true);
//        $("#Form select").attr('dis');
//        $("#Form .formHeader .formTitle").text('企业详细信息');
//        $("#submit").css('display','none');
//        if (!$('#Form').hasClass('formDisplay')){
//            $('#Form').addClass('formDisplay');
//        }
//        $.ajax({
//            url:'http://114.55.150.226:8080/company/info',
//            type:'get',
//            cache:'false',
//            dataType:'json',
//            data:{
//                companyid:$(this).attr('data-company_id'),
//            },
//            success:function(data) {
//                if(data.msg){
//                    alert(data.msg);
//                }else{
//                    $('.company_id').val(data.company_id);
//                    $('.company_type').val(data.company_type);
//                    var date=split('-',data.establishment_date);
//                    $('.year').val(date[0]);
//                    $('.month').val(date[1]);
//                    $('.day').val(date[2]);
//                    $('.company_name').val(data.company_name);
//                    $('.company_aliase').val(data.company_aliase);
//                    $('.company_address').val(data.company_address);
//                    $('.company_major').val(data.company_major);
//                    $('.company_brand').val(data.company_brand);
//                    $('.company_product').val(data.company_product);
//                    $('.advanced').val(data.advanced);
//                    $('.recommendation').val(data.recommendation);
//                    $('.registered_capital').val(data.registered_capital);
//                    $('.company_linkman').val(data.company_linkman);
//                    $('.company_mobile').val(data.company_mobile);
//                    $('.company_phone').val(data.companyid);
//                    $('.company_linkman_extend').val(data.company_linkman_extend);
//                    $('.company_website').val(data.company_website);
//                    $('.company_zipcode').val(data.company_zipcode);
//                    $('.company_desc').val(data.company_desc);
//                }
//            },
//            error : function() {
//                alert('请求错误，请检查网络设置！');
//            }
//        });
//    });
//    $('.updating').click(function(){
//        $("#submit").css('display','block');
//        $("#Form .formHeader .formTitle").text('修改企业详细信息');
//        if (!$('#Form').hasClass('formDisplay')){
//            $('#Form').addClass('formDisplay');
//        }
//    });
//    $('.deleting').click(function(){
//        var r=confirm("确定要删除该条记录吗？");
//        if (r==true) {
//            alert("删除成功！");
//        }
//    });
//});
