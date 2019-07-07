@extends('layouts.main')
@section('content')
    <style>
        .homepage .hero {
            min-height: 240px;
            background-color: #777;
            background-repeat: no-repeat;
            background-position: top;
            background-size: cover!important;
            margin-bottom: 20px;
        }
    </style>
    <div class="overlay-bg"></div>

    <!--breadcum start -->
    <section class="breadcumb-section breadcumb-bg" style="background: url('{{ asset('sitelogo/section_3.jpg') }}') fixed">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>{{ $album->title }}</h1>
                    <p><a href="{{ route('index') }}">@lang('pages.home')</a>/{{ $album->title }}</p>
                </div>
            </div>
        </div>
    </section>
    <!--breadcum end-->
    <!--sermons start-->
    <div class="sermons-section">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <div class="section-title">
                        <h2>{{ $album->title }} </h2>
                        <span class="title-separetor">
	                        <img src="{{ asset('assets/img/separetor-icon.png') }}" alt="separetor image">
	                    </span>
                    </div>
                </div>
            </div>
            <div class="masonary-container">
                <div class="festival-masonary">
                    @foreach($galleries as $gallery)
                        <div class="single-post-wrapper homepage grid-item">
                            <div class="masonry-image masony-bg-1" style="background-image: url('{{ asset('storage' .'/'. $gallery->path) }}')">
                                <div class="masonry-hover">
                                    <div class="masonry-hover-content">
                                        <a class="image-popup" title="{{ $gallery->name }}" href="{{ asset('storage') .'/'. $gallery->path}}">
                                            <i class="icofont icofont-search-alt-1"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-md-offset-3 text-center">
                    {{--{{ $albums->links() }}--}}
                </div>
            </div>
        </div>
    </div>
    <!--sermons end-->

@endsection
