<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

View::composer('layouts.main', function($views){
    $locale = App::getLocale();
    $lang = App\Language::where('lang', $locale)->first();
    $languages = \App\Language::where('status', 'active')->orderBy('order', 'ASC')->get();
    $menus = \App\Menu::join('menu_lang', 'menus.id','menu_lang.menu_id')
        ->select('menus.url', 'menus.parent', 'menus.order', 'menus.id', 'menu_lang.name')
        ->where('menus.status', 1)
        ->where('menus.parent', null)
        ->where('menus.position', 1)
        ->where('menu_lang.lang_id', $lang->id)
        ->orderBy('order', 'ASC')
        ->get();

    $random_images = DB::table('galleries')
                            ->join('gallery_images', 'galleries.id', 'gallery_images.gallery_id')
                            ->select('galleries.album_id', 'gallery_images.name', 'gallery_images.size','gallery_images.path')
                            ->where('galleries.album_id', '!=', null)
                            ->where('galleries.status', 1)
                            ->get()->random(9);

    $footer_menus = \App\Menu::join('menu_lang', 'menus.id','menu_lang.menu_id')
        ->select('menus.url', 'menus.parent', 'menus.order', 'menus.id', 'menu_lang.name')
        ->where('menu_lang.lang_id', $lang->id)
        ->where('menus.status', 1)
        ->where('menus.position', 2)
        ->orderBy('order', 'ASC')
        ->get();

    $email = DB::table('settings')
        ->join('settings_lang', 'settings.id', 'settings_lang.setting_id')
        ->select('settings_lang.val', 'settings.url')
        ->where('settings.key', 'email')->first();

    $telegram = DB::table('settings')
        ->join('settings_lang', 'settings.id', 'settings_lang.setting_id')
        ->select('settings_lang.val', 'settings.url')
        ->where('settings.key', 'telegram')->first();
    $facebook = DB::table('settings')
        ->join('settings_lang', 'settings.id', 'settings_lang.setting_id')
        ->select('settings_lang.val', 'settings.url')
        ->where('settings.key', 'facebook')->first();
    $instagram = DB::table('settings')
        ->join('settings_lang', 'settings.id', 'settings_lang.setting_id')
        ->select('settings_lang.val', 'settings.url')
        ->where('settings.key', 'instagram')->first();
    $twitter = DB::table('settings')
        ->join('settings_lang', 'settings.id', 'settings_lang.setting_id')
        ->select('settings_lang.val', 'settings.url')
        ->where('settings.key', 'twitter')->first();
    $phone = DB::table('settings')
        ->join('settings_lang', 'settings.id', 'settings_lang.setting_id')
        ->select('settings_lang.val', 'settings.url')
        ->where('settings.key', 'phone')->first();
    $address = DB::table('settings')
        ->join('settings_lang', 'settings.id', 'settings_lang.setting_id')
        ->select('settings_lang.val', 'settings.url')
        ->where('settings_lang.lang_id', $lang->id)
        ->where('settings.key', 'address')->first();

    $views->with([
        'menus' => $menus,
        'languages' => $languages,
        'locale' => $locale,
        'footer_menus' => $footer_menus,
        'random_images' => $random_images,
        'telegram' => $telegram,
        'facebook' => $facebook,
        'instagram' => $instagram,
        'twitter' => $twitter,
        'email' => $email,
        'phone' => $phone,
        'address' => $address
    ]);
});

Route::get('/', 'HomeController@index')->name('index');

Route::get('/blog-details/{id}', 'HomeController@blogDetails')->name('blog.details');

Route::get('/searching', 'HomeController@searching')->name('searching');

Route::post('/subscribers', 'HomeController@subscribers')->name('subscribers');

Route::get('/albums', 'HomeController@albums')->name('albums');

Route::get('/album/{id}', 'HomeController@gallery')->name('gallery');

Route::get('/news', 'HomeController@news')->name('news');

Route::get('/news-by-category/{id}', 'HomeController@eventList')->name('event.list');

Route::get('/contacts', 'HomeController@contacts')->name('contacts');



Route::get('/about-us', 'HomeController@about')->name('about');

Route::post('/message', 'HomeController@message')->name('send.message');

Route::get('/sermons-single', 'HomeController@sermonsSingle')->name('sermons.single');

Route::get('/checkout', 'HomeController@checkout')->name('checkout');

