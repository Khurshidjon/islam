<?php

namespace App\Http\Controllers;

use App\Comment;
use App\CommentLang;
use App\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::with('showComment')->paginate(10);
        return view('admin.contents.comments.comments', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.contents.comments.add');
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
            'name' => 'required|string|max:255',
            'status' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:10240',
            'text' => 'required',
        ]);
        if ($validate->fails()){
            return redirect()->back()
                ->withInput()
                ->withErrors($validate);
        }else{
            $filename = $request->file('image')->store('CommentUser'.'/'. date('FY'), 'public');
            $comment = new Comment();
            $comment->status = $request->get('status');
            $comment->name = $request->name;
            $comment->user_id = \Auth::id();
            $comment->image = $filename;
            $comment->save();

            $lang = Language::where('lang', 'uz')->first();
            $commentContent = new CommentLang();
            $commentContent->text = $request->text;
            $commentContent->comment_id = $comment->id;
            $commentContent->lang_id = $lang->id;
            $commentContent->save();

            $notification = array(
                'message' => 'Comment has been created successfully',
                'alert-type' => 'success',
            );
            return redirect()->route('comments.index')->with($notification);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $locale = App::getLocale();
        $language = Language::where('lang', $locale)->first();
        $comment = DB::table('comments')
            ->join('comment_langs', 'comments.id', 'comment_langs.comment_id')
            ->select('comments.id', 'comments.image', 'comments.name', 'comments.status', 'comment_langs.text')
            ->where('comment_langs.lang_id', $language->id)
            ->where('comments.id', $id)
            ->first();

        return view('admin.contents.comments.browse', [
            'comment' => $comment
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment = Comment::find($id);
        $uz = Language::where('lang', 'uz')->first();
        $ru = Language::where('lang', 'ru')->first();
        $en = Language::where('lang', 'en')->first();
        $ar = Language::where('lang', 'ar')->first();
        $tr = Language::where('lang', 'tr')->first();

        $comment_uz = CommentLang::where('lang_id', $uz->id)->where('comment_id', $comment->id)->select('text')->first();
        $comment_ru = CommentLang::where('lang_id', $ru->id)->where('comment_id', $comment->id)->select('text')->first();
        $comment_en = CommentLang::where('lang_id', $en->id)->where('comment_id', $comment->id)->select('text')->first();
        $comment_ar = CommentLang::where('lang_id', $ar->id)->where('comment_id', $comment->id)->select('text')->first();
        $comment_tr = CommentLang::where('lang_id', $tr->id)->where('comment_id', $comment->id)->select('text')->first();

        return view('admin.contents.comments.edit', [
            'comment' => $comment,
            'uz' => $uz,
            'ru' => $ru,
            'en' => $en,
            'ar' => $ar,
            'tr' => $tr,
            'comment_uz' => $comment_uz,
            'comment_ru' => $comment_ru,
            'comment_en' => $comment_en,
            'comment_ar' => $comment_ar,
            'comment_tr' => $comment_tr,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        $name = $request->name;
        $status = $request->get('status');
        $text = $request->text;
        $lang_id = $request->lang_id;

        $validate = Validator::make($request->all(), [
            'image' => 'image|mimes:jpg,jpeg,png|max:10240',
            'text' => 'required',
        ]);
        if ($validate->fails()){
            return redirect()->back()
                ->withInput()
                ->withErrors($validate);
        }else{
            if ($request->file('image')){
                $filename = $request->file('image')->store('CommentUser'.'/'. date('FY'), 'public');
                $comment->image = $filename;
            }
            $comment->status = $status;
            if ($name){
                $comment->name = $name;
            }
            $comment->user_id = \Auth::id();
            $comment->save();

            $exist = CommentLang::where('comment_id', $comment->id)->where('lang_id', $lang_id)->first();
            if ($exist){
                $exist->text = $text;
                $exist->comment_id = $comment->id;
                $exist->lang_id = $lang_id;
                $exist->save();
                $notification = array(
                    'message' => 'Comment has been updated successfully',
                    'alert-type' => 'success',
                );
            }else{
                $commentContent = new CommentLang();
                $commentContent->text = $text;
                $commentContent->comment_id = $comment->id;
                $commentContent->lang_id = $lang_id;
                $commentContent->save();
                $notification = array(
                    'message' => 'Comment has been created successfully',
                    'alert-type' => 'success',
                );
            }
            return redirect()->back()->with($notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        $comment->commentContent()->delete();
        $notification = array(
            'message' => 'Comment has been deleted successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
}
