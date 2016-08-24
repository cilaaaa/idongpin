<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <meta name="description" content=@yield('description')>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="Cila">
    <link href="//libs.baidu.com/fontawesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
    <link href="http://libs.baidu.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
    @yield('css')
</head>
<body>

@yield('navigation')

<div class="container-fluid">
    @yield('content')
</div>


<script src="//libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
<script src="//libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
@yield('js')
</body>
</html>