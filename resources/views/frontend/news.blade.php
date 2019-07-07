@extends('layouts.main')
@section('content')
    <style>
        .homepage .hero {
            background-repeat: no-repeat;
            background-position: top;
            background-size: cover!important;
        }
        p{
            font-size: 13px;
            padding: 0;
        }
    </style>
    <div class="overlay-bg"></div>

    <!--breadcum start -->
    <section class="breadcumb-section breadcumb-bg" style="background: url('{{ asset('sitelogo/section_3.jpg') }}') fixed">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>@lang('pages.news')</h1>
                    <p><a href="{{ route('index') }}">@lang('pages.home')</a>/ @lang('pages.news')</p>
                </div>
            </div>
        </div>
    </section>
    <!--breadcum end-->

    <div class="upcoming-event-section">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <div class="section-title">
                        <h2><span>@lang('pages.news')</span></h2>
                        <span class="title-separetor">
	                        <img src="{{ asset('assets/img/separetor-icon.png') }}" alt="separetor image">
	                    </span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="upcoming-event-wrapper">
                        @foreach($posts as $post)
                            @php
                                $category = DB::table('categories')
                                ->join('category_lang', 'categories.id', 'category_lang.category_id')
                                ->select('category_lang.name')
                                ->where('categories.id', $post->category_id)
                                ->where('categories.id', '!=', 2)
                                ->first();

                                $username = \App\User::where('id', $post->user_id)->first();
                            @endphp
                            <div class="single-event-list-box">
                                <div class="row">
                                    <div class="col-md-4 homepage">
                                        <a href="{{ route('blog.details', ['id' => $post->id]) }}">
                                            <div class="event-list-post-thumb list-post-thumb-1 hero" style="background: url('{{ $post->img!=null?asset('storage') .'/posts/'. $post->img:asset('sitelogo/section_3.jpg') }}'); width: 100%; height: 10em">
                                            <span class="post-date" style="font-size: 14px">
                                                <strong>
                                                    {{ date('d', strtotime($post->created_at)) }}
                                                </strong>
                                                {{ date('M', strtotime($post->created_at)) }}
                                            </span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="post-inner">
                                            <a href="{{ route('blog.details', ['id' => $post->id]) }}">
                                                <small style="font-size: 12px; line-height: 1px"><b>{{ $post->title }}</b></small>
                                            </a>
                                            <div class="post-meta">
                                                <span style="color: #a9b3c9">
                                                    <span style="font-size: 13px" href="#"><i class="icofont icofont-wall-clock"></i>{{ date('h:i A', strtotime($post->created_at)) }}</span>
                                                    <span style="font-size: 13px" href="#" class="location"><i class="icofont icofont-sub-listing"></i> {{ $category->name }}</span>
                                                    <span style="font-size: 13px" href="#" class="comments"><i class="icofont icofont-open-eye"></i> {{ $post->seen_count }}</span>
                                                    <span style="font-size: 13px" href="#" class="user"><i class="icofont icofont-user"></i> {{ $username->firstname }}</span>
                                                </span>
                                            </div>
                                            <div class="port-body">
                                                <p style="font-size: 10px !important;">{!! $post->description !!}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="text-center">
                        {{ $posts->links() }}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="sidebar">
                        <div class="search-widget">
                            <div class="widget-title">
                                <h3>@lang('pages.search')</h3>
                            </div>
                            <div class="widget-body">
                                <form action="{{ route('searching') }}">
                                    <div class="form-element"><input type="text" name="search_text" value="{{ $q }}" placeholder="@lang('pages.search_here')"> <i class="icofont icofont-search"></i></div>
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
                                            $category_name = DB::table('categories')
                                            ->join('category_lang', 'categories.id', 'category_lang.category_id')
                                            ->select('category_lang.name')
                                            ->where('category_lang.category_id', $recent_post->category_id)
                                            ->where('category_lang.lang_id', $recent_post->category_id)
                                            ->where('categories.id', '!=', 2)
                                            ->first();
                                            $username = \App\User::where('id', $recent_post->user_id)->first();
                                        @endphp
                                        @if($category_name)
                                        <div class="single-news-items">
                                            <a href="{{ route('blog.details', ['id' => $recent_post->id]) }}">
                                                <div class="news-post-thumb">
                                                    <img src="{{ $recent_post->img!=null?asset('storage') .'/recentPostsThumbnail/'. $recent_post->img:asset('sitelogo/section_3.jpg') }}" style="width: 115px; height: 106px" alt="single post">
                                                </div>
                                                <div class="news-post-content">
                                                    <small style="line-height: 5px !important;"><b>{{ str_limit($recent_post->title, 40) }}</b></small>
                                                    <small style="line-height: 10px !important;">{!! str_limit($recent_post->description, 70) !!}</small>
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
                                                                <span style="margin-right: 10px">{{ $category_name->name }}</span>
                                                        </span>
                                                    </small>
                                                </div>
                                            </a>
                                        </div>
                                        @endif
                                        <hr>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

