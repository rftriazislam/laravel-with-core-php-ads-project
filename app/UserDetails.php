<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{
    protected $fillable = [
        'userid'
    ];

    public function users()
    {
        return $this->belongsTo('App\User');
    }
}
