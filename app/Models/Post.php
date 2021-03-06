<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    protected $guarded = ['created_at', 'updated_at'];
    //for timestamps
    protected $dates = [
        'published_at'
    ];
    public function category(){
        return $this->belongsTo('App\Models\Category');
    }
//one to many relation
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function tags(){
        return $this->belongsToMany('App\Models\Tag');
    }
}
