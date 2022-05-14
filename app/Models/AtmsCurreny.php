<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AtmsCurreny extends Model
{
    use HasFactory;

    protected $hidden = [
        // 'atms_id',
        'created_at',
        'updated_at',
        // 'id',
        // 'amount_in_words',
        // 'two_thousand',
        // 'five_hundered',
        // 'hundred',
        // 'fifty',


        // 'qutanty_avliable',
        // 'amount',

    ];
}