<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class Menu extends Model
{
    protected $fillable = [
            'status',
            'position',
            'url',
            'parent'
        ];
    public function submenu()
    {
        $locale = App::getLocale();
        $lang = Language::where('lang', $locale)->first();

        return $this->hasMany(Menu::class, 'parent', 'id')
            ->join('menu_lang', 'menus.id', 'menu_lang.menu_id')
            ->select('menus.id', 'menus.url', 'menu_lang.name')->where('menu_lang.lang_id', $lang->id);
    }
    public function sub_menu()
    {
        return $this->hasOne(Menu::class, 'parent', 'id');
    }
}
