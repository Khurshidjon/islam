<?php

namespace App\Http\Controllers;

use App\Category;
use App\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
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

        $categories = DB::table('categories')
            ->join('category_lang', 'categories.id','category_lang.category_id')
            ->select('categories.status', 'categories.order', 'categories.id', 'category_lang.name', 'category_lang.lang_id')
            ->where('category_lang.lang_id', $language->id)
            ->orderBy('order', 'ASC')
            ->paginate(15);
        return view('admin.contents.categories.categories', [
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.contents.categories.add');
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
        ]);
        if ($validate->fails()){
            return redirect()->back()
                ->withErrors($validate)
                ->withInput();
        }else{

            $status = $request->status;
            $order = $request->order;
            $name = $request->name;


            $category = new Category();
            $category->status = $status;
            $category->save();


            $category_id = $category->id;

            $lang = Language::where('lang', 'uz')->first();
            DB::table('category_lang')
                ->insert([
                    'category_id' => $category_id,
                    'lang_id' => $lang->id,
                    'name' => $name,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            $notification = array(
                'message' => 'Category has been created successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('categories.index')->with($notification);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $notification = array(
            'message' => 'You have no access to show categories',
            'alert-type' => 'warning',
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lang = App::getLocale();
        $language = Language::where('lang', $lang)->first();


        $category = DB::table('categories')
            ->join('category_lang', 'categories.id', '=','category_lang.category_id')
            ->select('categories.id', 'categories.status', 'category_lang.category_id', 'category_lang.lang_id', 'category_lang.name')
            ->where('categories.id', $id)
            ->first();

        $uz = Language::where('lang', 'uz')->first();
        $ru = Language::where('lang', 'ru')->first();
        $en = Language::where('lang', 'en')->first();
        $ar = Language::where('lang', 'ar')->first();
        $tr = Language::where('lang', 'tr')->first();
        $category_uz = DB::table('category_lang')->where('lang_id', $uz->id)->where('category_id', $id)->select('name')->first();
        $category_ru = DB::table('category_lang')->where('lang_id', $ru->id)->where('category_id', $id)->select('name')->first();
        $category_en = DB::table('category_lang')->where('lang_id', $en->id)->where('category_id', $id)->select('name')->first();
        $category_ar = DB::table('category_lang')->where('lang_id', $ar->id)->where('category_id', $id)->select('name')->first();
        $category_tr = DB::table('category_lang')->where('lang_id', $tr->id)->where('category_id', $id)->select('name')->first();
        return view('admin.contents.categories.edit', [
            'category' => $category,
            'uz' => $uz,
            'ru' => $ru,
            'en' => $en,
            'ar' => $ar,
            'tr' => $tr,
            'category_uz' => $category_uz,
            'category_ru' => $category_ru,
            'category_en' => $category_en,
            'category_ar' => $category_ar,
            'category_tr' => $category_tr,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
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

            $category_id = $id;
            $lang_id = $request->lang_id;
            $category = Category::find($id);

            $exist = DB::table('category_lang')->where('category_id', $category_id)->where('lang_id', $lang_id)->first();
            if ($exist){
                if ($request->status){
                    $category->status = $status;
                }
                $category->save();

                DB::table('category_lang')
                    ->where('lang_id', $lang_id)
                    ->where('category_id', $category_id)
                    ->update([
                        'name' => $name,
                        'updated_at' => now()
                    ]);
            }else{
                DB::table('category_lang')
                    ->insert([
                        'category_id' => $category_id,
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menu = Category::find($id);
        $menu->delete();

        DB::table('category_lang')->where('category_id', $id)->delete();
        $notification = array(
            'message' => 'Category has been deleted successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

    /*Sorting for Display Category*/

    public function orderBy(Request $request)
    {

        $category_id = $request->category_id;
        $order_id = $request->order_by;

        $menu = Category::where('id', $category_id)->first();

        if ($order_id > count(Category::all()) || $order_id <= 0){
            return 'error';
        }
        if ($menu){
            Category::where('id', $category_id)
                ->update([
                    'order' => $order_id,
                    'updated_at' => now(),
                ]);
        }
        return 'ok';
    }
}
