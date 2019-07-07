<?php

namespace App\Http\Controllers;

use App\Album;
use App\Gallery;
use App\GalleryImage;
use App\Language;
use App\Post;
use App\Uploader\FancyFileUploaderHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = Gallery::with('album')->latest()->paginate(10);
        return view('admin.contents.galleries.galleries', [
            'galleries' => $galleries
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locale = \App::getLocale();
        $lang = Language::where('lang', $locale)->first();
        $albums = DB::table('albums')
            ->join('album_lang', 'albums.id', 'album_lang.album_id')
            ->where('album_lang.lang_id', $lang->id)
            ->select('albums.id', 'album_lang.title')
            ->get();
        return view('admin.contents.galleries.add', [
            'albums' => $albums
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
        if (isset($_REQUEST["action"]) && $_REQUEST["action"] === "fileuploader")
        {
            header("Content-Type: application/json");

            $allowedexts = array(
                "jpg" => true,
                "jpeg" => true,
                "png" => true,
            );

            $files = FancyFileUploaderHelper::NormalizeFiles("files");
            if (!isset($files[0]))  $result = array("success" => false, "error" => "File data was submitted but is missing.", "errorcode" => "bad_input");
            else if (!$files[0]["success"])  $result = $files[0];
            else if (!isset($allowedexts[strtolower($files[0]["ext"])]))
            {
                $result = array(
                    "success" => false,
                    "error" => "Invalid file extension.  Must be '.jpg' or '.png'.",
                    "errorcode" => "invalid_file_ext"
                );
            }
            else
            {
                // For chunked file uploads, get the current filename and starting position from the incoming headers.
                $name = FancyFileUploaderHelper::GetChunkFilename();

                if ($name !== false)
                {
                    $startpos = FancyFileUploaderHelper::GetFileStartPosition();
                }
                else
                {
                    if (isset($_REQUEST['status']) && isset($_REQUEST['album_id'])){
                        $status = $_REQUEST['status'];
                        $album_id = $_REQUEST['album_id'];

                        $exist = Gallery::where('album_id', $album_id)->first();
                        if ($exist){
                            $gallery = DB::table('galleries')->where('album_id', $album_id)->first();
                        }else{
                            $gallery = new Gallery();
                            $gallery->album_id = $album_id;
                            $gallery->status = $status;
                            $gallery->user_id = Auth::id();
                            $gallery->save();
                        }

                        $img_name = explode('.', $files[0]['name']);
                        $img_name = $img_name[0];
                        $filename = $request->file('files')->store('Gallery'.'/'. date('FY'), 'public');
                        DB::table('gallery_images')
                                ->insert([
                                    'name' => $img_name,
                                    'path' => $filename,
                                    'size' => $files[0]['size'],
                                    'gallery_id' => $gallery->id,
                                ]);
                    }
                }

                $result = array(
                    "success" => true
                );
            }
            echo json_encode($result, JSON_UNESCAPED_SLASHES);
            exit();
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $locale = \App::getLocale();
        $lang = Language::where('lang', $locale)->first();
        $albums = DB::table('albums')
            ->join('album_lang', 'albums.id', 'album_lang.album_id')
            ->where('album_lang.lang_id', $lang->id)
            ->select('albums.id', 'album_lang.title')
            ->get();

        /*$gallery = DB::table('galleries')
            ->join('gallery_images', 'galleries.id', 'gallery_images.gallery_id')
            ->select('galleries.id','galleries.album_id','galleries.status', 'gallery_images.name',
                'gallery_images.path', 'gallery_images.size', 'gallery_images.gallery_id')
            ->where('galleries.id', $id)
            ->first();*/
        $gallery = Gallery::find($id);

        $current_album = DB::table('albums')
            ->join('album_lang', 'albums.id', 'album_lang.album_id')
            ->where('album_lang.lang_id', $lang->id)
            ->where('album_lang.id', $gallery->album_id)
            ->select('albums.id', 'album_lang.title')
            ->first();

        $images = GalleryImage::where('gallery_id', $id)->get();
        return view('admin.contents.galleries.edit', [
           'gallery' => $gallery,
            'albums' => $albums,
            'images' => $images,
            'current_album' => $current_album
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (isset($_REQUEST["action"]) && $_REQUEST["action"] === "fileuploader")
        {
            header("Content-Type: application/json");

            $allowedexts = array(
                "jpg" => true,
                "jpeg" => true,
                "png" => true,
            );

            $files = FancyFileUploaderHelper::NormalizeFiles("files");
            if (!isset($files[0]))  $result = array("success" => false, "error" => "File data was submitted but is missing.", "errorcode" => "bad_input");
            else if (!$files[0]["success"])  $result = $files[0];
            else if (!isset($allowedexts[strtolower($files[0]["ext"])]))
            {
                $result = array(
                    "success" => false,
                    "error" => "Invalid file extension.  Must be '.jpg' or '.png'.",
                    "errorcode" => "invalid_file_ext"
                );
            }
            else
            {
                // For chunked file uploads, get the current filename and starting position from the incoming headers.
                $name = FancyFileUploaderHelper::GetChunkFilename();
                if ($name !== false)
                {
                    $startpos = FancyFileUploaderHelper::GetFileStartPosition();
                }
                else
                {
                    if (isset($_REQUEST['status']) && isset($_REQUEST['album_id'])){
                        $status = $_REQUEST['status'];
                        $album_id = $_REQUEST['album_id'];

                        $exist = Gallery::where('album_id', $album_id)->first();
                        if ($exist){
                            $gallery = Gallery::where('album_id', $album_id)->first();
                            $gallery->status = $status;
                            $gallery->album_id = $album_id;
                            $gallery->save();
                        }else{
                            $gallery = new Gallery();
                            $gallery->album_id = $album_id;
                            $gallery->status = $status;
                            $gallery->user_id = Auth::id();
                            $gallery->save();
                        }

                        $img_name = explode('.', $files[0]['name']);
                        $img_name = $img_name[0];
                        $filename = $request->file('files')->store('Gallery'.'/'. date('FY'), 'public');

                        DB::table('gallery_images')
                            ->insert([
                                'name' => $img_name,
                                'path' => $filename,
                                'size' => $files[0]['size'],
                                'gallery_id' => $gallery->id,
                                'created_at' => now(),
                                'updated_at' => now(),
                            ]);
                    }
                }

                $result = array(
                    "success" => true
                );
            }
            echo json_encode($result, JSON_UNESCAPED_SLASHES);
            exit();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gallery = Gallery::find($id);
        GalleryImage::where('gallery_id', $id)->delete();
        $gallery->delete();
        $notification = array(
            'message' => 'Gallery has been deleted successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

    public function imageDestroy($id)
    {
        $img = GalleryImage::find($id);
        $img->delete();
        return redirect()->back();
    }

    public function updateUpdate(Request $request)
    {
        $status = $request->status;
        $album_id = $request->album_id;
        $gallery_id = $request->gallery_id;
        if ($album_id) {
            $img = Gallery::where('id', $gallery_id)->first();
            $img->album_id = $album_id;
            $img->updated_at = now();
            $img->save();
            return 'album';
        }

        if ($status) {
            $img = Gallery::where('id', $gallery_id)->first();
            if ($status == 'true'){
                $img->status = 1;
            }elseif($status == 'false'){
                $img->status = 0;
            }
            $img->updated_at = now();
            $img->save();
            return 'status';
        }
    }
}
