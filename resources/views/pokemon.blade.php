@extends('layouts.app')

@section('content')
<div class="layui-row  layui-col-space20">
    <!--左侧信息-->
    <div class="layui-col-md3" style="color:blanchedalmond;background-color:rgb(230, 137, 121);height:370px">
        <table class="layui-table" lay-even="" lay-skin="nob"style=" border:5px solid #000;">
            <tr>
                <td>Lv</td>
                <td>{{$pokemon->level}}</td>    
            </tr>
            <tr>
                <td>名字</td>
                <td>{{$pokemon->name}}</td>    
            </tr>
            <tr>
                <td>种族</td>
                <td>{{$pokemon->races->name}}</td>
            </tr>
            <tr>
                <td>属性</td>
                <td>
                <span style="white-space:nowrap; margin:0 1px; display:inline-block">
                    <img src="/images/type/{{$pokemon->races->type_one}}.webp" decoding="async" width="20" height="20" style="vertical-align: middle;" class="bg-{{config('system.type.'.$pokemon->races->type_one)}}SWSH roundyleft-5" ><span style="display:inline-block; box-sizing:border-box; height:20px; line-height:20px; min-width:42px; vertical-align:middle; border-radius:0 5px 5px 0; font-size:12px; text-align:center; font-family:幼圆; color:#fff;" class="bgd-{{config('system.type.'.$pokemon->races->type_one)}}SWSH">{{config('system.type.'.$pokemon->races->type_one)}}</span>
                </span>
                @if(isset($pokemon->races->type_two))
                    <span style="white-space:nowrap; margin:0 1px; display:inline-block">
                        <img src="/images/type/{{$pokemon->races->type_two}}.webp" decoding="async" width="20" height="20" style="vertical-align: middle;" class="bg-{{config('system.type.'.$pokemon->races->type_two)}}SWSH roundyleft-5" ><span style="display:inline-block; box-sizing:border-box; height:20px; line-height:20px; min-width:42px; vertical-align:middle; border-radius:0 5px 5px 0; font-size:12px; text-align:center; font-family:幼圆; color:#fff;" class="bgd-{{config('system.type.'.$pokemon->races->type_two)}}SWSH">{{config('system.type.'.$pokemon->races->type_two)}}</span>
                    </span>
                @endif
                </td>
            </tr>
            <tr>
                <td>性格</td>
                <td>{{config('system.nature.'.$pokemon->nature)}}</td>
            </tr>                    
        </table>    
        <div class="layui-row" style="text-align: center;">
            <div class="layui-col-md4">
                <img src="/images/gbl.png" height="100" width="60">
            </div>
            <div class="layui-col-md4">
                <img src="/images/gbd.png" height="100" width="60">
            </div>
            <div class="layui-col-md4">
                <img src="/images/gbr.png" height="100" width="60">
            </div>            
        </div>
             
    </div>
    <!-- 宝可梦 -->
    <div class="layui-col-md6" style="text-align: center;background:url(/images/test.png);">
        <img src="{{$pokemon->races->image_url}}" height="350" width="350"> 
    </div>  
    <!-- 右侧信息 -->
    <div class="layui-col-md3" style="color:blanchedalmond;background-color:rgb(230, 137, 121);height:370px">
            <table class="layui-table" lay-even="" lay-skin="nob"style=" border:5px solid #000;">
                <tr>
                    <td>Lv</td>
                    <td>{{$pokemon->level}}</td>    
                </tr>
                <tr>
                    <td>名字</td>
                    <td>{{$pokemon->name}}</td>    
                </tr>
                <tr>
                    <td>种族</td>
                    <td>{{$pokemon->races->name}}</td>
                </tr>
                <tr>
                    <td>属性</td>
                    <td>
                        <span style="white-space:nowrap; margin:0 1px; display:inline-block">
                            <img src="/images/type/{{$pokemon->races->type_one}}.webp" decoding="async" width="20" height="20" style="vertical-align: middle;" class="bg-{{config('system.type.'.$pokemon->races->type_one)}}SWSH roundyleft-5" ><span style="display:inline-block; box-sizing:border-box; height:20px; line-height:20px; min-width:42px; vertical-align:middle; border-radius:0 5px 5px 0; font-size:12px; text-align:center; font-family:幼圆; color:#fff;" class="bgd-{{config('system.type.'.$pokemon->races->type_one)}}SWSH">{{config('system.type.'.$pokemon->races->type_one)}}</span>
                        </span>
                        @if(isset($pokemon->races->type_two))
                            <span style="white-space:nowrap; margin:0 1px; display:inline-block">
                                <img src="/images/type/{{$pokemon->races->type_two}}.webp" decoding="async" width="20" height="20" style="vertical-align: middle;" class="bg-{{config('system.type.'.$pokemon->races->type_two)}}SWSH roundyleft-5" ><span style="display:inline-block; box-sizing:border-box; height:20px; line-height:20px; min-width:42px; vertical-align:middle; border-radius:0 5px 5px 0; font-size:12px; text-align:center; font-family:幼圆; color:#fff;" class="bgd-{{config('system.type.'.$pokemon->races->type_two)}}SWSH">{{config('system.type.'.$pokemon->races->type_two)}}</span>
                            </span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>性格</td>
                    <td>{{config('system.nature.'.$pokemon->nature)}}</td>
                </tr>                    
            </table>    
            <div class="layui-row" style="text-align: center;">
                <div class="layui-col-md4">
                    <img src="/images/gbl.png" height="100" width="60">
                </div>
                <div class="layui-col-md4">
                    <img src="/images/gbd.png" height="100" width="60">
                </div>
                <div class="layui-col-md4">
                    <img src="/images/gbr.png" height="100" width="60">
                </div>            
            </div>
                 
        </div>
