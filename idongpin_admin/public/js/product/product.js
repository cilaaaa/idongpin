/**
 * Created by xkl on 2016/7/25.
 */
$('#sel_company').change(function(){
    showLoading();
    var UrlStr='http://114.55.150.226:8080/product/list?companyid='+$(this).val();
    window.location.href=UrlStr;
});
