<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Race extends Model
{
    //

    protected $fillable = [
        'name'
    ];
    /**
     * 一对多 种族与宝可梦
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pokemon()
    {
        return $this->hasMany('App\Pokemon','race');
    }

    /**
     * 一对多 种族与进化
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function evolves()
    {
        return $this->hasMany('App\Evolve','ago');
    }

    public function getImageUrlAttribute(){
        if (Str::startsWith($this->attributes['image'], ['http://', 'https://'])) {
            return $this->attributes['image'];
        }
        return \Storage::disk('public')->url($this->attributes['image']);
    }


    public function getIdNameAttribute()
    {
        return [$this->id => $this->name];
    }

}
