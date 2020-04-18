<?php

namespace App\Http\Controllers;

use App\Evolve;
use App\Have;
use App\Pokemon;
use App\Pror;
use App\Race;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PokemonController extends Controller
{
    //
    //抽取
    public function extract(){
        $user = Auth::user();
        if($user->coin > 0){
            $user->coin-=1;
            $dice = dice(); //抽取稀有度
            $dice = Race::where('rarity',$dice)->get();
            $dice = $dice[rand(0,count($dice,0)-1)];//抽取宝可梦
            Pokemon::create([
                'race'=>$dice['id'],
                'user'=>$user->id,
                'nature'=>rand(0,24),
                'level'=>1
            ]);
            $user->save();
            return ['suc'=>true,'race'=>$dice];
        }
        //硬币不足
        return ['suc'=>false];

    }

    //宝可梦详情
    public function show($id){
        $pokemon = Pokemon::find($id);
        $prors = Have::where('user',Auth::id())->paginate(6);
        foreach ($prors as $pror){
            $pror['pror'] = Pror::find($pror->pror);
        }
        return view('pokemon',['pokemon'=>$pokemon,'prors'=>$prors]);
    }

    //进化
    public function evolve($id){
        $pokemon = Pokemon::find($id);
        foreach ($pokemon->races->evolves as $evolve){
            if($this->judgeEvolve($pokemon,$evolve)){
                $pokemon->race = $evolve->after;
                $pokemon->save();
                return ['suc'=>true,'evolve'=>Race::find($evolve->after)];
            }
        }
        return ['suc'=>false];
    }



    //使用道具
    public function pror(Request $request){
        $pokemon = Pokemon::find($request['id']);
        $have = Have::where(['user' => Auth::id(),'pror' => $request['pror']])->first();

        if(isset($have)){
            $pror = Pror::find($have->pror);
            //使用该道具
            switch ($pror->effect){
                //神奇糖果效果
                case 1:{
                    $pokemon->level++;
                }break;
                /**
                 * 携带道具或进化石
                 * 2:水之石 3:火之石 4:雷之石
                 */
                case 2:
                case 3:
                case 4:{
                    $pokemon->pror = $pror->id;
                }break;
            }

            //修改并保存持有道具与宝可梦
            if($have->number>1){
                $have->number--;
                $have->save();
            }else{
                $have->delete();
            }
            $pokemon->save();
            return ['suc'=>true];
        }
        return ['suc'=>false];
    }

    //进化判断
    protected function judgeEvolve(Pokemon $pokemon,Evolve $evolve){
        if($evolve->type==0&&$pokemon->level>=$evolve->mode){
            return true;
        }elseif($evolve->type==1&&Pror::find($pokemon->pror)->effect==$evolve->mode){
            $pokemon->pror = Null;
            $pokemon->save();
            return true;
        }
        return false;
    }

    //测试礼包接口
    public function test(){
        $user = User::find(Auth::id());
        if(!$user['test'] == 1){
            $user->coin += 100;
            Have::create([
                'user'=>$user->id,
                'pror'=>Pror::where('name','神奇糖果')->value('id'),
                'number'=>200
            ]);
            Have::create([
                'user'=>$user->id,
                'pror'=>Pror::where('name','水之石')->value('id'),
                'number'=>100
            ]);Have::create([
                'user'=>$user->id,
                'pror'=>Pror::where('name','火之石')->value('id'),
                'number'=>100
            ]);
            Have::create([
                'user'=>$user->id,
                'pror'=>Pror::where('name','雷之石')->value('id'),
                'number'=>100
            ]);
            $user->test = 1;
            $user->save();
            return ['suc' => true];
        }
        return ['suc' => false];


    }

}