Route::get('/donate', 'HomeController@donate')->name('donate');


Route::get('/single-cause', 'HomeController@singleCause')->name('single.cause');

Route::get('/shopping', 'HomeController@shopping')->name('shopping');

Route::get('/single-product', 'HomeController@shopDetails')->name('shop-details');


Route::get('/refresh_captcha', 'HomeController@refreshCaptcha')->name('refresh_captcha');


Route::get('index/{lang}', function ($lang) {
    \Session::put('lang', $lang);
    return redirect()->back();
})->name('locale');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');




/*Admin panel*/
Route::group(['prefix' => 'admin'], function (){

    Route::get('/login', 'AdminController@loginPage')->name('admin.login');

    Route::get('/', 'AdminController@index')->name('admin.index');

    Route::middleware(['is_admin', 'auth'])->group(function () {
        Route::get('/account', 'AdminController@edit')->name('user.account.edit');
        Route::post('/account/update', 'AdminController@update')->name('user.account.update');



        Route::get('/users', 'AdminController@users')->name('users.index');
        Route::get('/users/add', 'AdminController@userAddForm')->name('users.add');
        Route::post('/users/create', 'AdminController@userCreate')->name('users.create');

        Route::get('/users/{user}/edit', 'AdminController@userEdit')->name('users.edit');
        Route::post('/user/{permission}/{user}/attach', 'AdminController@userPermissionAttach')->name('users-permission.attach');
        Route::post('/user/{permission}/{user}/detach', 'AdminController@userPermissionDetach')->name('users-permission.detach');
        Route::post('/user/{role}/{user}/attach/role', 'AdminController@userRoleAttach')->name('users-role.attach');
        Route::post('/user/{role}/{user}/detach/role', 'AdminController@userRoleDetach')->name('users-role.detach');
        Route::delete('/users/{user}', 'AdminController@userDestroy')->name('users.destroy');

        Route::get('/permissions', 'AdminController@permissions')->name('permissions.index');
        Route::get('/permissions/{permission}/edit', 'AdminController@permissionEdit')->name('permissions.edit');
        Route::post('/role/create', 'AdminController@createRole')->name('role.create');
        Route::post('/role/{permission}/{role}/attach', 'AdminController@rolePermissionAttach')->name('role-permission.attach');
        Route::post('/role/{permission}/{role}/detach', 'AdminController@rolePermissionDetach')->name('role-permission.detach');
        Route::delete('/permissions/{permission}', 'AdminController@permissionDestroy')->name('permissions.destroy');

        Route::get('/roles', 'AdminController@roles')->name('roles.index');
        Route::get('/roles/{role}/edit', 'AdminController@roleEdit')->name('roles.edit');
        Route::post('/role/create', 'AdminController@createPermission')->name('permission.create');
        Route::post('/permission/{role}/{permission}/attach', 'AdminController@permissionRoleAttach')->name('permission-role.attach');
        Route::post('/permission/{role}/{permission}/detach', 'AdminController@permissionRoleDetach')->name('permission-role.detach');
        Route::delete('/roles/{role}', 'AdminController@roleDestroy')->name('roles.destroy');


        /*Always I use this menu helper*/
        Route::get('/menus', 'MenuController@index')->name('menus.index');
        Route::get('/menus/create', 'MenuController@create')->name('menus.create');
        Route::post('/menus', 'MenuController@store')->name('menus.store');
        Route::get('/menus/{id}', 'MenuController@show')->name('menus.show');
        Route::get('/menus/{id}/edit', 'MenuController@edit')->name('menus.edit');
        Route::post('/menus/{id}/update', 'MenuController@update')->name('menus.update');
        Route::delete('/menus/{id}', 'MenuController@destroy')->name('menus.destroy');
        Route::post('/menu/order', 'MenuController@orderBy')->name('menus.order');
        /*Menu helper end*/


        /*Always I use this settings helper*/
        Route::get('/settings', 'SettingController@index')->name('settings.index');
        Route::get('/settings/create', 'SettingController@create')->name('settings.create');
        Route::post('/settings', 'SettingController@store')->name('settings.store');
        Route::get('/settings/{id}', 'SettingController@show')->name('settings.show');
        Route::get('/settings/{id}/edit', 'SettingController@edit')->name('settings.edit');
        Route::post('/settings/{id}/update', 'SettingController@update')->name('settings.update');
        Route::delete('/settings/{id}', 'SettingController@destroy')->name('settings.destroy');
        /*Settings helper end*/


        /*Always I use this menu helper*/
        Route::get('/categories', 'CategoryController@index')->name('categories.index');
        Route::get('/categories/create', 'CategoryController@create')->name('categories.create');
        Route::post('/categories', 'CategoryController@store')->name('categories.store');
        Route::get('/categories/{id}', 'CategoryController@show')->name('categories.show');
        Route::get('/categories/{id}/edit', 'CategoryController@edit')->name('categories.edit');
        Route::post('/categories/{id}/update', 'CategoryController@update')->name('categories.update');
        Route::delete('/categories/{id}', 'CategoryController@destroy')->name('categories.destroy');
        Route::post('/categories/order', 'CategoryController@orderBy')->name('categories.order');
        /*Menu helper end*/

        /*Posts BREAD*/
        Route::get('/posts', 'PostController@index')->name('posts.index');
        Route::get('/posts/create', 'PostController@create')->name('posts.create');
        Route::post('/posts', 'PostController@store')->name('posts.store');
        Route::get('/posts/{id}', 'PostController@show')->name('posts.show');
        Route::get('/posts/{id}/edit', 'PostController@edit')->name('posts.edit');
        Route::post('/posts/{id}/update', 'PostController@update')->name('posts.update');
        Route::delete('/posts/{id}', 'PostController@destroy')->name('posts.destroy');
        /*Posts BREAD end*/

        /*Albums BREAD*/
        Route::get('/albums', 'AlbumController@index')->name('albums.index');
        Route::get('/albums/create', 'AlbumController@create')->name('albums.create');
        Route::post('/albums', 'AlbumController@store')->name('albums.store');
        Route::get('/albums/{id}', 'AlbumController@show')->name('albums.show');
        Route::get('/albums/{id}/edit', 'AlbumController@edit')->name('albums.edit');
        Route::post('/albums/{id}/update', 'AlbumController@update')->name('albums.update');
        Route::delete('/albums/{id}', 'AlbumController@destroy')->name('albums.destroy');
        Route::post('/album/order', 'AlbumController@orderBy')->name('album.order');
        /*Albums BREAD end*/


        /*Comments BREAD*/
        Route::get('/comments', 'CommentController@index')->name('comments.index');
        Route::get('/comments/create', 'CommentController@create')->name('comments.create');
        Route::post('/comments', 'CommentController@store')->name('comments.store');
        Route::get('/comments/{id}', 'CommentController@show')->name('comments.show');
        Route::get('/comments/{id}/edit', 'CommentController@edit')->name('comments.edit');
        Route::post('/comments/{comment}/update', 'CommentController@update')->name('comments.update');
        Route::delete('/comments/{comment}', 'CommentController@destroy')->name('comments.destroy');
        /*Comments BREAD end*/


        /*Galleries BREAD*/
        Route::get('/galleries', 'GalleryController@index')->name('galleries.index');
        Route::get('/galleries/create', 'GalleryController@create')->name('galleries.create');
        Route::post('/galleries', 'GalleryController@store')->name('galleries.store');

        Route::post('/file-upload', 'GalleryController@post_upload')->name('galleries.dropzone');

        Route::get('/galleries/{id}', 'GalleryController@show')->name('galleries.show');
        Route::get('/galleries/{id}/edit', 'GalleryController@edit')->name('galleries.edit');
        Route::post('/galleries/{id}/update', 'GalleryController@update')->name('galleries.update');
        Route::delete('/galleries/{id}', 'GalleryController@destroy')->name('galleries.destroy');
        Route::delete('/galleries/image/{id}', 'GalleryController@imageDestroy')->name('image.destroy');
        Route::post('/image/update', 'GalleryController@updateUpdate')->name('image.update');
        /*Galleries BREAD end*/


        Route::get('/homepage', 'AdminController@homepage')->name('admin.homepage-control');

        Route::post('/settings-post-1', 'AdminController@settingsPost1')->name('post.1');
        Route::post('/settings-post-2', 'AdminController@settingsPost2')->name('post.2');
        Route::post('/settings-post-3', 'AdminController@settingsPost3')->name('post.3');

        Route::resource('/messages', 'MessageController');
        Route::get('/helper', 'AdminController@helper')->name('helper');

    });
});

