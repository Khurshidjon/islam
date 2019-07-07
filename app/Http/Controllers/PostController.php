<?php

namespace App\Http\Controllers;

use App\Language;
use App\Menu;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q = $request->search;
        $locale = App::getLocale();
        $language = Language::where('lang', $locale)->first();

        $posts = DB::table('posts')
                ->join('post_lang', 'posts.id', 'post_lang.post_id')
                ->select('posts.id', 'posts.created_at', 'posts.category_id', 'posts.user_id', 'posts.img', 'posts.status', 'post_lang.title', 'post_lang.description', 'post_lang.content')
                ->where('post_lang.lang_id', $language->id)
                ->orderBy('posts.created_at', 'DESC')
                ->paginate(10);

        if ($request->search){
            if ($q == null){
                return redirect()->route('posts.index');
            }
            $locale = App::getLocale();
            $language = Language::where('lang', $locale)->first();

            $posts = DB::table('posts')
                ->leftJoin('post_lang', 'posts.id', 'post_lang.post_id')
                ->select('posts.id','posts.user_id', 'posts.img', 'posts.category_id', 'posts.created_at', 'posts.status', 'post_lang.title', 'post_lang.description', 'post_lang.content')
                ->where('posts.status', 1)
                ->where('post_lang.lang_id', $language->id)
                ->where(function($query) use($q) {
                    $query->where('post_lang.title', 'like' , '%'. $q .'%')
                        ->orWhere('post_lang.description', 'like' , '%'. $q .'%')
                        ->orWhere('post_lang.content', 'like' , '%'. $q .'%');
                })
                ->orderBy('posts.created_at','DESC')
                ->paginate(1000);
        }
        return view('admin.contents.posts.posts', [
            'posts' => $posts,
            'q' => $q
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locale = App::getLocale();
        $language = Language::where('lang', $locale)->first();

        $categories = DB::table('categories')
            ->join('category_lang', 'categories.id','category_lang.category_id')
            ->select(  'categories.id', 'category_lang.name')
            ->where('category_lang.lang_id', $language->id)
            ->orderBy('order', 'ASC')
            ->get();

        return view('admin.contents.posts.add', [
            'categories' => $categories
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
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required',
            'body' => 'required',
            'status' => 'required',
            'category' => 'required',
            'img' => 'image|mimes:jpg,jpeg,png|max:5120',
        ]);

        if ($validator->fails()){
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }else{
            if($request->file('img')){

                $originalImage = $request->file('img');
                $thumbnailImageHandwriting = Image::make($originalImage);
                $thumbnailImageRecent = Image::make($originalImage);
                $thumbnailImagePartners = Image::make($originalImage);

                Storage::disk('local')->makeDirectory('public/posts');
                Storage::disk('local')->makeDirectory('public/handwritingPostsThumbnail');
                Storage::disk('local')->makeDirectory('public/recentPostsThumbnail');
                Storage::disk('local')->makeDirectory('public/partnerPostsThumbnail');

                $imgName = str_replace(" ", '-', $originalImage->getClientOriginalName());

                $thumbnailHandwritingPath = storage_path().'/app/public/handwritingPostsThumbnail/';
                $recentPostPath = storage_path().'/app/public/recentPostsThumbnail/';
                $partnerPostPath = storage_path().'/app/public/partnerPostsThumbnail/';

                $originalPath = storage_path().'/app/public/posts/';

                $thumbnailImageRecent->save($originalPath.time().$imgName);


                $thumbnailImageHandwriting->resize(270, 324, function ($constraint) {
                    $constraint->aspectRatio();
                });
/*---------------------------------------------------------------------------------------------------------------------------------*/
                $thumbnailImageHandwriting->save($thumbnailHandwritingPath.time().$imgName);
/*---------------------------------------------------------------------------------------------------------------------------------*/
                $thumbnailImagePartners->resize(270, 311, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $thumbnailImagePartners->save($partnerPostPath.time().$imgName);
/*---------------------------------------------------------------------------------------------------------------------------------*/
                $thumbnailImageRecent->resize(115, 106, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $thumbnailImageRecent->save($recentPostPath.time().$imgName);
/*---------------------------------------------------------------------------------------------------------------------------------*/
            $img = time().$imgName;
            }
            else{
                $img = null;
            }

            $post = new Post();
            $post->img = $img;
            $post->status = $request->status;
            $post->category_id = $request->get('category');
            $post->event_date = $request->event_date;
            if ($request->banner == 'on'){
                $post->banner = 1;
            }else{
                $post->banner = 0;
            }
            $post->user_id = \Auth::id();
            $post->save();

            $lang = Language::where('lang', 'uz')->first();

            DB::table('post_lang')
                ->insert([
                    'post_id' => $post->id,
                    'lang_id' => $lang->id,
                    'title' => $request->title,
                    'description' => $request->description,
                    'content' => $request->body,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            $notification = array(
                'message' => 'Post has been created successfully',
                'alert-type' => 'success',
            );
            return redirect()->route('posts.index')->with($notification);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $locale = App::getLocale();
        $language = Language::where('lang', $locale)->first();

        $post = DB::table('posts')
            ->join('post_lang', 'posts.id', 'post_lang.post_id')
            ->select('posts.id', 'posts.event_date', 'posts.created_at', 'posts.user_id', 'posts.seen_count','posts.img', 'posts.status', 'post_lang.title', 'post_lang.description', 'post_lang.content')
            ->where('post_lang.lang_id', $language->id)
            ->where('posts.id', $id)
            ->first();
        if ($post){
            $user = User::find($post->user_id);
        }
        else{
            $user = null;
        }
        return view('admin.contents.posts.browse', [
            'post' => $post,
            'user' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $languages = Language::all();
        $locale = App::getLocale();

        $post = DB::table('posts')
            ->join('post_lang', 'posts.id', '=','post_lang.post_id')
            ->select('posts.id', 'posts.status', 'posts.banner', 'posts.category_id', 'posts.event_date', 'post_lang.post_id', 'post_lang.lang_id', 'post_lang.title', 'post_lang.description', 'post_lang.content')
            ->where('posts.id', $id)
            ->first();

        $language = Language::where('lang', $locale)->first();

        $categories = DB::table('categories')
            ->join('category_lang', 'categories.id','category_lang.category_id')
            ->select(  'categories.id', 'category_lang.name')
            ->where('category_lang.lang_id', $language->id)
            ->orderBy('order', 'ASC')
            ->get();

        $uz = Language::where('lang', 'uz')->first();
        $ru = Language::where('lang', 'ru')->first();
        $en = Language::where('lang', 'en')->first();
        $ar = Language::where('lang', 'ar')->first();
        $tr = Language::where('lang', 'tr')->first();
        $post_uz = DB::table('post_lang')->where('lang_id', $uz->id)->where('post_id', $id)->select('*')->first();
        $post_ru = DB::table('post_lang')->where('lang_id', $ru->id)->where('post_id', $id)->select('*')->first();
        $post_en = DB::table('post_lang')->where('lang_id', $en->id)->where('post_id', $id)->select('*')->first();
        $post_ar = DB::table('post_lang')->where('lang_id', $ar->id)->where('post_id', $id)->select('*')->first();
        $post_tr = DB::table('post_lang')->where('lang_id', $tr->id)->where('post_id', $id)->select('*')->first();

        return view('admin.contents.posts.edit', [
            'languages' => $languages,
            'post' => $post,
            'uz' => $uz,
            'ru' => $ru,
            'en' => $en,
            'ar' => $ar,
            'tr' => $tr,
            'post_uz' => $post_uz,
            'post_ru' => $post_ru,
            'post_en' => $post_en,
            'post_ar' => $post_ar,
            'post_tr' => $post_tr,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required',
            'body' => 'required',
            'img' => 'image|mimes:jpg,jpeg,png|max:5120',
        ]);

        if ($validator->fails()){
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }else{

            $lang_id = $request->lang_id;
            $post = Post::find($id);
            $exist = DB::table('post_lang')->where('post_id', $id)->where('lang_id', $lang_id)->first();
            if ($exist){
                if ($request->file('img')){

                    $originalImage = $request->file('img');

                    $thumbnailImageHandwriting = Image::make($originalImage);
                    $thumbnailImageRecent = Image::make($originalImage);
                    $thumbnailImagePartners = Image::make($originalImage);

                    $imgName = str_replace(" ", '-', $originalImage->getClientOriginalName());

                    Storage::disk('local')->makeDirectory('public/posts');
                    Storage::disk('local')->makeDirectory('public/handwritingPostsThumbnail');
                    Storage::disk('local')->makeDirectory('public/recentPostsThumbnail');
                    Storage::disk('local')->makeDirectory('public/partnerPostsThumbnail');

                    $thumbnailHandwritingPath = storage_path().'/app/public/handwritingPostsThumbnail/';
                    $recentPostPath = storage_path().'/app/public/recentPostsThumbnail/';
                    $partnerPostPath = storage_path().'/app/public/partnerPostsThumbnail/';
                    $originalPath = storage_path().'/app/public/posts/';

                    $thumbnailImageRecent->save($originalPath.time().$imgName);


                    $thumbnailImageHandwriting->fit(270, 324, function ($constraint) {
                        $constraint->upsize();
                    });

                    /*---------------------------------------------------------------------------------------------------------------------------------*/

                    $thumbnailImageHandwriting->save($thumbnailHandwritingPath.time().$imgName);
                    /*---------------------------------------------------------------------------------------------------------------------------------*/

                    $thumbnailImagePartners->fit(270, 311, function ($constraint) {
                        $constraint->upsize();
                    });

                    $thumbnailImagePartners->save($partnerPostPath.time().$imgName);
                    /*---------------------------------------------------------------------------------------------------------------------------------*/

                    $thumbnailImageRecent->fit(115, 106, function ($constraint) {
                        $constraint->upsize();
                    });

                    $thumbnailImageRecent->save($recentPostPath.time().$imgName);
                    /*---------------------------------------------------------------------------------------------------------------------------------*/


//                    /*$img = $request->file('img')->store('Posts' .'/'. date('FY'), 'public');*/
                }
                if ($request->file('img')) {
                    $post->img = time().$imgName;
                }elseif ($request->null_image){
                    $post->img = null;
                }
                $post->status = $request->status;
                $post->category_id = $request->get('category');
                $post->event_date = $request->event_date;
                if ($request->banner == 'on'){
                    $post->banner = 1;
                }else{
                    $post->banner = 0;
                }
                $post->save();

                DB::table('post_lang')
                    ->where('post_id', $id)
                    ->where('lang_id', $lang_id)
                    ->update([
                        'title' => $request->title,
                        'description' => $request->description,
                        'content' => $request->body,
                        'updated_at' => now(),
                    ]);
                $notification = array(
                    'message' => 'Post has been updated successfully',
                    'alert-type' => 'success',
                );
            }else{
                if ($request->file('img')){
                    $originalImage = $request->file('img');
                    $thumbnailImageHandwriting = Image::make($originalImage);
                    $thumbnailImageRecent = Image::make($originalImage);
                    $thumbnailImagePartners = Image::make($originalImage);

                    $imgName = str_replace(" ", '-', $originalImage->getClientOriginalName());

                    Storage::disk('local')->makeDirectory('public/posts');
                    Storage::disk('local')->makeDirectory('public/handwritingPostsThumbnail');
                    Storage::disk('local')->makeDirectory('public/recentPostsThumbnail');
                    Storage::disk('local')->makeDirectory('public/partnerPostsThumbnail');

                    $thumbnailHandwritingPath = storage_path().'/app/public/handwritingPostsThumbnail/';
                    $recentPostPath = storage_path().'/app/public/recentPostsThumbnail/';
                    $partnerPostPath = storage_path().'/app/public/partnerPostsThumbnail/';
                    $originalPath = storage_path().'/app/public/posts/';

                    $thumbnailImageRecent->save($originalPath.time().$imgName);

                    $thumbnailImageHandwriting->resize(270, 324, function ($constraint) {
                        $constraint->aspectRatio();
                    });

                    /*---------------------------------------------------------------------------------------------------------------------------------*/

                    $thumbnailImageHandwriting->save($thumbnailHandwritingPath.time().$imgName);
                    /*---------------------------------------------------------------------------------------------------------------------------------*/

                    $thumbnailImagePartners->resize(270, 311, function ($constraint) {
                        $constraint->aspectRatio();
                    });

                    $thumbnailImagePartners->save($partnerPostPath.time().$imgName);
                    /*---------------------------------------------------------------------------------------------------------------------------------*/

                    $thumbnailImageRecent->resize(115, 106, function ($constraint) {
                        $constraint->aspectRatio();
                    });

                    $thumbnailImageRecent->save($recentPostPath.time().$imgName);
                    /*---------------------------------------------------------------------------------------------------------------------------------*/

                    $post->img = time().$imgName;
                }
                $post->status = $request->status;
                $post->save();

                DB::table('post_lang')
                    ->insert([
                        'post_id' => $id,
                        'lang_id' => $lang_id,
                        'title' => $request->title,
                        'description' => $request->description,
                        'content' => $request->body,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                $notification = array(
                    'message' => 'Post has been created successfully',
                    'alert-type' => 'success',
                );
            }
            return redirect()->back()->with($notification);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menu = Post::find($id);
        $menu->delete();

        DB::table('post_lang')
        ->where('post_id', $id)->delete();

        $notification = array(
            'message' => 'Post has been deleted successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);

    }
}
