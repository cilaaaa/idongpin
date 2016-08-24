/**
 * Created by xkl on 2016/7/22.
 */
$(document).ready(function(){
    $('#Form .Item input').attr('disabled',true);
});
$('.updating').click(function(){
    $('#Form .Item input').not('.company_id').attr('disabled',false);
    $('.saving,.canceling').css('display','block');
    $(this).css('display','none');
    $('.deleting').css('display','none');
});
$('.canceling').click(function(){
    $('#Form .Item input').attr('disabled',true);
    $('.updating,.deleting').css('display','block');
    $(this).css('display','none');
    $('.saving').css('display','none');
});
$('.goback').click(function(){
    window.location.href="http://114.55.150.226:8080/order/orderlist";
});