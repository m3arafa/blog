<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentReply extends Model
{
    public function comment()
    {
        $this->belongsTo('App/Comment');
    }

    public function user()
    {
        return $this->belongsTo('App/User');
    }
}
