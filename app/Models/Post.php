<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = ['created_at', 'updated_at'];
    //for timestamps
    protected $dates = [
        'published_at'
    ];
}
