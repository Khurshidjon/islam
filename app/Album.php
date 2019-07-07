<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    public function gallery()
    {
        return $this->belongsTo(Gallery::class);
    }

    public function galleries()
    {
        return $this->belongsTo(Gallery::class);
    }

}
