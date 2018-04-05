<?php

namespace App;

use App\User;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable = [

        'category_id',
        'user_id',
        'photo_id',
        'title',
        'body'

    ];


    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function photo()
    {
        return $this->belongsTo('App\Photo');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function comment()
    {
        $this->hasMany('App/Comment');
    }

}
