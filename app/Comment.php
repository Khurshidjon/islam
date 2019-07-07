<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Comment extends Model
{
    public function commentContent()
    {
        return $this->hasOne(CommentLang::class);
    }
    public function showComment()
    {
        $locale = App::getLocale();
        $language = Language::where('lang', $locale)->first();

        return $this->commentContent()->where('lang_id', $language->id);
    }
}
