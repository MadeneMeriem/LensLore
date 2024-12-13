<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photographer extends Model
{
    //
    protected $fillable = [
        'user_id',
        'bio',
        'portfolio_url',
        'contact'
    ];
}
