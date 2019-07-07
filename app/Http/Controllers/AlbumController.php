<?php

namespace App\Http\Controllers;

use App\Album;
use App\Language;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locale = \App::getLocale();
        $lang = Language::where('lang', $locale)->first();
        $albums = DB::table('albums')
            ->join('album_lang', 'albums.id', 'album_lang.album_id')
            ->where('lang_id', $lang->id)
            ->select('albums.status', 'albums.order_by', 'albums.user_id', 'albums.filename', 'albums.id', 'album_lang.title', 'album_lang.lang_id')
            ->orderBy('order_by','ASC')
            ->get();
        return view('admin.contents.album.albums', [
            'albums' => $albums
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.contents.album.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'status' => 'required',
            'filename' => 'required|image|mimes:jpg,jpeg,png|max:10240',
            'description' => 'required',
        ]);
        if ($validate->fails()){
            return redirect()->back()
                ->withInput()
                ->withErrors($validate);
        }else{
            $filename = $request->file('filename')->store('Albums'.'/'. date('FY'), 'public');
            $album = new Album();
            $album->status = $request->get('status');
            $album->user_id = \Auth::id();
            $album->filename = $filename;
            $album->save();
            $lang = Language::where('lang', 'uz')->first();
            DB::table('album_lang')
                ->insert([
                    'title' => $request->title,
                    'description' => $request->description,
                    'lang_id' => $lang->id,
                    'album_id' => $album->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

            $notification = array(
                'message' => 'Album has been created successfully',
                'alert-type' => 'success',
            );
            return redirect()->route('albums.index')->with($notification);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $album = DB::table('albums')
            ->join('album_lang', 'albums.id', 'album_lang.album_id')
            ->where('albums.id', $id)
            ->select('albums.status', 'albums.seen_count', 'album_lang.description',  'albums.order_by', 'albums.user_id', 'albums.filename', 'albums.id', 'album_lang.title', 'album_lang.lang_id')
            ->first();
        $user = User::find($album->user_id);
        return view('admin.contents.album.browse', [
            'album' => $album,
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $album = Album::find($id);

        $uz = Language::where('lang', 'uz')->first();
        $ru = Language::where('lang', 'ru')->first();
        $en = Language::where('lang', 'en')->first();
        $ar = Language::where('lang', 'ar')->first();
        $tr = Language::where('lang', 'tr')->first();
        $album_uz = DB::table('album_lang')->where('lang_id', $uz->id)->where('album_id', $id)->select('*')->first();
        $album_ru = DB::table('album_lang')->where('lang_id', $ru->id)->where('album_id', $id)->select('*')->first();
        $album_en = DB::table('album_lang')->where('lang_id', $en->id)->where('album_id', $id)->select('*')->first();
        $album_ar = DB::table('album_lang')->where('lang_id', $ar->id)->where('album_id', $id)->select('*')->first();
        $album_tr = DB::table('album_lang')->where('lang_id', $tr->id)->where('album_id', $id)->select('*')->first();

        return view('admin.contents.album.edit', [
            'album' => $album,
            'uz' => $uz,
            'ru' => $ru,
            'en' => $en,
            'ar' => $ar,
            'tr' => $tr,
            'album_uz' => $album_uz,
            'album_ru' => $album_ru,
            'album_en' => $album_en,
            'album_ar' => $album_ar,
            'album_tr' => $album_tr,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'filename' => 'image|mimes:jpg,jpeg,png|max:10240',
            'description' => 'required',
        ]);
        if ($validate->fails()){
            return redirect()->back()
                ->withInput()
                ->withErrors($validate);
        }else{
            $lang_id = $request->lang_id;

            $exist = DB::table('album_lang')->where('album_id', $id)->where('lang_id', $lang_id)->first();

            $album = Album::find($id);
            if ($request->file('filename')){
                $filename = $request->file('filename')->store('Albums'.'/'. date('FY'), 'public');
                $album->filename = $filename;
            }
            $album->status = $request->get('status');

            $album->save();

            if ($exist){

                DB::table('album_lang')
                    ->where('lang_id', $lang_id)
                    ->where('album_id', $album->id)
                    ->update([
                        'title' => $request->title,
                        'description' => $request->description,
                        'album_id' => $album->id,
                        'updated_at' => now(),
                    ]);
                $notification = array(
                    'message' => 'Album has been updated successfully',
                    'alert-type' => 'success',
                );
            }else{

                $album->status = $request->get('status');

                DB::table('album_lang')
                    ->insert([
                        'title' => $request->title,
                        'description' => $request->description,
                        'lang_id' => $lang_id,
                        'album_id' => $album->id,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                $notification = array(
                    'message' => 'Album has been translated successfully',
                    'alert-type' => 'success',
                );
            }

            return redirect()->back()->with($notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $album = Album::find($id);
        $album->delete();

        DB::table('album_lang')->where('album_id', $id)->delete();
        $notification = array(
            'message' => 'Album has been deleted successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

    public function orderBy(Request $request)
    {
        $album_id = $request->album_id;
        $order_by = $request->order_by;

        $album = Album::where('id', $album_id)->first();


        if ($order_by > count(Album::all()) || $order_by <= 0){
            return 'error';
        }

        if ($album){
            DB::table('albums')
                ->where('id', $album_id)
                ->update([
                    'order_by' => $order_by
                ]);
        }
        return 'ok';
    }
}
