@extends('layouts.admin')
@section('content')
    @php
        $locale = App::getLocale();
        $langs = \App\Language::where('lang', $locale)->first();
    @endphp
    <div class="main-content bg-white border-left">
        <div class="section__content section__content--p30">
            @if($comment)
                <a href="{{ route('comments.edit', ['id' => $comment->id ]) }}">
                    <button type="button" class="btn btn-warning text-white"><i class="fa fa-edit"></i> Edit comment</button>
                </a>
                <br>
                <hr>
                <p>status:
                    @if($comment->status == 0)
                        <span class="badge badge-danger">Deactive</span>
                    @elseif($comment->status == 1)
                        <span class="badge badge-success">Active</span>
                    @endif
                </p>
                <hr>
                <p> Comment author:
                    <span class="badge badge-success">
                        {{ $comment->name }}
                    </span>
                </p>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <span><b>Author image</b></span>
                        <img src="{{ asset('storage') .'/'. $comment->image}}" alt="" style="width: 100%">
                    </div>
                </div>
                <hr>
                <p> Comment text:
                    <span style="color: grey">
                        {!! $comment->text !!}
                    </span>
                </p>
                <hr>
            @else
                <p>Siz ushbu izohni joriy tilda yaratmagan ekansiz. Iltimos yuqoridan comment yaratilgan tilni tanlang va boshqa tillarga tarjima qiling!</p>
            @endif
        </div>
    </div>

@endsection
