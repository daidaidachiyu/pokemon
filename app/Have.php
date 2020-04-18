<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Have extends Model
{
    protected $fillable = [
        'user', 'pror','number'
    ];
    //
    /**
     * 与模型关联的表名
     *
     * @var string
     */
    protected $table = 'have';
}
