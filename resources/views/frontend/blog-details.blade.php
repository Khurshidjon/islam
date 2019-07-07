@extends('layouts.main')
@push('meta')
    <meta property="og:title" content="{{ $post->title }}"/>
    <meta property="og:type" content="author" />
    <meta property="og:url" content="{{ route('blog.details', ['id' => $post->id]) }}" />
    <meta property="og:description" content="{!! str_limit($post->description, 100) !!}" />
    <meta property="og:image" content="http://islam.exurshid.uz/storage/posts/{{ $post->img }}" />
@endpush

@section('content')
    <div class="overlay-bg"></div>
    <!--breadcum start -->
    <section class="breadcumb-section breadcumb-bg" style="background: url('{{ asset('sitelogo/section_3.jpg') }}') fixed;">
        <div class="container" style="margin-top: 12px">
            <div class="row">
                <div class="col-md-12">
                    <p><a style="font-size: 15px !important;" href="{{ route('index') }}">@lang('pages.home')</a> / <span style="font-size: 15px">{{ DB::table('category_lang')->where('category_id', $post->category_id)->first()->name }}</span></p>
                </div>
            </div>
        </div>
    </section>
    <!--breadcum end-->

    <div class="blog-view-page" style="position: relative; top: -70px">
        <div class="container-fluid" style="padding: 0 50px">
            <div class="row">
                <div class="col-md-8">
                    @if($post)
                        <div class="single-blog-page">
                        {{--<div class="blog-post-thumb">
                            @if($post->category_id != 2)
                                <img src="{{ //$post->category_id!=2?asset('storage') .'/'. $post->img:'' }}" alt=" single blog photos">
                            @endif
                        </div>--}}
                        <h2>{{ $post->title }}</h2>
                        <div class="blog-post-meta">
                            <p><i class="icofont icofont-calendar"></i> {{ date('F d Y', strtotime($post->created_at)) }}</p>
                            <p><i class="icofont icofont-user"></i> <a href="#">{{ $user->firstname }}</a></p>
                            <p><i class="icofont icofont-open-eye"></i><a href="#">{{ $post->seen_count }}</a></p>
                        </div>
                            <span>
                                {!! $post->content !!}
                            </span>
                        <div class="blog-post-share">
                            @lang('pages.share_post')
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{route('blog.details', ['id' => $post->id])}}" onclick="window.open(this.href, 'mywin',
'left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;"><i class="icofont icofont-social-facebook"></i></a>
                            <a href="https://twitter.com/intent/tweet?text=my share text&amp;url={{route('blog.details', ['id' => $post->id])}}" onclick="window.open(this.href, 'mywin',
'left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;"><i class="icofont icofont-social-twitter"></i></a>
                            <a href="https://www.linkedin.com/shareArticle?mini=true&amp;url={{ route('blog.details', ['id' => $post->id])}}&amp;title=my share text&amp;summary=dit is de linkedin summary" onclick="window.open(this.href, 'mywin',
'left=20,top=20,width=1000,height=1000,toolbar=1,resizable=0'); return false;"><i class="icofont icofont-social-linkedin"></i></a>
                            <a href="https://telegram.me/share/url?url={{route('blog.details', ['id' => $post->id])}}" onclick="window.open(this.href, 'mywin',
'left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;"><i class="icofont icofont-social-telegram"></i></a>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="col-md-4">
                    <div class="sidebar">
                        <div class="search-widget">
                            <div class="widget-title">
                                <h3>@lang('pages.search')</h3>
                            </div>
                            <div class="widget-body">
                                <form action="{{ route('searching') }}">
                                    <p class="form-element"><input type="text" name="search_text" value="{{ $q }}" placeholder="@lang('pages.search_here')"> <i class="icofont icofont-search"></i></p>
                                </form>
                            </div>
                        </div>
                        <div class="category-widget">
                            <div class="widget-title">
                                <h3>@lang('pages.categories')</h3>
                            </div>
                            <div class="widget-body">
                                <ul>
                                    @foreach($categories as $category)
                                        <li><a href="{{ route('event.list', ['id' => $category->id]) }}"><i class="icofont icofont-double-right"></i> {{ $category->name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="recent-new-widget">
                            <div class="widget-title">
                                <h3>@lang('pages.recent_news')</h3>
                            </div>
                            <div class="widget-body">
                                <div class="signle-recent-news-wrapper">
                                    @foreach($recent_posts as $recent_post)
                                        @php
                                        $locale = App::getLocale();
                                        $lang = \App\Language::where('lang', $locale)->first();
                                            $category_name = DB::table('category_lang')
                                            ->select('name')
                                            ->where('lang_id', $lang->id)
                                            ->where('category_id', $recent_post->category_id)
                                            ->first();

                                            $username = \App\User::where('id', $recent_post->user_id)->first();
                                        @endphp

                                        <div class="single-news-items">
                                            <a href="{{ route('blog.details', ['id' => $recent_post->id]) }}">
                                                <div class="news-post-thumb">
                                                    <img src="{{ $recent_post->img!=null?asset('storage') .'/recentPostsThumbnail/'. $recent_post->img:asset('sitelogo/section_3.jpg') }}" style="width: 115px; height: 106px" alt="single post">
                                                </div>
                                                <div class="news-post-content">
                                                    <small style="line-height: 5px !important;"><b>{{ $recent_post->title }}</b></small>
{{--                                                    <small style="line-height: 10px !important;">{!! str_limit($recent_post->description, 70) !!}</small>--}}
                                                </div>
                                                <hr>
                                                <div class="text-center">
                                                    <small>
                                                        <span>
                                                            <i class="icofont icofont-eye-alt"></i>
                                                            <span style="margin-right: 10px">{{ $recent_post->seen_count }}</span>
                                                        </span>
                                                        <span>
                                                            <i class="icofont icofont-clock-time"></i>
                                                            <span style="margin-right: 10px">{{ date('d.m.Y', strtotime($recent_post->created_at)) }}</span>
                                                        </span>

                                                        <span>
                                                            <i class="icofont icofont-sub-listing"></i>
                                                            <span style="margin-right: 10px">{{ $category_name!=null?$category_name->name:'category' }}</span>
                                                        </span>
                                                    </small>
                                                </div>
                                            </a>
                                        </div>
                                        <hr>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="breadcumb-section breadcumb-bg" style="height:20em !important; background: url('{{ asset('sitelogo/sec.jpg') }}') fixed"></div>
    </div>
@endsection
