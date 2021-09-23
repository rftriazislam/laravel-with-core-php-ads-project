<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MonthsUser extends Model
{
    protected $fillable = [
        'userid'
    ];

    public function users()
    {
        return $this->belongsTo('App\User');
    }
}
