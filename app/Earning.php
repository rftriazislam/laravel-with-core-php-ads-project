<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Earning extends Model
{
    protected $fillable = [
        'userid','joining_income' ,'referral_income','others_income','rpincome','add_rpincome'
    ];

    public function users()
    {
        return $this->belongsTo('App\User');
    }
}
