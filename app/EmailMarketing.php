<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmailMarketing extends Model
{
    protected $fillable = [
        'email', 'user_id', 'price', 'password', 'recovery_email', 'status'
    ];
}