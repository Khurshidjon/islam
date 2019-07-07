<?php

namespace App\Http\Controllers;

use App\Album;
use App\Comment;
use App\Gallery;
use App\GalleryImage;
use App\Language;
use App\Message;
use App\Post;
use App\Setting;
use App\Subscriber;
use App\User;
use ChrisKonnertz\OpenGraph\OpenGraph;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    /*Index view. Open first page*/
    public function index(Request $request)
    {
        $q = $request->search_text;

        $locale = App::getLocale();
        $language = Language::where('lang', $locale)->first();



        $banners = DB::table('posts')
            ->join('post_lang', 'posts.id', 'post_lang.post_id')
            ->select('posts.id', 'posts.img', 'posts.status', 'post_lang.title', 'post_lang.description', 'post_lang.content')
            ->where('posts.banner', 1)
            ->where('posts.status', 1)
            ->orderBy('posts.created_at', 'DESC')
            ->where('post_lang.lang_id', $language->id)
            ->take(5)
            ->get();

        $albums = DB::table('albums')
            ->join('album_lang', 'albums.id', 'album_lang.album_id')
            ->select('albums.id', 'albums.status', 'albums.order_by', 'albums.user_id', 'albums.filename', 'album_lang.title', 'album_lang.lang_id')
            ->where('album_lang.lang_id', $language->id)
            ->where('albums.status', 1)
            ->orderBy('order_by','ASC')
            ->get();


        $galleries = DB::table('galleries')
            ->join('gallery_images', 'galleries.id', 'gallery_images.gallery_id')
            ->select('galleries.album_id', 'gallery_images.name', 'gallery_images.size','gallery_images.path')
             ->where('galleries.album_id', '!=', null)
             ->where('galleries.status', '!=', 0)
            ->take(16)
             ->get();

        $comments  = DB::table('comments')
                        ->join('comment_langs', 'comments.id', 'comment_langs.comment_id')
                        ->select('comments.id', 'comments.image', 'comments.name', 'comment_langs.text')
                        ->where('comment_langs.lang_id', '=',  $language->id)
                        ->where('comments.status', 1)
                        ->get();


        $id1 = Setting::where('key', 'post1')->first();
        $id2 = Setting::where('key', 'post2')->first();
        $id3 = Setting::where('key', 'post3')->first();

        $c_id1 = DB::table('settings_lang')->where('setting_id', $id1->id)->select('val')->first();
        $c_id2 = DB::table('settings_lang')->where('setting_id', $id2->id)->select('val')->first();
        $c_id3 = DB::table('settings_lang')->where('setting_id', $id3->id)->select('val')->first();

        $latest_events = DB::table('posts')
            ->join('post_lang', 'posts.id', 'post_lang.post_id')
            ->select('posts.id', 'posts.category_id','posts.user_id', 'posts.created_at', 'posts.seen_count', 'posts.img', 'posts.created_at as sana', 'post_lang.title', 'post_lang.description', 'post_lang.content')
            ->where('posts.status', 1)
            ->where('posts.category_id', '!=',2)->orderBy('posts.created_at','DESC')->take(2)->where('post_lang.lang_id', $language->id)->where('posts.category_id', '=', $c_id1->val)->get();

        $teaching_events = DB::table('posts')
            ->join('post_lang', 'posts.id', 'post_lang.post_id')
            ->select('posts.id', 'posts.category_id','posts.user_id', 'posts.created_at', 'posts.seen_count', 'posts.img', 'posts.created_at as sana', 'post_lang.title', 'post_lang.description', 'post_lang.content')
            ->where('posts.status', 1)
            ->where('posts.category_id', '!=',2)->orderBy('posts.created_at','DESC')->take(3)->skip(2)->where('post_lang.lang_id', $language->id)->where('posts.category_id', '=', $c_id1->val)->get();
        $our_causes_news = DB::table('posts')
            ->join('post_lang', 'posts.id', 'post_lang.post_id')
            ->select('posts.id', 'posts.category_id','posts.user_id', 'posts.created_at', 'posts.seen_count', 'posts.img', 'posts.created_at as sana', 'post_lang.title', 'post_lang.description', 'post_lang.content')
            ->where('posts.status', 1)
            ->where('posts.category_id', '!=',2)->orderBy('posts.created_at','DESC')->take(3)->where('post_lang.lang_id', $language->id)->where('posts.category_id', '=', $c_id2->val)->get();
        $latest_news_one = DB::table('posts')
            ->join('post_lang', 'posts.id', 'post_lang.post_id')
            ->select('posts.id', 'posts.category_id','posts.user_id', 'posts.created_at', 'posts.seen_count', 'posts.img', 'posts.created_at as sana', 'post_lang.title', 'post_lang.description', 'post_lang.content')
            ->where('posts.status', 1)
            ->where('posts.category_id', '!=',2)->orderBy('posts.created_at','DESC')->take(1)->skip(2)->where('post_lang.lang_id', $language->id)->where('posts.category_id', '=', $c_id3->val)->get();
        $latest_news_two = DB::table('posts')
            ->join('post_lang', 'posts.id', 'post_lang.post_id')
            ->select('posts.id', 'posts.category_id','posts.user_id', 'posts.created_at', 'posts.seen_count', 'posts.img', 'posts.created_at as sana', 'post_lang.title', 'post_lang.description', 'post_lang.content')
            ->where('posts.status', 1)
            ->where('posts.category_id', '!=',2)->orderBy('posts.created_at','DESC')->take(2)->where('post_lang.lang_id', $language->id)->where('posts.category_id', '=', $c_id3->val)->get();


        $partners = DB::table('posts')
            ->join('post_lang', 'posts.id', 'post_lang.post_id')
            ->select('posts.id', 'posts.category_id','posts.user_id', 'posts.created_at', 'posts.seen_count', 'posts.img', 'posts.created_at as sana', 'post_lang.title', 'post_lang.description', 'post_lang.content')
            ->where('posts.status', 1)
            ->where('posts.category_id', '!=',2)->orderBy('posts.created_at','DESC')->where('post_lang.lang_id', $language->id)->where('posts.category_id', '=', 8)->get();

        $handwriting = DB::table('posts')
            ->join('post_lang', 'posts.id', 'post_lang.post_id')
            ->select('posts.id', 'posts.category_id','posts.user_id', 'posts.created_at', 'posts.seen_count', 'posts.img', 'posts.created_at as sana', 'post_lang.title', 'post_lang.description', 'post_lang.content')
            ->where('posts.status', 1)
            ->where('posts.category_id', '!=',2)->orderBy('posts.created_at','DESC')->take(4)->where('post_lang.lang_id', $language->id)->where('posts.category_id', '=', 6)->get();

        $youtube_video = DB::table('settings')
            ->join('settings_lang', 'settings.id', 'settings_lang.setting_id')
            ->select('settings_lang.val')
            ->where('settings_lang.lang_id', $language->id)
            ->where('settings.key', 'youtube1')
            ->first();
        $about_center = DB::table('settings')
            ->join('settings_lang', 'settings.id', 'settings_lang.setting_id')
            ->select('settings_lang.val', 'settings.url')
            ->where('settings_lang.lang_id', $language->id)
            ->where('settings.key', 'markaz')
            ->first();
        $row1 = DB::table('settings')
            ->join('settings_lang', 'settings.id', 'settings_lang.setting_id')
            ->select('settings_lang.val', 'settings.url')
            ->where('settings_lang.lang_id', $language->id)
            ->where('settings.key', 'row1')
            ->first();
        $row2 = DB::table('settings')
            ->join('settings_lang', 'settings.id', 'settings_lang.setting_id')
            ->select('settings_lang.val', 'settings.url')
            ->where('settings_lang.lang_id', $language->id)
            ->where('settings.key', 'row2')
            ->first();
        $row3 = DB::table('settings')
            ->join('settings_lang', 'settings.id', 'settings_lang.setting_id')
            ->select('settings_lang.val', 'settings.url')
            ->where('settings_lang.lang_id', $language->id)
            ->where('settings.key', 'row3')
            ->first();
        $row4 = DB::table('settings')
            ->join('settings_lang', 'settings.id', 'settings_lang.setting_id')
            ->select('settings_lang.val', 'settings.url')
            ->where('settings_lang.lang_id', $language->id)
            ->where('settings.key', 'row4')
            ->first();
        $col1 = DB::table('settings')
            ->join('settings_lang', 'settings.id', 'settings_lang.setting_id')
            ->select('settings_lang.val', 'settings.url')
            ->where('settings_lang.lang_id', $language->id)
            ->where('settings.key', 'col1')
            ->first();
        $col2 = DB::table('settings')
            ->join('settings_lang', 'settings.id', 'settings_lang.setting_id')
            ->select('settings_lang.val', 'settings.url')
            ->where('settings_lang.lang_id', $language->id)
            ->where('settings.key', 'col2')
            ->first();
        $col3 = DB::table('settings')
            ->join('settings_lang', 'settings.id', 'settings_lang.setting_id')
            ->select('settings_lang.val', 'settings.url')
            ->where('settings_lang.lang_id', $language->id)
            ->where('settings.key', 'col3')
            ->first();
        $col4 = DB::table('settings')
            ->join('settings_lang', 'settings.id', 'settings_lang.setting_id')
            ->select('settings_lang.val', 'settings.url')
            ->where('settings_lang.lang_id', $language->id)
            ->where('settings.key', 'col4')
            ->first();

        return view('frontend.index', [
            'banners' => $banners,
            'albums' => $albums,
            'galleries' => $galleries,
            'comments' => $comments,
            'latest_events' => $latest_events,
            'teaching_events' => $teaching_events,
            'our_causes_news' => $our_causes_news,
            'latest_news_one' => $latest_news_one,
            'latest_news_two' => $latest_news_two,
            'partners' => $partners,
            'handwriting' => $handwriting,
            'youtube_video' => $youtube_video,
            'about_center' => $about_center,
            'row1' => $row1,
            'row2' => $row2,
            'row3' => $row3,
            'row4' => $row4,
            'col1' => $col1,
            'col2' => $col2,
            'col3' => $col3,
            'col4' => $col4,
            'q' => $q,
        ]);
    }

    /*Open about us page*/
    public function about()
    {
        return view('frontend.about');
    }

    public function albums(Request $request)
    {
        $q = $request->search_text;
        $locale = \App::getLocale();
        $lang = Language::where('lang', $locale)->first();
        $albums = DB::table('albums')
            ->join('album_lang', 'albums.id', 'album_lang.album_id')
            ->where('album_lang.lang_id', $lang->id)
            ->select('albums.status', 'albums.order_by', 'albums.user_id', 'albums.filename', 'albums.id', 'album_lang.title', 'album_lang.description', 'album_lang.lang_id')
            ->where('albums.status', 1)
            ->orderBy('order_by','DESC')
            ->paginate(10);

        return view('frontend.albums', [
            'q' => $q,
            'albums' => $albums
        ]);
    }
    public function gallery(Request $request, $id)
    {
        $q = $request->search_text;
        $locale = \App::getLocale();
        $lang = Language::where('lang', $locale)->first();
        $album_id = DB::table('albums')
            ->join('album_lang', 'albums.id', 'album_lang.album_id')
            ->where('albums.id', $id)
            ->select('albums.id')
            ->where('album_lang.lang_id', $lang->id)->first();
        if ($album_id == null){
            $notification = array(
                'message' => 'Ushbu tilda yaratilgan albomlar majud emas',
                'alert-type' => 'warning',
            );
            return redirect()->route('albums')->with($notification);
        }
        $gallery = Gallery::with('album')->where('album_id', $album_id->id)->where('status', 1)->first();

        $album = DB::table('albums')
            ->join('album_lang', 'albums.id', 'album_lang.album_id')
            ->select('albums.status', 'albums.order_by', 'albums.user_id', 'albums.filename', 'albums.id', 'album_lang.title', 'album_lang.description', 'album_lang.lang_id')
            ->where('album_lang.lang_id', $lang->id)
            ->where('albums.status', 1)
            ->where('albums.id', $id)
            ->first();
        if ($album == null || $gallery == null){
            $notification = array(
                'message' => 'Ushbu tilda yaratilgan albomlar majud emas',
                'alert-type' => 'warning',
            );
            return redirect()->route('albums')->with($notification);
        }
        $galleries = GalleryImage::where('gallery_id', $gallery->id)->get();

        return view('frontend.galleries', [
            'q' => $q,
            'galleries' => $galleries,
            'album' => $album
        ]);
    }

    /*Open single sermons page*/
    public function sermonsSingle()
    {
        return view('frontend.sermons-single');
    }

    /*Open blog details page*/
    public function blogDetails(Request $request, $id)
    {
        $locale = App::getLocale();
        $language = Language::where('lang', $locale)->first();
        $q = $request->search_text;

        $post = DB::table('posts')
            ->join('post_lang', 'posts.id', 'post_lang.post_id')
            ->select('posts.id', 'posts.event_date',  'posts.category_id', 'posts.created_at', 'posts.user_id', 'posts.seen_count','posts.img', 'posts.status', 'post_lang.title', 'post_lang.description', 'post_lang.content')
            ->where('post_lang.lang_id', $language->id)
            ->where('posts.id', $id)
            ->first();

        $ppp = Post::find($id);

        if(!isset($_COOKIE[$ppp->id])){
            $ppp->seen_count++;
            setcookie($ppp->id, $ppp->id, time()+60*60*24*30);
            $ppp->save();
        }



        if ($post){
            $user = User::find($post->user_id);
        }
        else{
            $user = null;
        }
        if (!isset($post->category_id)){
            return redirect()->route('index');
        }

        $categories = DB::table('categories')
            ->join('category_lang', 'categories.id', 'category_lang.category_id')
            ->select('categories.id', 'category_lang.name')
            ->where('category_lang.category_id', '!=', 2)
            ->where('categories.status' ,1)
            ->where('category_lang.lang_id', $language->id)
            ->get();
        $recent_posts = DB::table('posts')
            ->join('post_lang', 'posts.id', 'post_lang.post_id')
            ->where('post_lang.lang_id', $language->id)
            ->select('posts.id', 'posts.category_id', 'posts.event_date', 'posts.created_at', 'posts.user_id', 'posts.seen_count','posts.img', 'posts.status', 'post_lang.title', 'post_lang.description', 'post_lang.content')
            ->where('posts.category_id', '!=', 2)
            ->orderBy('posts.created_at', 'DESC')
            ->get();
        if (count($recent_posts) < 3){
            $recent_posts = $recent_posts->random(count($recent_posts));
        }else{
            $recent_posts = $recent_posts->random(3);
        }

        return view('frontend.blog-details', [
            'post' => $post,
            'user' => $user,
            'categories' => $categories,
            'recent_posts' => $recent_posts,
            'q' => $q
        ]);
    }

    /*Open searching result page*/

    public function searching(Request $request)
    {
        $q = $request->search_text;
        $q = htmlspecialchars($q);
        $date = date('Y-m-d h:i:s', strtotime($request->search_date));
        if ($q == null or $date == null){
            return redirect()->route('index');
        }
        $locale = App::getLocale();
        $language = Language::where('lang', $locale)->first();

        $posts = DB::table('posts')
            ->leftJoin('post_lang', 'posts.id', 'post_lang.post_id')
            ->select('posts.id','posts.user_id', 'posts.img', 'posts.created_at as sana', 'post_lang.title', 'post_lang.description', 'post_lang.content')
            ->where('posts.status', 1)
            ->where('post_lang.lang_id', $language->id)
            ->where(function($query) use($q) {
                $query->where('post_lang.title', 'like' , '%'. $q .'%')
                  ->orWhere('post_lang.description', 'like' , '%'. $q .'%')
                  ->orWhere('post_lang.content', 'like' , '%'. $q .'%');
                })
            ->orWhereDate('posts.created_at',  $date)
            ->orderBy('posts.created_at','DESC')
            ->get();

        return view('frontend.searching', [
            'posts' => $posts,
            'q' => $q
        ]);
    }


    public function subscribers(Request $request)
    {
        $email = $request->subscribers;

        $validate = \Validator::make($request->all(), [
            'subscribers' => 'required|email',
        ]);
        $exist = Subscriber::where('subscribers', $email)->first();
        if ($validate->fails()){
            return 'error';
        }elseif ($exist){
            return 'exist';
        }
        else{
            $subs = new Subscriber();
            $subs->subscribers = $email;
            $subs->save();
//            Mail::to($subs->subscribers)->send(new \App\Mail\Subscriber($subs));
            return 'ok';
        }

    }


    /*Open news page*/
    public function news(Request $request)
    {
        $q = $request->search_text;

        $locale = App::getLocale();
        $language = Language::where('lang', $locale)->first();

        $posts = DB::table('posts')
            ->join('post_lang', 'posts.id', 'post_lang.post_id')
            ->select('posts.id', 'posts.category_id','posts.user_id', 'posts.created_at', 'posts.seen_count', 'posts.img', 'posts.created_at', 'post_lang.title', 'post_lang.description', 'post_lang.content')
            ->where('posts.status', 1)
            ->where('posts.category_id', '!=',2)
            ->orderBy('posts.created_at','DESC')
            ->where('post_lang.lang_id', $language->id)
            ->paginate(10);

        $categories = DB::table('categories')
            ->join('category_lang', 'categories.id', 'category_lang.category_id')
            ->select('categories.id', 'category_lang.name')
            ->where('category_lang.category_id', '!=', 2)
            ->where('categories.status' ,1)
            ->where('category_lang.lang_id', $language->id)
            ->get();
        $recent_posts = DB::table('posts')
            ->join('post_lang', 'posts.id', 'post_lang.post_id')
            ->select('posts.id', 'posts.category_id', 'posts.event_date', 'posts.created_at', 'posts.user_id', 'posts.seen_count','posts.img', 'posts.status', 'post_lang.title', 'post_lang.description', 'post_lang.content')
            ->where('post_lang.lang_id', $language->id)
            ->where('posts.category_id', '!=',2)
            ->orderBy('posts.created_at', 'DESC')
            ->get();
        if (count($recent_posts) < 3){
            $recent_posts = $recent_posts->random(count($recent_posts));
        }else{
            $recent_posts = $recent_posts->random(3);
        }

        return view('frontend.news', [
            'q' => $q,
            'posts' => $posts,
            'recent_posts' => $recent_posts,
            'categories' => $categories
        ]);
    }

    /*Open donate page*/
    public function donate()
    {
        return view('frontend.donate');
    }

    public function checkout()
    {
        return view('frontend.checkout');
    }

    /*Open event list page*/

    public function eventList(Request $request, $id)
    {
        $locale = App::getLocale();
        $language = Language::where('lang', $locale)->first();
        $q = $request->search_text;

        $category = DB::table('categories')
            ->join('category_lang', 'categories.id', 'category_lang.category_id')
            ->select('categories.id', 'category_lang.name')
            ->where('category_lang.category_id', '!=', 2)
            ->where('categories.status' ,1)
            ->where('categories.id', $id)
            ->where('category_lang.lang_id', $language->id)
            ->first();

        $posts = DB::table('posts')
            ->join('post_lang', 'posts.id', 'post_lang.post_id')
            ->select('posts.id', 'posts.category_id','posts.user_id', 'posts.created_at', 'posts.seen_count', 'posts.img', 'posts.created_at', 'post_lang.title', 'post_lang.description', 'post_lang.content')
            ->where('posts.status', 1)
            ->where('posts.category_id', $id)
            ->orderBy('posts.created_at','DESC')
            ->where('post_lang.lang_id', $language->id)
            ->paginate(10);

        $categories = DB::table('categories')
            ->join('category_lang', 'categories.id', 'category_lang.category_id')
            ->select('categories.id', 'category_lang.name')
            ->where('category_lang.category_id', '!=', 2)
            ->where('categories.status' ,1)
            ->where('category_lang.lang_id', $language->id)
            ->get();
        $recent_posts = DB::table('posts')
            ->join('post_lang', 'posts.id', 'post_lang.post_id')
            ->select('posts.id', 'posts.category_id', 'posts.event_date', 'posts.created_at', 'posts.user_id', 'posts.seen_count','posts.img', 'posts.status', 'post_lang.title', 'post_lang.description', 'post_lang.content')
            ->where('post_lang.lang_id', $language->id)
            ->orderBy('posts.created_at', 'DESC')
            ->get();
        if (count($recent_posts) < 3){
            $recent_posts = $recent_posts->random(count($recent_posts));
        }else{
            $recent_posts = $recent_posts->random(3);
        }

        return view('frontend.event-list', [
            'q' => $q,
            'posts' => $posts,
            'category' => $category,
            'categories' => $categories,
            'recent_posts' => $recent_posts
        ]);
    }

    /*Single cause page*/
    public function singleCause()
    {
        return view('frontend.single-cause');
    }

    /* Open shopping page */
    public function shopping()
    {
        return view('frontend.shop');
    }

    /*Open single shop product*/
    public function shopDetails()
    {
        return view('frontend.shop-details');
    }

    public function contacts(Request $request)
    {
        $locale = App::getLocale();
        $lang = Language::where('lang', $locale)->first();
        $email = DB::table('settings')
            ->join('settings_lang', 'settings.id', 'settings_lang.setting_id')
            ->select('settings_lang.val', 'settings.url')
            ->where('settings.key', 'email')->first();

        $phone = DB::table('settings')
            ->join('settings_lang', 'settings.id', 'settings_lang.setting_id')
            ->select('settings_lang.val', 'settings.url')
            ->where('settings.key', 'phone')->first();
        $address = DB::table('settings')
            ->join('settings_lang', 'settings.id', 'settings_lang.setting_id')
            ->select('settings_lang.val', 'settings.url')
            ->where('settings_lang.lang_id', $lang->id)
            ->where('settings.key', 'address')->first();

        $q = $request->search_text;
        return view('frontend.contacts', [
            'q' => $q,
            'email' => $email,
            'phone' => $phone,
            'address' => $address,
        ]);
    }

    public function message(Request $request)
    {
        $validate = Validator::make($request->all(), [
                        'firstname' => 'required|string|max:255',
                        'lastname' => 'required|string|max:255',
                        'phone' => 'required|string|max:255',
                        'email' => 'required|email|string|max:255',
                        'captcha' => 'required|captcha',
                        'message' => 'required',
                    ]);
        if ($validate->fails()){
            $noty = array(
                'message' => __('pages.error_message'),
                'alert-type' => 'error',
            );
            return redirect()->back()
                ->withErrors($validate)
                ->withInput()
                ->with($noty);
        }else{
            $message = new Message();
            $message->firstname = $request->firstname;
            $message->lastname = $request->lastname;
            $message->email = $request->email;
            $message->phone = $request->phone;
            $message->message = $request->message;
            $message->save();
            $noty = array(
                'message' => __('pages.success_message'),
                'alert-type' => 'success',
            );
            return redirect()->back()->with($noty);
        }
    }


    public function refreshCaptcha()
    {
        $captcha = captcha_img('flat');
        return $captcha;
    }
}
