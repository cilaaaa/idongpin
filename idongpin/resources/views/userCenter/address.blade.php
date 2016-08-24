@extends('layouts.user_center')
@section('csssheet')
    <link rel="stylesheet" type="text/css" href="{{url('css/userCenter/address.css')}}">
@endsection

@section('rightSideContent')
    <div class="infoMain">
        <div class="displayBlock">
            <div class="infoTags">
                <span class="tagsName" >> 收货地址</span>
                <div class="operationAll"><a class="adda"><img src="{{url('images/userCenter/editAddress.png')}}"><span>新增收货地址</span></a></div>
            </div>
            <div class="infoDetails">
                <div class="details">
                    <table class="orderTab">
                        <thead>
                        <tr>
                            <td class="chooseAll aCheckbox "></td>
                            <td class="aName">收货人姓名</td>
                            <td class="aAddress">地址</td>
                            <td class="aCount">电话</td>
                            <td class="aStatus">是否默认</td>
                            <td class="operation">操作</td>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="aCheckbox"><img type="checkbox" src="{{url('images/userCenter/btn_2_1.png')}}"></td>
                            <td class="aName">
                                <div class="displayT">
                                    <span>王先生</span>
                                </div>
                                <div class="displayF">
                                    <input class="inputName">
                                </div>
                            </td>
                            <td class="aAddress">
                                <div  class="displayT">
                                    <span>广中西路777弄江裕大厦1205室挨冻品公司</span>
                                </div>
                                <div class="displayF">
                                    <input class="inputAddress">
                                </div>
                            </td>
                            <td class="aCount">
                                <div  class="displayT">
                                    <span>18217148408</span>
                                </div>
                                <div class="displayF">
                                    <input class="inputCount">
                                </div>
                            </td>
                            <td class="aStatus">
                                <div  class="displayT">
                                    <input type="radio" checked disabled><span>默认</span>
                                </div>
                                <div class="displayF">
                                    <img type="checkbox" src="{{url('images/userCenter/btn_2_1.png')}}"><span>默认</span>
                                </div>
                            </td>
                            <td class="operation">
                                <div  class="displayT">
                                    <a class="edit">编辑</a><a class="delete">删除</a>
                                </div>
                                <div  class="displayF">
                                    <a class="displayFConfirm">确定</a><a class="displayFCancel">取消</a>
                                </div>

                            </td>
                        </tr>
                        <tr>
                            <td class="aCheckbox"><img type="checkbox" src="{{url('images/userCenter/btn_2_1.png')}}"></td>
                            <td class="aName">
                                <div class="displayT">
                                    <span>徐晓曼</span>
                                </div>
                                <div class="displayF">
                                    <input class="inputName">
                                </div>
                            </td>
                            <td class="aAddress">
                                <div  class="displayT">
                                    <span>环球金融中心</span>
                                </div>
                                <div class="displayF">
                                    <input class="inputAddress">
                                </div>
                            </td>
                            <td class="aCount">
                                <div  class="displayT">
                                    <span>18217146101</span>
                                </div>
                                <div class="displayF">
                                    <input class="inputCount">
                                </div>
                            </td>
                            <td class="aStatus">
                                <div  class="displayT">
                                    <input type="radio" disabled><span>默认</span>
                                </div>
                                <div class="displayF">
                                    <img type="checkbox" src="{{url('images/userCenter/btn_2_1.png')}}"><span>默认</span>
                                </div>
                            </td>
                            <td class="operation">
                                <div  class="displayT">
                                    <a class="edit">编辑</a><a class="delete">删除</a>
                                </div>
                                <div  class="displayF">
                                    <a class="displayFConfirm">确定</a><a class="displayFCancel">取消</a>
                                </div>

                            </td>
                        </tr>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
        <div class="displayNone">
            <div class="infoTags">
                <a class="addAddress" href="{{ url('user/address') }}">> 收货地址</a><span>> 新增收货地址</span>
            </div>
            <div class="infoDetails">
                <form action="" method="post">
                    <div class="noneItem">
                        <span class="Required">*</span>
                        <span class="ItemName">所在地区：</span>
                        <div id="city_china_val" class="city_china_val">
                            <div>
                                <select class="province cxselect" data-value="上海市"  disabled="disabled"></select>
                                <select class="city cxselect" data-value="浦东新区"  disabled="disabled"></select>
                                <select class="area cxselect"   disabled="disabled"></select>
                            </div>
                        </div>
                    </div>
                    <div class="noneItem">
                        <span class="Required">*</span>
                        <span class="ItemName">街道地址：</span>
                        <input type="text" class="inputAddress">
                    </div>
                    <div class="noneItem">
                        <span class="Required">*</span>
                        <span class="ItemName">收件人姓名：</span>
                        <input type="text" class="inputName">
                        <div class="sexSelect">
                            <input type="radio" name="sex" checked value="1"><span>先生</span>
                        </div>
                        <div class="sexSelect">
                            <input type="radio" name="sex" value="0"><span>女士</span>
                        </div>
                    </div>
                    <div class="noneItem">
                        <span class="Required">*</span>
                        <span class="ItemName">手　　机：</span>
                        <input type="text" class="inputPhone">
                    </div>
                    <div class="noneItem">
                        <span class="Required "></span>
                        <img class="defaultImg" src="{{url('images/userCenter/btn_2_1.png')}}">
                        <span class="default" >设为默认地址</span>
                    </div>
                    <div class="opera">
                        <span class="operaConfirm">确　定</span>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@section('js')
    <script type="text/javascript" src="{{url('js/PublicDomain.js')}}"></script>
    <script type="text/javascript" src="{{url('js/userCenter/address.js')}}"></script>
    <script type="text/javascript" src="{{url('js/userCenter/jquery.cxselect.min.js')}}"></script>
    <script>
        $.cxSelect.defaults.url = '{{url('js/userCenter/cityData.min.json')}}';
        $('#city_china_val').cxSelect({
            selects: ['province', 'city', 'area'],
            nodata: 'none'
        });
        $('.operaConfirm').click(function(){
            var address = $('.province').val() + $('.city').val() + $('.area').val() + $('.inputAddress').val();
            $.ajax({
                url: host+'/user/address/add',
                type: 'post',
                cache: 'false',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    address: address,
                    receiver: $('.inputName').val(),
                    phone: $('.inputPhone').val(),
                    sex: $('.sex').val()
                },
                success: function (data) {
                    if (data.msg == 'success') {
                        window.location.href = '{{url('/user/address')}}';
                    }
                },
                error: function (data) {
                    console.log(data);
                }
            });
        });
    </script>
@endsection