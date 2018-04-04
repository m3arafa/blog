<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function commentReply()
    {
        return $this->hasMany('App/CommentReply');
    }

    public function user()
    {
        return $this->belongsTo('App/User');
    }
}
