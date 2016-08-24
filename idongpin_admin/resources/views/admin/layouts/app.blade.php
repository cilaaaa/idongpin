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
    <link rel="stylesheet" href="{{url('/libs/ionicons/2.0.1/css/ionicons.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{url('/dist/css/AdminLTE.min.css')}}">

    <link rel="stylesheet" href="{{url('/dist/css/skins/skin-blue.min.css')}}">
    <link href="{{url('dist/css/load/load.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{url('css/sidebar.css')}}">
    {{--<script>--}}
    {{--var _hmt = _hmt || [];--}}
    {{--(function() {--}}
    {{--var hm = document.createElement("script");--}}
    {{--hm.src = "//hm.baidu.com/hm.js?1658f80864b738322165d3ebf59d8b16";--}}
    {{--var s = document.getElementsByTagName("script")[0];--}}
    {{--s.parentNode.insertBefore(hm, s);--}}
    {{--})();--}}
    {{--</script>--}}
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <!-- Main Header -->
    @include('admin.layouts.mainHeader')
            <!-- Left side column. contains the logo and sidebar -->
    @include('admin.layouts.mainSidebar')
            <!-- Content Wrapper. Contains page content -->

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        {{--<section class="content-header">--}}
        {{--<h1>--}}
        {{--@yield('pageHeader')--}}
        {{--<small>@yield('pageDesc')</small>--}}
        {{--</h1>--}}
        {{--<ol class="breadcrumb">--}}
        {{--<li><a href="/admin"><i class="fa fa-dashboard"></i> 控制面板</a></li>--}}
        {{--<li class="active">Here</li>--}}
        {{--</ol>--}}

        {{--</section>--}}

                <!-- Main content -->
        <section class="content">

            @yield('content')
                    <!-- Your Page Content Here -->

        </section>
        <!-- /.content -->

    </div>
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
            <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
            <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <!-- Home tab content -->
            <div class="tab-pane active" id="control-sidebar-home-tab">
                <h3 class="control-sidebar-heading">Recent Activity</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript::;">
                            <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                                <p>Will be 23 on April 24th</p>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

                <h3 class="control-sidebar-heading">Tasks Progress</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript::;">
                            <h4 class="control-sidebar-subheading">
                                Custom Template Design
                                <span class="label label-danger pull-right">70%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

            </div>
            <!-- /.tab-pane -->
            <!-- Stats tab content -->
            <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
            <!-- /.tab-pane -->
            <!-- Settings tab content -->
            <div class="tab-pane" id="control-sidebar-settings-tab">
                <form method="post">
                    <h3 class="control-sidebar-heading">General Settings</h3>

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Report panel usage
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Some information about this general settings option
                        </p>
                    </div>
                    <!-- /.form-group -->
                </form>
            </div>
            <!-- /.tab-pane -->
        </div>
    </aside>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<!-- JavaScripts -->
<script src="//libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
<script src="//libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<script src="{{url('/dist/js/app.min.js')}}"></script>
<script src="{{url('/dist/js/common.js')}}"></script>

<script>
    $('.product_manage').click(function(){
        $('.second-menu').toggle();
    });
</script>
@yield('js')
@include('admin.layouts.mainFooter')
</body>
</html>
