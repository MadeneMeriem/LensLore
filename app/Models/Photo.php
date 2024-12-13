<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //
    protected $fillable = [
        'title',
        'description',
        'file_path',
        'photographer_id',
        'category_id'
    ];
}
