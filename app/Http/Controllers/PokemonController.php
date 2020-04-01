<?php

namespace App\Http\Controllers;

use App\Pokemon;
use App\Race;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PokemonController extends Controller
{
    //
    //抽取
    public function extract(Request $request){
        $user = User::find($request->id);
        if($user->coin > 0){
            $user->coin-=1;
            $dice = dice(); //抽取稀有度
            $dice = Race::where('rarity',$dice)->get();
            $dice = $dice[rand(0,count($dice,0)-1)];//抽取宝可梦
            Pokemon::create(['race'=>$dice['id'],'user'=>$user->id]);
            $user->save();
            return ['suc'=>true,'race'=>$dice];
        }else{
            //硬币不足
            return ['suc'=>false];
        }
    }

    public function test(){
        //测试抽取
//        $dice = dice();
//        $dice = Race::where('rarity',$dice)->get();
//        dd(
//            $dice[rand(0,count($dice,0)-1)]
//        );

        //持有宝可梦测试
//        $user = User::find($id);
//        $pokemons = $user->pokemon;
//        foreach ($pokemons as $pokemon ){
//            var_dump($pokemon->races->name);
//        }

        //登录页面测试
        return view('layouts.index1');

    }
}
