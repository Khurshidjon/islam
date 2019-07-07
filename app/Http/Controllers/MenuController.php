<?php

namespace App\Http\Controllers;

use App\Language;
use App\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lang = App::getLocale();
        $language = Language::where('lang', $lang)->first();

        $menus = DB::table('menus')
            ->join('menu_lang', 'menus.id','menu_lang.menu_id')
            ->select('menus.status', 'menus.url', 'menus.order', 'menus.id', 'menu_lang.name', 'menu_lang.lang_id')
            ->where('menu_lang.lang_id', $language->id)
            ->orderBy('order', 'ASC')
            ->paginate(15);
        return view('admin.menus.menus', [
            'menus' => $menus
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lang = App::getLocale();
        $language = Language::where('lang', $lang)->first();
        $menus = DB::table('menus')
            ->join('menu_lang', 'menus.id','menu_lang.menu_id')
            ->select('menus.status', 'menus.parent', 'menus.id', 'menu_lang.name', 'menu_lang.lang_id')
            ->where('menu_lang.lang_id', $language->id)
            ->get();
        $languages = Language::all();
        return view('admin.menus.add', [
            'languages' => $languages,
            'menus' => $menus
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = \Validator::make($request->all(), [
            'name' => 'required',
            'status' => 'required',
            'url' => 'required',
            'position' => 'required'
        ]);
        if ($validate->fails()){
            return redirect()->back()
                ->withErrors($validate)
                ->withInput();
        }else{

            $status = $request->status;
            $order = $request->order;

            $menu = new Menu();
            $menu->status = $request->status;
            $menu->position = $request->position;
            $menu->url = $request->url;
//            $menu->order = $request->order;
            $menu->parent = $request->parent_id;
            $menu->save();

            $name = $request->name;

            $menu_id = $menu->id;

            $lang = Language::where('lang', 'uz')->first();
            DB::table('menu_lang')
                ->insert([
                    'menu_id' => $menu_id,
                    'lang_id' => $lang->id,
                    'name' => $name,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            return redirect()->route('menus.index');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        $notification = array(
            'message' => 'You have no access to show menus',
            'alert-type' => 'warning',
        );
        return redirect()->route('menus.index')->with($notification);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lang = App::getLocale();
        $language = Language::where('lang', $lang)->first();

        $languages = Language::all();

        $menu = DB::table('menus')
            ->join('menu_lang', 'menus.id', '=','menu_lang.menu_id')
            ->select('menus.id', 'menus.status', 'menus.position', 'menus.url', 'menus.order', 'menus.parent', 'menu_lang.menu_id', 'menu_lang.lang_id', 'menu_lang.name')
            ->where('menus.id', $id)
            ->first();
        $menus = DB::table('menus')
            ->join('menu_lang', 'menus.id','menu_lang.menu_id')
            ->select('menus.status', 'menus.order', 'menus.parent', 'menus.id', 'menu_lang.name', 'menu_lang.lang_id')
            ->where('menu_lang.lang_id', $language->id)
            ->get();

        $uz = Language::where('lang', 'uz')->first();
        $ru = Language::where('lang', 'ru')->first();
        $en = Language::where('lang', 'en')->first();
        $ar = Language::where('lang', 'ar')->first();
        $tr = Language::where('lang', 'tr')->first();
        $menu_uz = DB::table('menu_lang')->where('lang_id', $uz->id)->where('menu_id', $id)->select('name')->first();
        $menu_ru = DB::table('menu_lang')->where('lang_id', $ru->id)->where('menu_id', $id)->select('name')->first();
        $menu_en = DB::table('menu_lang')->where('lang_id', $en->id)->where('menu_id', $id)->select('name')->first();
        $menu_ar = DB::table('menu_lang')->where('lang_id', $ar->id)->where('menu_id', $id)->select('name')->first();
        $menu_tr = DB::table('menu_lang')->where('lang_id', $tr->id)->where('menu_id', $id)->select('name')->first();
        return view('admin.menus.edit', [
            'languages' => $languages,
            'menus' => $menus,
            'menu' => $menu,
            'uz' => $uz,
            'ru' => $ru,
            'en' => $en,
            'ar' => $ar,
            'tr' => $tr,
            'menu_uz' => $menu_uz,
            'menu_ru' => $menu_ru,
            'menu_en' => $menu_en,
            'menu_ar' => $menu_ar,
            'menu_tr' => $menu_tr,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate = \Validator::make($request->all(), [
            'name' => 'required',
        ]);
        if ($validate->fails()){
            return redirect()->back()
                ->withErrors($validate)
                ->withInput();
        }else{

            $status = $request->status;

            $name = $request->name;

            $menu_id = $id;
            $lang_id = $request->lang_id;
            $menu = Menu::find($id);

            $exist = DB::table('menu_lang')->where('menu_id', $menu_id)->where('lang_id', $lang_id)->first();
            if ($exist){
                $menu->update([
                    'status' => $request->get('status'),
                    'position' => $request->get('position'),
                    'url' => $request->url,
                    'parent' => $request->get('parent')
                ]);

                DB::table('menu_lang')
                    ->where('lang_id', $lang_id)
                    ->where('menu_id', $menu_id)
                    ->update([
                        'name' => $name,
                        'updated_at' => now()
                    ]);
            }else{
                DB::table('menu_lang')
                    ->insert([
                        'menu_id' => $menu_id,
                        'lang_id' => $lang_id,
                        'name' => $name,
                        'created_at' => now(),
                        'updated_at' => now()
                    ]);
            }
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menu = Menu::find($id);
        $menu->delete();

        DB::table('menu_lang')->where('menu_id', $id)->delete();
        $notification = array(
            'message' => 'Menu has been deleted successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('menus.index')->with($notification);
    }

    public function orderBy(Request $request)
    {
        $menu = Menu::where('id', $request->menu_id)->first();

        $menu_id = $request->menu_id;
        $order_id = $request->order_by;

        if ($order_id > count(Menu::all()) || $order_id <= 0){
            return 'error';
        }
        if ($menu){
            DB::table('menus')
                ->where('id', $menu_id)
                ->update([
                    'order' => $order_id,
                    'updated_at' => now(),
                ]);
        }
        return 'ok';
    }
}
