<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Microworks extends Model
{
	protected $table ='microworks';
    protected $fillable = [
        'userid','passback_count'
    ];

    public function users()
    {
        return $this->belongsTo('App\User');
    }
}