</div>

<!-- <div style="text-align:center">
    <button id = "up" class="layui-btn">使用神奇糖果</button>
</div> -->

<br><br>
<!-- 下方背包 -->

<div class="layui-row  layui-col-space20">
      
    <div class="layui-col-md3 rainbow"style="text-align: center; height:193px">
            <img src="/images/pack.png" height="80" width="80">
            <img src="/images/pack1.png" height="80" width="80"><br><br>
            <h1><button id="test" type="button" class="layui-btn">测试礼包</button> 背包</h1>
         
    </div> 
    <div class="layui-card layui-col-md9">
            <div class="layui-card-body layui-row"> 
                <div style="padding: 5px; background-color: rgb(113, 156, 212);">
                    <div class="layui-row layui-col-space5" style="height:147px">
                        @foreach($prors as $pror)
                        <div class="layui-col-md2">
                        <div class="layui-card">
                            <div class="layui-card-header">
                                {{$pror['pror']['name']}}×{{$pror['number']}}
                            </div>
                            <div class="layui-card-body">
                                <div onclick="Pror('{{$pror->pror}}')"><img src="{{$pror['pror']->image_url}}" height="80" width="80"></div>
                            </div>
                        </div>
                        </div>
                        @endforeach 

                    </div>
                </div>
            </div>
    </div>
</div>

 
    
<script>
    //使用道具
    function Pror(pror){
        pror = JSON.parse(pror);
        layer.confirm(pror['explain'], {
            title:pror['name'],
            btn: ['使用','取消']
            },function(){
                $.ajax({
                    url:"/pror",
                    type:'put',
                    data:{
                        id:"{{$pokemon->id}}",
                        pror:pror['id']
                    },
                    success:function(p){
                        if(p['suc']){
                            cont = '使用成功';
                        }else{
                            cont = '数量不足';
                        }
                        layer.open({
                            content:cont,
                            end:function(){
                                location.reload()
                            }
                        })
                    }
                })


        })  
    }
    

    //检测进化
    $(window).on("load",function(){
        $.ajax({
            url:'/evolve/{{$pokemon->id}}',
            type:'put',
            success:function(p){
                if(p['suc']){
                    layer.open({
                        title:'进化',
                        content:"<img src={{$pokemon->races->image_url}} height='100' width='100'> 咦?{{$pokemon->name}}开始进化了!",
                        end:function(){
                            layer.open({
                                title:'进化',
                                content:"<img src=/storage/"+p['evolve']['image']+" height='100' width='100'> 恭喜!你的{{$pokemon->name}}进化成"+p['evolve']['name']+"!",
                                end:function(){
                                    location.reload();
                                }
                            })
                        }
                    })
                }
            }
        })
    });


    $('#test').on('click', function(){
        layer.confirm('领取一次性道具包 包含100币 100水之石 100火之石 100雷之石 200神奇糖果', {
            title:'测试',
            btn: ['领取','取消']
            },function(){
                $.ajax({
                    url:'/test',
                    type:'post',
                    success:function(p){
                        if(p['suc']){
                            layer.msg('领取成功');
                            location.reload();
                        }
                        else{
                            layer.msg('你领取过了');
                        }
                    }
                })
            }
        )  
    
    })

</script>    

<style>
    .layui-table td, .layui-table th{
        font-size: 20px;
        font-family: 'STHeiti'
    }
    .rainbow{
        width:290px;
        height: 193px;
    }
    .rainbow::after{
        background: rgb(209, 209, 209);
    }
    
</style>
@endsection


