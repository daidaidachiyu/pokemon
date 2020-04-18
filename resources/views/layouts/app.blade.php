<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="images/logo.ico" rel="icon" type="image/x-ico">

    <link rel="stylesheet" href="../layui/css/layui.css">
    <link rel="stylesheet" href="../css/type.css">
    <link rel="stylesheet" href="../css/rainbow.css">
    <script src="../layui/layui.all.js"></script>
    <script src="../layui/layui.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <style>
        body{background: #303030;}
    </style>
</head>
<body>
    <div class="layui-layout layui-layout-admin">
        <div class="layui-header">
            <div class="layui-logo"><a style="color:#eee" href="/"><img src="/images/logo.png" class="layui-nav-img">POKEMON</a></div>
            <ul class="layui-nav layui-layout-right" lay-filter="" id="element">
                <li class="layui-nav-item" lay-unselect="">
                <a href="javascript:;"><img src="/images/logo.png" class="layui-nav-img">{{ Auth::user()->name }}</a>
                <dl class="layui-nav-child">
                    <dd><a id="logout" href="#"
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">退了</a></dd>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </dl>
                </li>
            </ul>   
        </div>
    </div>
                
    <div class="layui-main">
        @yield('content')
    </div>
</body>
<script>
    layui.use('element', function(){
        var element = layui.element;
        
    });

    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' }
    });
</script>



</html>
