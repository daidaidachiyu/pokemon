<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evolve extends Model
{
    //
    protected $fillable = ['ago', 'after', 'mode','type'];

    protected $table = 'evolves';

    /**
     * 一对多反向 进化与种族
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function races()
    {
        return $this->belongsTo('App\Race','ago');
    }
}
