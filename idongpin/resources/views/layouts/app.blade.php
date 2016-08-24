<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{url('favicon.png')}}" type="image/png">
    <title>@yield('title')i冻品</title>
    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{url('css/public/public.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/public/carousel.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/public/searchTool.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/public/footer.css')}}">
    @yield('css')
</head>
<body>
@yield('viwepager')
    <div class="main">
        <div class="loginInfo">
            <div class="topBar">
                <div class="welcome">
                    <span class="welcomeTo">欢迎来到i冻品</span>
					<span class="login">
                        @if(Auth::guest())
                        <a class="loginBtn" href="{{url('login')}}">登录</a>
                        <span>|</span>
                        <a href="{{url('register')}}">注册</a>
                        @else
                        <span class="manage">
                            <a href="{{url('/user')}}" class="userName">{{ Auth::user()->user_name }}的i冻品</a>
                            <a href="{{url('logout')}}" class="loginOut">【注销】</a>
                        </span>
                        @endif
					</span>
                </div>
                <div class="help">
                    <a href="{{url('/')}}">i冻品首页</a>
                    <span>|</span>
                    <a href="">在线客服</a>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <div class="searchTool">
            <div>
                <div class="searchContainer">
                    <div class="searchBar">
                        <div class="logo" onclick="window.location.href='{{url('/')}}'">
                            <img src="{{url('images/idongpinLogo.png')}}">
                            <div class="nature">安全，便宜的冻品平台</div>
                        </div>
                        <div class="search">
                            <div class="classifiedSearch" id="classifiedSearch">
                                @if(isset($_GET['searchType']))
                                    @if($_GET['searchType'] =='company')
                                        <span class="classified">冻品</span>
                                        <span class="classified searchActive">商铺</span>
                                    @else
                                        <span class="classified searchActive">冻品</span>
                                        <span class="classified">商铺</span>
                                    @endif
                                @else
                                    <span class="classified searchActive">冻品</span>
                                    <span class="classified">商铺</span>
                                @endif

                            </div>
                            <div class="searchKind">
                                <div>
                                    <span id="searchItem">冻品</span>
                                    <img id="dropDown" src="{{url('images/index/dropDown.png')}}">
                                </div>
                                <ul class="kindOption">
                                    <li>商铺</li>
                                    <li>冻品</li>
                                </ul>
                            </div>
                            <div class="searchBox">
                                <form method="get" action="{{url('search')}}">
                                    <input class="searchInput" name="keyword" value="{{isset($_GET['keyword'])?$_GET['keyword']:""}}" type="text" placeholder="输入产品名称/商铺名称">
                                    @if(isset($_GET['searchType']))
                                        @if($_GET['searchType']== 'company')
                                            <input type="hidden" name="searchType" value="company" id="searchType">
                                        @else
                                            <input type="hidden" name="searchType" value="product" id="searchType">
                                        @endif
                                    @else
                                        <input type="hidden" name="searchType" value="product" id="searchType">
                                    @endif

                                    <input type="submit" class="topSearchBtn" value="搜索">
                                </form>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
                <div class="nav">
                    <div class="navTtl">冻品导航<img id="showMenu" src="{{url('images/pulldownbtn.png')}}"></div>
                    <div class="navMenu">
                        <ul>
                            @if(starts_with(url($_SERVER['REQUEST_URI']),"http://www.idongpin.com.cn/search"))
                                    <li><a class="menu" href="{{url('/')}}">首页</a></li>
                                @if($_GET['searchType'] == 'company')
                                    <li><a class="menu" href="{{url('/search?searchType=product&page=1')}}">分类</a></li>
                                @else
                                    <li><a class="menu menuActive" href="{{url('/search?searchType=product&page=1')}}">分类</a></li>
                                @endif
                                    <li><a class="menu" href="{{url('/groupbuy')}}">抛货</a></li>
                                    <li><a class="menu" href="{{url('/findorder?page=1')}}">找订单</a></li>
                            @elseif(starts_with(url($_SERVER['REQUEST_URI']),"http://www.idongpin.com.cn/groupbuy"))
                                    <li><a class="menu" href="{{url('/')}}">首页</a></li>
                                    <li><a class="menu" href="{{url('/search?searchType=product&page=1')}}">分类</a></li>
                                    <li><a class="menu menuActive" href="{{url('/groupbuy')}}">抛货</a></li>
                                    <li><a class="menu" href="{{url('/findorder?page=1')}}">找订单</a></li>
                            @elseif(starts_with(url($_SERVER['REQUEST_URI']),"http://www.idongpin.com.cn/findorder"))
                                    <li><a class="menu" href="{{url('/')}}">首页</a></li>
                                    <li><a class="menu" href="{{url('/search?searchType=product&page=1')}}">分类</a></li>
                                    <li><a class="menu" href="{{url('/groupbuy')}}">抛货</a></li>
                                    <li><a class="menu menuActive" href="{{url('/findorder?page=1')}}">找订单</a></li>
                             @else
                                    <li><a class="menu menuActive" href="{{url('/')}}">首页</a></li>
                                    <li><a class="menu" href="{{url('/search?searchType=product&page=1')}}">分类</a></li>
                                    <li><a class="menu" href="{{url('/groupbuy')}}">抛货</a></li>
                                    <li><a class="menu" href="{{url('/findorder?page=1')}}">找订单</a></li>
                            @endif
                        </ul>
                    </div>
                    <div class="menubtn">
                        <div class="purcher">我要买</div>
                        <div class="entering"><a href="{{url('/register?from=entering')}}">我要入驻</a></div>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
        <div class="QRWindow">
            <div class="idongpinQR">
                <div class="close_1">
                    <img src="{{url('images/close.png')}}">
                </div>
                <div class="QR">
                    <img src="{{url('images/QR.png')}}">
                    <div class="notice">
                        <div class="noticeTop">请用微信扫二维码</div>
                        <div class="noticeBottom">入驻平台获取商品咨询</div>
                    </div>
                </div>
            </div>
        </div>
        
    @yield('content')
    </div>
    <footer class="footer">
        <div>
            <div class="otherLink">
                <a href="">关于我们</a>
                <span>|</span>
                <a href="">公司荣耀</a>
                <span>|</span>
                <a href="">联系方式</a>
                <span>|</span>
                <a href="">客服中心</a>
                <span>|</span>
                <a href="javascript:void(0)" onclick="SetHome('http://www.idongpin.com.cn');">设为首页</a>
                <span>|</span>
                <a href="javascript:void(0)" onclick="AddFavorite('http://www.idongpin.com.cn','i冻品')">加为收藏</a>
                <span>|</span>
                <a href="">网站导航</a>
            </div>
            <div class="copyright">
                <span>© 2016-2026 idongpin.com.cn 版权所有</span>
            </div>
        </div>
    </footer>
    <script type="text/javascript" src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
    <script type="text/javascript" src="{{url('js/header.js')}}"></script>
    @yield('javascript')
</body>
</html>
