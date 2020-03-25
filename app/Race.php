<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
    //
    /**
     * 一对多 种族与宝可梦
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pokemons()
    {
        return $this->hasMany('App\Pokemon');
    }

}
