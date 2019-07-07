<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
//    protected $dates = ['expired_at'];
    public function postAuthor()
    {
        return $this->belongsTo(User::class);
    }

}
