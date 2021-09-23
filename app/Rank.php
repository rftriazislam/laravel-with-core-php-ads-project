<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rank extends Model
{

    protected $fillable = [
        'userid','rank' ,'target_rank',
    ];

    public function users()
    {
        return $this->belongsTo('App\User');
    }
}
