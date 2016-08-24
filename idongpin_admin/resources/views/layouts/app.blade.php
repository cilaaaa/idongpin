<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') | i冻品后台管理系统</title>
    <link href="//libs.baidu.com/fontawesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
    <link href="http://libs.baidu.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{url('dist/css/load/load.css')}}" rel="stylesheet">
    <script>
        var _hmt = _hmt || [];
        (function() {
            var hm = document.createElement("script");
            hm.src = "//hm.baidu.com/hm.js?1658f80864b738322165d3ebf59d8b16";
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(hm, s);
        })();
    </script>
</head>
<body id="app-layout">
<div id="loading">
    <div id="loading-center">
        <div id="loading-center-absolute">
            <div class="object" id="object_four"></div>
            <div class="object" id="object_three"></div>
            <div class="object" id="object_two"></div>
            <div class="object" id="object_one"></div>
        </div>
    </div>
</div>
<div class="wrapper">
    <!-- Main Header -->
    @include('admin.layouts.mainHeader')
    <!-- Left side column. contains the logo and sidebar -->
    @include('admin.layouts.mainSidebar')
</div>
<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        {{--<h1>
          @yield('pageHeader')
          <small>@yield('pageDesc')</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="/admin"><i class="fa fa-dashboard"></i> 控制面板</a></li>
          <li class="active">Here</li>
        </ol>--}}
        <h6>
            @yield('navigation')
        </h6>
    </section>

    <!-- Main content -->
    <section class="content">

    @yield('content')
    <!-- Your Page Content Here -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- JavaScripts -->
<script src="//libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
<script src="//libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>

<script src="{{url('/dist/js/common.js')}}"></script>
@yield('js')
@include('admin.layouts.mainFooter')
</body>
</html>
