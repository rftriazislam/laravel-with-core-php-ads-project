<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transanction extends Model
{
    protected $fillable = [
        'id', 'tx_id', 'price', 'user_id', 'phone', 'email', 'transaction_status', 'updated_at'
    ];
}