<?php

namespace App\Http\Controllers;

use App\Pokemon;
use App\Race;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = User::find(Auth::id());
        $pokemon = Pokemon::where('user',Auth::id())->paginate(12);
        foreach ($pokemon as $index => $pm){
            $pokemon[$index]["race"] = $pm->races;
        }
        return view('layouts.index',['coin'=>$user->coin,'pokemon'=>$pokemon]);
    }



}
