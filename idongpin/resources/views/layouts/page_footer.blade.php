<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{url('favicon.png')}}" type="image/png">
    <title>@yield('title')i冻品</title>
    <link rel="stylesheet" type="text/css" href="{{url('css/auth/login_footer.css')}}">
    @yield('css')
</head>
<body>
@yield('content')
<div id="footer" class='footer'>
    <div class="flag">
        <ul class="link">
            <li><a href="#">关于我们</a></li>
            <li>|</li>
            <li><a href="#">公司荣耀</a></li>
            <li>|</li>
            <li><a href="#">联系方式</a></li>
            <li>|</li>
            <li><a href="#">客服中心</a></li>
            <li>|</li>
            <li><a href="#">设为首页</a></li>
            <li>|</li>
            <li><a href="#">加为收藏</a></li>
            <li>|</li>
            <li><a href="#">网站导航</a></li>
        </ul>
        <div class="copyright">&copy; 2016-2026 idongpin.com.cn 版权所有</div>
    </div>
</div>
<script type="text/javascript" src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
@yield('javascript')
</body>
</html>
