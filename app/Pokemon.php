<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{

    protected $fillable = [
        'race', 'user','name','nature','level'
    ];


    /**
     * 一对多反向 宝可梦与用户
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function users()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * 一对多反向 宝可梦与种族
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function races()
    {
        return $this->belongsTo('App\Race','race');
    }


    public function getNameAttribute($value)
    {
        return isset($value)?$value:$this->races->name;
    }
}
