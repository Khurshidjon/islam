@extends('layouts.main')
@section('content')
    <script>
            @if(\Session::has('message'))
            var type = "{{ \Session::get('alert-type', 'info') }}";
            switch(type){
                case 'info':
                    toastr.info("{{ \Session::get('message') }}");
                    break;

                case 'warning':
                    toastr.warning("{{ \Session::get('message') }}");
                    break;

                case 'success':
                    toastr.success("{{ \Session::get('message') }}");
                    break;

                case 'error':
                    toastr.error("{{ \Session::get('message') }}");
                    break;
            }
        @endif
    </script>

    <style>
        .homepage .hero {
            min-height: 240px;
            background-repeat: no-repeat;
            background-position: top;
            background-size: cover!important;
            margin-bottom: 20px;
        }
        .pagination li {
            padding: 17px;
            font-size: 18px;
        }
        .pagination li {
            border: 1px solid #4272d7;
            border-radius: 50px;
            padding: 10px;
            width: 49px;
            text-align: center;
        }
        .pagination li:hover a{
            color: #FFFFFF;
        }
        .pagination li:hover{
            background-color: #4272d7;
        }
        .pagination li.active{
            background-color: #4272d7;
            color: #FFFFFF;
        }
    </style>

    <div class="overlay-bg"></div>

    <!--breadcum start -->
    <section class="breadcumb-section breadcumb-bg" style="background: url('{{ asset('sitelogo/section_3.jpg') }}') fixed">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>@lang('pages.album_gallery')</h1>
                    <p><a href="{{ route('index') }}">@lang('pages.home')</a>/ @lang('pages.album_gallery')</p>
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
                        <h2>@lang('pages.album_gallery') </h2>
                        <span class="title-separetor">
	                        <img src="{{ asset('assets/img/separetor-icon.png') }}" alt="separetor image">
	                    </span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="sermons-wrapper">
                    @foreach($albums as $album)
                        <div class="col-md-4 col-sm-6">
                        <div class="single-post-wrapper homepage">
                            <div class="post-thumb event-post-bg-1 hero" style="background: url('{{ asset('storage') .'/'. $album->filename }}')">
                            </div>
                            <div class="post-inner">
                                <a href="{{ route('sermons.single') }}">
                                    <h3>{{ $album->title }}</h3>
                                </a>
                                <div class="port-body">
                                    <p>{!! $album->description !!}</p>
                                    <a href="{{ route('gallery', ['id' => $album->id]) }}" class="boxed-btn">@lang('pages.show_gallery')</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-md-offset-3 text-center">
                    {{ $albums->links('vendor.pagination.default') }}
                </div>
            </div>
        </div>
    </div>
    <!--sermons end-->

@endsection
