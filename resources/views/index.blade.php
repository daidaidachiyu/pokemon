@extends('layouts.app')

@section('content')
    <div class="layui-row  layui-col-space20">
        

            <!-- 左侧 -->
            <div class="layui-col-md7">
                <!-- 封面轮播 -->
                <div class="layui-row">
                    <div class="layui-carousel" id="carousel">
                        <div carousel-item>
                            <div><img src="/images/index3.jpeg" height="100%" width="100%"></div>
                            <div><img src="/images/index1.jpeg" height="100%" width="100%"></div>
                            <div><img src="/images/index2.jpg" height="100%" width="100%"></div>
                        </div>
                    </div>
                </div>

                <div class="layui-row" style="color:blanchedalmond;background-color:rgb(113, 156, 212)">
                    <div class="layui-col-md4">
                        <img src="/images/logo.png" height="95%" width="95%">
                    </div>

                    <!-- 抽奖按钮 -->
                    <div class="layui-col-md8">
                        <fieldset class="layui-elem-field layui-field-title" style="margin-top: 15px;">
                            <legend>
                                <button id = "extract" class="layui-btn layui-btn-lg layui-btn-danger layui-btn-radius">抽取一个精灵球吧</button>
                                
                                您还有{{$coin}}个硬币
                            </legend>
                        </fieldset>
                    
                    <!-- 信息列表 -->
                        <ul>
                            <li>你可以花费一枚硬币来抽取一只可爱的宝可梦<hr></li>
                            <li>在宝可梦页面 你可以查看宝可梦详情 并使用各种道具<hr></li>
                            <li>宝可梦可以在某些条件下进化 收集更多的宝可梦吧<hr></li>
                        </ul>


                    </div>
        
                </div>
                
            </div>
            <!-- 抽取end -->

            <!-- 宝可梦收藏 -->
            <div class="layui-col-md5">
        
                <div class="layui-card">
                    <div class="layui-card-header">你的宝可梦</div>
                    <div class="layui-card-body">

                        <div style="padding: 5px; background-color: rgb(113, 156, 212);">
                            <div class="layui-row layui-col-space">
                                @for ($i = 0; $i < 12; $i++)
                                <div class="layui-col-md3">
                                <div class="layui-card">
                                    <div class="layui-card-header">
                                        @if(isset($pokemon[$i]))
                                        {{$pokemon[$i]['name']}}
                                        @endif
                                    </div>
                                    <div class="layui-card-body">
                                        @if(isset($pokemon[$i]))
                                            <a href="/pokemon/{{$pokemon[$i]->id}}">
                                                <img src="{{$pokemon[$i]->races->image_url}}" height="80" width="80">
                                            </a>
                                            @else
                                        <img src="images/Null.png" height="80" width="80">
                                        @endif  
                                        
                                    </div>
                                </div>
                                </div>
                                @endfor

                            </div>
                        </div>

                    </div>
                    <div class="layui-card-body">
                        <div id="page" style="text-align: center">{{ $pokemon->links() }}</div>  
                    </div>
                </div>
            </div>
            <!-- 宝可梦收藏end -->    
    
    </div>

    <script>
    
    //抽取按钮单击事件
    $('#extract').on('click', function(){
        layer.confirm('确认抽取宝可梦?', {
            title:'抽取',
            btn: ['确认','取消']
            },function(){
            $.ajax({
                url:'/extract',
                type:'post', 
                success:function(p) {
                    if(p['suc']){
                        layer.open({
                            title:p['race']['name'],
                            content: "<img src=storage/"+p['race']['image']+" height='100' width='100'>恭喜你获得了"+p['race']['name'],
                            end:function(){
                                location.reload();
                            }
                        });
                    }else{
                        layer.msg('硬币不足'); 
                    }
                }
            })
        })
        
    });

    //宝可梦分页
    layui.use('laypage', function(){
        var laypage = layui.laypage;

        //执行一个laypage实例
        laypage.render({
            elem: 'page' //注意，这里的 test1 是 ID，不用加 # 号
            ,count: '{{$pokemon->total()}}' //数据总数，从服务端得到
            ,limit:'{{$pokemon->perPage()}}'
            ,curr:'{{$pokemon->currentPage()}}'
            ,theme: '#719CD4'
            ,groups:3
            ,jump: function(obj, first){
                //obj包含了当前分页的所有参数，比如：
                if(!first){
                    window.location.href="{{route('index')}}?page="+obj.curr;
                }
            }
        });
    });

    //封面轮播
    layui.use('carousel', function(){
        var carousel = layui.carousel;
        //建造实例
        carousel.render({
            elem: '#carousel'
            ,width: '100%' //设置容器宽度
            ,height: '370'
            ,arrow: 'always' //始终显示箭头
            //,anim: 'updown' //切换动画方式
        });
    });
    
    
    
</script>
@endsection


