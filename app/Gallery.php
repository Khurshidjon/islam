<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    public function album()
    {
        return $this->belongsTo(Album::class);
    }

    public function images()
    {
        return $this->belongsTo(GalleryImage::class, 'gallery_id');
    }

}
