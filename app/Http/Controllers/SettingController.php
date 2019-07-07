<?php

namespace App\Http\Controllers;

use App\Language;
use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locale = App::getLocale();
        $lang = Language::where('lang', '=', $locale)->first();
        $settings = DB::table('settings')
            ->join('settings_lang', 'settings.id', 'settings_lang.setting_id')
            ->select('settings.id', 'settings.key', 'settings.url', 'settings_lang.val', 'settings_lang.img')
            ->where('settings_lang.lang_id', '=', $lang->id)
            ->orderBy('settings.created_at', 'DESC')
            ->paginate(10);
        return view('admin.contents.settings.settings', [
            'settings' => $settings
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.contents.settings.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'key' => 'required|string|max:255|unique:settings',
            'val' => 'required',
            'img' => 'image|mimes:jpg,jpeg,png|max:5120',
        ]);

        if ($validator->fails()){
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }else{
            if ($request->file('img')){
                $img = $request->file('img')->store('Settings' .'/'. date('FY'), 'public');
            }else{
                $img = null;
            }

            $settings = new Setting();
            $settings->key = $request->key;
            $settings->url = $request->url;
            $settings->save();

            $lang = Language::where('lang', 'uz')->first();

            DB::table('settings_lang')
                ->insert([
                    'lang_id' => $lang->id,
                    'setting_id' => $settings->id,
                    'val' => $request->val,
                    'img' => $img,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            $notification = array(
                'message' => 'Settings has been created successfully',
                'alert-type' => 'success',
            );
            return redirect()->route('settings.index')->with($notification);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $locale = App::getLocale();
        $language = Language::where('lang', $locale)->first();
        $setting = DB::table('settings')
            ->join('settings_lang', 'settings.id', 'settings_lang.setting_id')
            ->select('settings.id', 'settings.key', 'settings.url', 'settings_lang.img', 'settings_lang.val' )
            ->where('settings_lang.lang_id', $language->id)
            ->where('settings.id', $id)
            ->first();

        return view('admin.contents.settings.browse', [
            'setting' => $setting
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $setting = DB::table('settings')
            ->join('settings_lang', 'settings.id', 'settings_lang.setting_id')
            ->select('settings.id as id', 'settings.key', 'settings.url', 'settings_lang.val', 'settings_lang.img')
            ->where('settings_lang.setting_id', '=', $id)
            ->first();

        $uz = Language::where('lang', 'uz')->first();
        $ru = Language::where('lang', 'ru')->first();
        $en = Language::where('lang', 'en')->first();
        $ar = Language::where('lang', 'ar')->first();
        $tr = Language::where('lang', 'tr')->first();
        $setting_uz = DB::table('settings_lang')->where('lang_id', $uz->id)->where('setting_id', $id)->select('val', 'img')->first();
        $setting_ru = DB::table('settings_lang')->where('lang_id', $ru->id)->where('setting_id', $id)->select('val', 'img')->first();
        $setting_en = DB::table('settings_lang')->where('lang_id', $en->id)->where('setting_id', $id)->select('val', 'img')->first();
        $setting_ar = DB::table('settings_lang')->where('lang_id', $ar->id)->where('setting_id', $id)->select('val', 'img')->first();
        $setting_tr = DB::table('settings_lang')->where('lang_id', $tr->id)->where('setting_id', $id)->select('val', 'img')->first();

        return view('admin.contents.settings.edit', [
            'setting' => $setting,
            'uz' => $uz,
            'ru' => $ru,
            'en' => $en,
            'ar' => $ar,
            'tr' => $tr,
            'setting_uz' => $setting_uz,
            'setting_ru' => $setting_ru,
            'setting_en' => $setting_en,
            'setting_ar' => $setting_ar,
            'setting_tr' => $setting_tr,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'key' => 'string|max:255|unique:settings',
            'val' => 'required',
            'img' => 'image|mimes:jpg,jpeg,png|max:5120',
        ]);

        if ($validator->fails()){
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }else{

            $settings = Setting::find($id);
            if ($request->key){
                $settings->key = $request->key;
            }
            if ($request->url){
                $settings->url = $request->url;
            }
            $settings->save();

            $lang_id = $request->lang_id;
            if ($request->file('img')){
                $img = $request->file('img')->store('Settings' .'/'. date('FY'), 'public');
            }else{
                $img = null;
            }

            $exist = DB::table('settings_lang')->where('setting_id', $settings->id)->where('lang_id', $lang_id)->first();
            if ($exist){
                DB::table('settings_lang')
                    ->where('setting_id', $id)
                    ->where('lang_id', $lang_id)
                    ->update([
                        'val' => $request->val,
                        'updated_at' => now(),
                        'img' => $img
                    ]);
                $notification = array(
                    'message' => 'Settings has been updated successfully',
                    'alert-type' => 'success',
                );
            }else{
                DB::table('settings_lang')
                    ->insert([
                        'lang_id' => $lang_id,
                        'setting_id' => $settings->id,
                        'val' => $request->val,
                        'img' => $img,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                $notification = array(
                    'message' => 'Settings has been created successfully',
                    'alert-type' => 'success',
                );
            }

            return redirect()->back()->with($notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Setting::find($id)->delete();
        DB::table('settings_lang')->where('setting_id', $id)->delete();
        $noty = array(
            'message' => 'Settings has been deleted successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($noty);
    }
}
