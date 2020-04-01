<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="../layui/css/layui.css">
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
            <div class="layui-logo">POKEMON</div>
            <ul class="layui-nav layui-layout-right" lay-filter="" id="element">
                <li class="layui-nav-item"><a href="">最新活动</a></li>
                <li class="layui-nav-item layui-this"><a href="">产品</a></li>
                <li class="layui-nav-item"><a href="">大数据</a></li>
                <li class="layui-nav-item" lay-unselect="">
                <a href="javascript:;"><img src="//t.cn/RCzsdCq" class="layui-nav-img">{{ Auth::user()->name }}</a>
                <dl class="layui-nav-child">
                    <dd><a href="javascript:;">修改信息</a></dd>
                    <dd><a href="javascript:;">安全管理</a></dd>
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
                
        
    @yield('content')
</body>
<script>
    layui.use('element', function(){
        var element = layui.element;
        
    });
</script>



</html>
