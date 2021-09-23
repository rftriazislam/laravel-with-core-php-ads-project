<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $fillable = [
        'userid'
    ];

    public function users()
    {
        return $this->belongsTo('App\User');
    }
}
