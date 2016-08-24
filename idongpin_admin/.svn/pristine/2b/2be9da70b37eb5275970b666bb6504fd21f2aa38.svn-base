@extends('admin.layouts.sublayout')
@section('title')商铺详情
@stop
@section('css')
    <link href="{{url('css/company/company_manage.css')}}" rel="stylesheet">
@endsection
@section('navigation')
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="{{ route('company::list') }}" class="navbar-brand" onclick="showLoading()">
                    商铺管理
                </a>
                <span class="tag">>></span>
            </div>
            <ul class="nav navbar-nav">
                <li class="{{ Route::is('company::list') ? 'active' : '' }}">
                    <a href="{{ route('company::list') }}" onclick="showLoading()">
                        商铺列表
                    </a>
                </li>
                <li>
                    <span class="tag">>></span>
                </li>

                <li class="{{ Route::is('company::item') ? 'active' : '' }}">
                    <a href="{{ route('company::item') }}" onclick="showLoading()">
                        商铺详情
                    </a>
                </li>
            </ul>
        </div>
    </nav>
@stop
@section('content')
    <div class="updateForm" id="Form">
        <div class="formHeader">
            <input type="hidden" id="companyid" name="companyid" value="{{$_GET['companyid']}}">
            <span class="formTitle">企业详细信息</span>
            <span class="btn btn-info goback"><i class="glyphicon glyphicon-chevron-left"></i>返回</span>
            <span class="btn btn-danger  deleting"><i class="glyphicon glyphicon-trash" ></i>删除</span>
            <span class="btn btn-success updating"><i class="glyphicon glyphicon-book"></i>编辑</span>
            <span class="btn btn-warning  canceling"><i class="glyphicon glyphicon-remove"></i>取消</span>
            <span class="btn btn-success saving" ><i class="glyphicon glyphicon-floppy-save"></i>保存</span>
        </div>
        <div style="padding: 15px">
            <form class="form-horizontal form1" name="form1" id="form1" action="" method="">
                <div class="form-group">
                    <label class="col-sm-4  control-label">公司ID：</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control company_id"  name="company_id" placeholder="公司ID号" value="{{isset($company->company_id)?$company->company_id:''}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">公司类型：</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control company_type" name="company_type" placeholder="公司类型" value="{{isset($company->company_type)?$company->company_type:''}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">成立时间：</label>
                    <div class="col-sm-8">
                        <input type="text" name="establishment_date" class="form-control establishment_date" placeholder="成立时间" {{isset($company->establishment_date)?$company->establishment_date:''}}>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">公司名称：</label>
                    <div class="col-sm-8">
                        <input type="text" name="company_name" class="form-control company_name" placeholder="请输入公司名称" value="{{isset($company->company_name)?$company->company_name:''}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">公司别名：</label>
                    <div class="col-sm-8">
                        <input type="text" name="company_aliase" class="form-control company_aliase" placeholder="请输入公司别名" value="{{isset($company->company_aliase)?$company->company_aliase:''}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">公司地址：</label>
                    <div class="col-sm-8">
                        <input type="text" name="company_address" class="form-control company_address" placeholder="请输入公司地址" value="{{isset($company->company_address)?$company->company_address:''}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">主营行业：</label>
                    <div class="col-sm-8">
                        <input type="text" name="company_major" class="form-control company_major" placeholder="请输入公司主营行业" value="{{isset($company->company_major)?$company->company_major:''}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">主营品牌：</label>
                    <div class="col-sm-8">
                        <input type="text" name="company_brand" class="form-control company_brand" placeholder="请输入公司主营品牌" value="{{isset($company->company_brand)?$company->company_brand:''}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">主营产品：</label>
                    <div class="col-sm-8">
                        <input type="text" name="company_product" class="form-control company_product" placeholder="请输入公司主营产品" value="{{isset($company->company_product)?$company->company_product:''}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">金牌企业：</label>
                    <div class="col-sm-8">
                        <input type="text" name="advanced" class="form-control advanced" placeholder="是否为金牌企业" value="{{isset($company->company_advanced)?$company->company_advanced:''}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">推荐指数：</label>
                    <div class="col-sm-8">
                        <input type="text" name="recommendation" class="form-control recommendation" placeholder="企业推荐指数" value="{{isset($company->company_recommendation)?$company->company_recommendation:''}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">注册资本：</label>
                    <div class="col-sm-8">
                        <input type="text" name="registered_capital" class="form-control registered_capital" placeholder="请输入企业注册资本" value="{{isset($company->registered_capital)?$company->registered_capital:''}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">企业联系人：</label>
                    <div class="col-sm-8">
                        <input type="text" name="company_linkman" class="form-control company_linkman" placeholder="请输入公司联系人" value="{{isset($company->company_linkman)?$company->company_linkman:''}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">联系人手机号：</label>
                    <div class="col-sm-8">
                        <input type="text" name="company_mobile" class="form-control company_mobile" placeholder="请输入联系人手机号" value="{{isset($company->company_mobile)?$company->company_mobile:''}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">企业固定电话：</label>
                    <div class="col-sm-8">
                        <input type="text" name="company_phone" class="form-control company_phone" placeholder="请输入企业固定电话" value="{{isset($company->company_phone)?$company->company_phone:''}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">联系人职称：</label>
                    <div class="col-sm-8">
                        <input type="text" name="company_linkman_extend" class="form-control company_linkman_extend" placeholder="请输入企业联系人职称" value="{{isset($company->company_linkman_extend)?$company->company_linkman_extend:''}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">公司主页地址：</label>
                    <div class="col-sm-8">
                        <input type="text" name="company_website" class="form-control company_website" placeholder="请输入企业主页地址" value="{{isset($company->company_website)?$company->company_website:''}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">公司邮编地址：</label>
                    <div class="col-sm-8">
                        <input type="text" name="company_zipcode" class="form-control company_zipcode" placeholder="请输入企业邮编地址" value="{{isset($company->company_zipcode)?$company->company_zipcode:''}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">公司简介：</label>
                    <div class="col-sm-8">
                        <textarea class="form-control company_desc" rows="4" name="company_desc" placeholder="请输入您公司的简介信息..." value="{{isset($company->company_desc)?$company->company_desc:''}}"></textarea>
                    </div>
                </div>
            </form>
            <br style="clear:both;">
        </div>
        <div class="imagesManage">
            <div class="image_header">
                <span class="title">图片管理</span>
                <div class="btn-group pull-right">
                    <button type="button" class="btn btn-primary btn-md allcheck" data-allcheck=0><i class="fa fa-check-square-o">全选</i></button>
                    <button type="button" class="btn btn-primary btn-md addition"><i class="fa fa-folder-open"></i> 添加</button>
                    <button type="button" class="btn btn-primary btn-md delete"><i class="fa fa-trash-o"></i>删除</button>
                </div>
            </div>
            <br style="clear: both;">
            <div class="imageContent">
                <div class="imginfo">
                    <img src="{{url('/images/image.jpg')}}">
                    <div class="over"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="imgadd">
        <div class="head">
            <span class="title">添加图片</span>
            <span class="delete" onclick="removeImgAdd();"><i class="glyphicon glyphicon-remove"></i></span>
        </div>
        <div class="addbtn">
            <form action="{{url('company/img/upload')}}" method="post" name="imgForm" enctype="multipart/form-data">
                {{csrf_field()}}
                <input type="hidden" name="companyid" id="companyid" value="{{$_GET['companyid']}}">
                <input type="hidden" name="imgtype" id="imgtype" value="cursor">

                <button type="button" class="btn btn-success" style="width: 100px;height: 30px;margin-right: 10px;">
                    上传图片
                    <input type="file" name="images[]" id="imagesUpload" multiple  style="opacity:0; filter:alpha(opacity=0);width: 100px;height: 30px; position: absolute;right: 10px;top: 38px;" />
                </button>
            </form>
        </div>
        <div class="imgContent">

        </div>
        <div class="foot"><span type="button" class="btn btn-success submit" id="submit">提交</span></div>
    </div>
@stop
@section('js')
    <script src="{{url('js/company/companyDetail.js')}}"></script>
    <script src="{{url('js/public/imgUpdateFile.js')}}"></script>
    @include('admin.layouts.loading')
    <script type="text/javascript">
        var params = {
            fileInput: $("#imagesUpload").get(0),
            upButton: $("#submit").get(0),
            url:'{{url('company/img/upload')}}',
            filter: function(files) {
                var arrFiles = [];
                for (var i = 0, file; file = files[i]; i++) {
                    if (file.type.indexOf("image") == 0) {
                        if (file.size >= 512000) {
                            alert('您这张"'+ file.name +'"图片大小过大，应小于500k');
                        } else {
                            arrFiles.push(file);
                        }
                    } else {
                        alert('文件"' + file.name + '"不是图片。');
                    }
                }
                return arrFiles;
            },
            onSelect: function(files) {
                    if (files) {
                        var obj=document.getElementById('imagesUpload');
                        appendImg(obj);
                        $(".deleItem").delegate("",'click',function(){
                            ZXXFILE.funDeleteFile(files[parseInt($(this).attr("data-index"))]);
                            return false;
                        });
                    } else {
                        alert('请选择您要上传的图片!');
                    }
            },
            onDelete: function(file) {
                $('.deleItem').each(function(){
                    if($(this).attr('data-index') ==file.index){
                        $(this).parent().remove();
                    }
                });
            },
//            onProgress: function(file, loaded, total) {
//                var eleProgress = $("#uploadProgress_" + file.index), percent = (loaded / total * 100).toFixed(2) + '%';
//                eleProgress.show().html(percent);
//            },
            onSuccess: function(file,responseText) {
                console.log(responseText);
                alert('上传成功!');
                alert("图片"+file.name+"上传成功!");

            },
            onFailure: function(file) {
                alert("图片"+file.name+"上传失败!");
            },
            onComplete: function() {
//               window.location.reload();
            }
        };
        ZXXFILE = $.extend(ZXXFILE, params);
        ZXXFILE.init();

        $('.imginfo').delegate("","click",function(){
            if($(this).find('.icon').length == 0){
                $(this).find('img').before('<span class="icon"><i class="glyphicon glyphicon-ok"></i></span>');
            }else{
                $(this).find('.icon').remove();
            }
        });
        $(".allcheck").delegate("","click",function(){
            if($(this).attr('data-allcheck') == 0){
                $(this).attr('data-allcheck',1);
                $(this).find("i").text('取消全选');
                $('.imginfo').each(function(){
                    if($(this).find('.icon').length == 0){
                        $(this).find('img').before('<span class="icon"><i class="glyphicon glyphicon-ok"></i></span>');
                    }
                });
            }else{
                $(this).attr('data-allcheck',0);
                $(this).find("i").text('全选');
                $('.imginfo').each(function(){
                    if($(this).find('.icon').length > 0){
                        $(this).find('.icon').remove();
                    }
                });
            }
        });
        function removeImg(obj){
            var img = document.getElementById("imagesUpload").files;
            var imgName = $(obj).attr('data-imgName');
            for(var i =0 ; i<document.getElementById("imagesUpload").files.length ; i++)
            {
                if(imgName == img[i].name){

                }
            }
        }
        function appendImg(obj){
            for(var i = 0 ; i < obj.files.length ; i++)
            {
                $('.imgContent').append(' <div class="imgItem"> <img src="'+window.URL.createObjectURL(obj.files[i])+'"><span class="deleItem" onclick="removeImg(this);" data-imgName="'+obj.files[i].name+'" data-index="'+i+'"><i class="glyphicon glyphicon-remove"></i></span><span class="imgName">'+obj.files[i].name+'</span><div class="over"></div> </div>');
            }
        }
        function removeImgAdd(){
            $('.imgadd').hide();
        }
        $('.addition').delegate("",'click',function(){
            $('.imgadd').show();
        });
    </script>
@endsection