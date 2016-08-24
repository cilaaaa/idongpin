<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="/imgs/avatar/u1.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{auth()->user()->name}}</p>
                <!-- Status -->
                <a><i class="fa fa-circle text-success"></i> 在线</a>
            </div>
        </div>

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="搜索...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">栏目导航</li>
            <!-- Optionally, you can add icons to the links -->
            @if(auth()->user()->user_type == 'admin')
            <li class="{{ Route::is('company::index') ? 'active' : '' }}"><a href="{{url('company')}}"><i class="fa fa-dashboard"></i> <span>商户管理</span></a></li>
            @endif
            <li class="{{ Route::is('order::frame') ? 'active' : '' }}"><a href="{{url('order')}}"><i class="fa fa-dashboard"></i> <span>订单管理</span></a></li>
            <li class="product_manage"><a><i class="fa fa-dashboard"></i> <span>商品管理</span></a></li>
            <ul class="second-menu">
                <li class="{{ Route::is('product::index') ? 'active' : '' }}"><a href="{{url('product')}}"><i class="fa fa-dashboard"></i> <span>信息管理</span></a></li>
                @if(auth()->user()->user_type == 'admin')
                <li class="{{ Route::is('product::type') ? 'active' : '' }}"><a href="{{url('navigation')}}"><i class="fa fa-dashboard"></i> <span>类型管理</span></a></li>
                <li class="{{ Route::is('product::field') ? 'active' : '' }}"><a href="{{url('field')}}"><i class="fa fa-dashboard"></i> <span>属性管理</span></a></li>
                <li class="{{ Route::is('product::madein') ? 'active' : '' }}"><a href="{{url('madein')}}"><i class="fa fa-dashboard"></i> <span>产地管理</span></a></li>
                @endif
            </ul>
            @if(auth()->user()->user_type == 'admin')
            <li class="{{ Route::is('user::index') ? 'active' : '' }}"><a href="{{url('user')}}"><i class="fa fa-dashboard"></i> <span>用户管理</span></a></li>
            @endif
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>