@extends('layouts.main')

@push('meta')
    <meta property="og:title" content="cisc.uz"/>
    <meta property="og:type" content="author" />
    <meta property="og:url" content="https://exurshid.uz" />
    <meta name="og:description" content="Center of Islamic Civilization in Uzbekistan under the Cabinet of Ministers of the Republic of Uzbekistan" />
    <meta property="og:image" content="http://islam.exurshid.uz/sitelogo/logo.png" />
    <style>
        .product-table-cell p{
            color: #FFFFFF;
            font-size: 12px;
        }
        .product-table-cell h1{
            color: #FFFFFF;
        }
        .team-inner-top h5{
            color: #FFFFFF;
            margin-top: -9px;
            /*font-size: px;*/
        }
        .team-inner-top p{
            color: #FFFFFF;
            font-size: 15px;
        }
        .homepage .hero {
            min-height: 774px;
            /*background-color: #777;*/
            background-repeat: no-repeat;
            background-position: top;
            background-size: cover!important;
        }
        .video-container {
            position: relative;
            padding-bottom: 56.25%;
            padding-top: 30px;
            height: 0;
            overflow: hidden;
        }

        .video-container iframe,
        .video-container object,
        .video-container embed {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
        .single-service-item{
            padding-bottom: 20px !important;
        }
        .homepage .hero {
            min-height: 7em !important;
        }
        .homepage  .owl-stage-outer{
            max-height: 30em;
        }

        .homepage .boxed-btn{
            padding:10px;
            font-size: 12px;
        }
    </style>
    <script>
        $(function () {
            $('#getText').on('click', function () {
                responsiveVoice.speak(window.getSelection().toString(), 'Russian Male');
            });
        })
    </script>
@endpush


@section('content')
    <header class="header-section">

    <div class="header-carousel-active homepage">
            @php
                $i = 1;
            @endphp
        @foreach($banners as $banner)
            <div style="background: url('{{ $banner->img!=null?asset('storage') .'/posts/'. $banner->img:asset('sitelogo/section_3.jpg') }}')" class="header-carousel-wrapper hero {{ $i==0?'header-carousel-bg':''}} {{ $i==1?'header-carousel-bg-one':''}}{{ $i==2?'header-carousel-bg-two':''}}{{ $i==3?'header-carousel-bg-three':''}}{{ $i==4?'header-carousel-bg-four':''}}">
                <div class="single-header-carousel">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8">
                                <h1 style="font-size: 25px">{{ $banner->title }}</h1>
                                <p>{!! str_limit($banner->description, 200) !!}</p>
                                <a href="{{ route('blog.details', ['id' => $banner->id ]) }}" class="boxed-btn">@lang('pages.read_more')<i class="icofont icofont-curved-double-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</header>
<!--header section end-->
<!--pillar of islam start-->
{{--<section class="pillar-of-islam-section">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center">
                <div class="section-title">
                    <h2>@lang('pages.pillars_of_islam')</h2>
                        <span class="title-separetor">
	                        <img src="{{ asset('assets/img/separetor-icon.png') }}" alt="separetor image">
	                    </span>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <ul class="pillar-of-islam">
                    <li><div class="pillar-icon"><img src="{{ asset('assets/img/pillar-icon.png') }}" alt=""></div>@lang('pages.salat_pillars')</li>
                    <li><div class="pillar-icon"><img src="{{ asset('assets/img/pillar-icon-1.png') }}" alt=""></div>@lang('pages.kalma_pillars')</li>
                    <li><div class="pillar-icon"><img src="{{ asset('assets/img/pillar-icon-2.png') }}" alt=""></div>@lang('pages.hajj_pillars')</li>
                    <li><div class="pillar-icon"><img src="{{ asset('assets/img/pillar-icon-3.png') }}" alt=""></div>@lang('pages.zakat_pillars') </li>
                    <li><div class="pillar-icon"><img src="{{ asset('assets/img/pillar-icon-4.png') }}" alt=""></div>@lang('pages.fasting_pillars')</li>
                </ul>
                <div class="circle">
                    <div class="icon">
                        <i class="icofont icofont-island-alt"></i>
                    </div>
                    <h4>@lang('pages.the_islamic_pillars')</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic voluptatum, atque maiores doloribus vero doloremque.</p>
                </div>
            </div>
        </div>
    </div>
</section>--}}
<!--pillar of islam end-->
    <section class="pillar-of-islam-section">
        <div class="section-title text-center">
            <h2>@lang('pages.holy_quran_title')</h2>
            <span class="title-separetor">
               <img src="{{ asset('assets/img/separetor-icon.png') }}" style="background: url('{{ asset('background_image/photo_2019-04-15_12-24-29.jpg') }}')" alt="separetor image">
            </span>
        </div>
    </section>
<!--holy quran start-->
<section class="holy-quran">
    <div class="holy-quran-left holy-quran-bg">
        <div class="holy-quran-left-wrapper">
            <div class="video-container">
                <iframe style="padding: 50px; background: url('{{ asset('background_image/photo_2019-04-15_12-24-29.jpg') }}')" width="873" height="500" src="{{ $youtube_video!=null?$youtube_video->val:'' }}" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
    </div>
    <div class="holy-quran-right-content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-8 col-sm-4 col-sm-offset-8 col-xs-12">
                    <div class="holy-quran-right-content" style="margin-bottom: 80px !important;">
                        <div class="section-title text-center">
                            <a href="{{$about_center!=null?$about_center->url:'#'}}">
                                <h2 style="font-size: 18px">@lang('pages.about_center')</h2>
                            </a>
                            <span class="title-separetor">
                               <img src="{{ asset('assets/img/separetor-icon.png') }}" style="background: url('{{ asset('background_image/photo_2019-04-15_12-24-29.jpg') }}')" alt="separetor image">
                            </span>
                        </div>
                        <div class="holy-quran-content">
                            <p>{{ $about_center!=null?$about_center->val:''}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--holy quran end-->
    <br>
    <br>

<!-- latest event start-->
<section class="latest-event">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center">
                <div class="section-title">
                    <h2>@lang('pages.latest_events')</h2>
                    <span class="title-separetor">
                        <img src="{{ asset('assets/img/separetor-icon.png') }}" style="background: url('{{ asset('background_image/photo_2019-04-15_12-24-29.jpg') }}')" alt="separetor image">
                    </span>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($latest_events as $latest_event)
                @php
                    $category_name = DB::table('categories')
                    ->join('category_lang', 'categories.id', 'category_lang.category_id')
                    ->select('category_lang.name')
                    ->where('categories.id', $latest_event->category_id)
                    ->first();

                    $username = \App\User::where('id', $latest_event->user_id)->first();
                @endphp
                <div class="col-md-4 col-sm-6">
                    <a href="{{ route('blog.details', ['id' => $latest_event->id]) }}" class="single-post-wrapper">
                        <div class="post-thumb event-post-bg-2" style="background-image: url('{{ $latest_event->img!=null?asset('storage') .'/posts/'. $latest_event->img:asset('sitelogo/section_3.jpg') }}')">
                            <span class="post-date"><strong>{{ date('d', strtotime($latest_event->sana)) }}</strong> {{ date('M', strtotime($latest_event->sana)) }}</span>
                        </div>
                        <div class="post-inner">
                            <a href="{{ route('blog.details', ['id' => $latest_event->id]) }}">
                                <h5>{{ str_limit($latest_event->title, 100) }}</h5>
                            </a>
                            <div class="post-meta">
                                <p class="time"><i class="icofont icofont-eye"></i> {{$latest_event->seen_count}}</p>
                                <p class="time"><i class="icofont icofont-wall-clock"></i> {{ date('d.m.Y', strtotime($latest_event->sana)) }}</p>
                                <a href="{{ route('blog.details', ['id' => $latest_event->id]) }}" class="user"><i class="icofont icofont-user"></i> {{ $username->firstname }}</a>
                            </div>
                            <div class="port-body" style="padding-bottom: 20px">
                                <p>{!! str_limit($latest_event->description, 100) !!}</p>
                                <a href="{{ route('blog.details', ['id' => $latest_event->id]) }}" class="boxed-btn mb-5">@lang('pages.read_more')</a>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
            <div class="col-md-4 col-sm-12">
                <div class="event-post-list">
                    <div class="single-event-list highlight">
                        <div class="list-post-content">
                            <a href="#">
                                <h4>@lang('pages.islamic_teach_title')</h4>
                            </a>
                            <p></p>
                        </div>
                    </div>
                    @foreach($teaching_events as $teaching_event)
                        <p style="border-bottom: 1px solid lightgrey"></p>
                        @php
                            $category_name = DB::table('categories')
                            ->join('category_lang', 'categories.id', 'category_lang.category_id')
                            ->select('category_lang.name')
                            ->where('categories.id', $teaching_event->category_id)
                            ->first();
                            $user = \App\User::where('id', $teaching_event->user_id)->first();
                        @endphp
                        <div class="single-event-list">
                            <div class="list-post-thumb">
                                <img src="{{ $teaching_event->img!=null?asset('storage') .'/recentPostsThumbnail/'. $teaching_event->img:asset('sitelogo/section_3.jpg') }}" alt="list post thumb" style="min-width: 100px; height: 100px">
                            </div>
                                <div class="list-post-content" style="line-height: 15px">
                                    <a href="{{ route('blog.details', ['id' => $teaching_event->id]) }}" style="margin-bottom: 20px">
                                        <p class="pb-5"><b>{{ $teaching_event->title }}</b></p>
                                        <!--<p style="line-height: 8px !important; max-width: 100px">{!! str_limit($teaching_event->description, 100) !!}</p>-->
                                    </a>
                                </div>
				            <div style="position:absolute; overflow: auto; float: right; margin-left: 105px; top: 85px; font-size: 12px">
                                <span>
                                    <i class="icofont icofont-eye-alt"></i>
                                    <span style="margin-right: 10px">{{ $teaching_event->seen_count }}</span>
                                </span>
                                <span>
                                    <i class="icofont icofont-clock-time"></i>
                                    <span style="margin-right: 10px">{{ date('d.m.Y', strtotime($teaching_event->created_at)) }}</span>
                                </span>
                                <span>
                                    <i class="icofont icofont-sub-listing"></i>
                                    <span style="margin-right: 10px">{{ $category_name->name }}</span>
                                </span>
				            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- latest event end-->

<!-- our service start-->
{{--<section class="our-service">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="section-title">
                    <h2>@lang('pages.our_services')</h2>
                    <span class="title-separetor">
                        <img src="{{ asset('assets/img/separetor-icon.png') }}" alt="separetor image">
                    </span>
                </div>
                <div class="single-service-item">
                    <div class="service-icon">
                        <img src="{{ asset('assets/img/service-icon.png') }}" alt="service icon image">
                    </div>
                    <div class="service-content">
                        <a href="#">
                            <h3>@lang('pages.col1_title')</h3>
                        </a>
                        <p>{{ $col1!=null?$col1->val:'' }}</p>
                    </div>
                </div>
                <div class="single-service-item">
                    <div class="service-icon">
                        <img src="{{ asset('assets/img/service-icon-1.png') }}" alt="service icon image">
                    </div>
                    <div class="service-content">
                        <a href="#">
                            <h3>@lang('pages.col2_title')</h3>
                        </a>
                        <p>{{ $col2!=null?$col2->val:'' }}</p>
                    </div>
                </div>
                <div class="single-service-item">
                    <div class="service-icon">
                        <img src="{{ asset('assets/img/service-icon-2.png') }}" alt="service icon image">
                    </div>
                    <div class="service-content">
                        <a href="#">
                            <h3>@lang('pages.col3_title')</h3>
                        </a>
                        <p>{{ $col3!=null?$col3->val:'' }}</p>
                    </div>
                </div>
                <div class="single-service-item">
                    <div class="service-icon">
                        <img src="{{ asset('assets/img/service-icon-3.png') }}" alt="service icon image">
                    </div>
                    <div class="service-content">
                        <a href="#">
                            <h3>@lang('pages.col4_title')</h3>
                        </a>
                        <p>{{ $col4!=null?$col4->val:'' }}</p>
                    </div>
                </div>

            </div>
            <div class="col-md-6">
                <img src="{{ asset('sitelogo/section.jpg') }}" style="width: 100%" alt=" our service background">
                <img src="{{ asset('sitelogo/section_2.jpg') }}" style="width: 100%" alt=" our service background">
            </div>
        </div>
    </div>
</section>--}}
<!-- our service end-->

<!-- count service start-->
<section class="count-sectoin count-section-bg" style="background-image: url('{{ asset('sitelogo/section.jpg') }}')">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-3 col-sm-6">
                <div class="single-counter-box">
                    <div class="counter-wrapper">
                        <div class="count-icon">
                            <i class="icofont icofont-ui-love"></i>
                        </div>
                        <h4>@lang('pages.row1_title')</h4>
                        <span class=""></span>
                        <span class=""><strong>{{ $row1!=null?$row1->val:'' }}</strong></span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="single-counter-box">
                    <div class="counter-wrapper">
                        <div class="count-icon">
                            <i class="icofont icofont-holding-hands"></i>
                        </div>
                        <h4>@lang('pages.row2_title')</h4>
                        <span class=""></span>
                        <span class="">
                            <strong>{{ $row2!=null?$row2->val:'' }}</strong>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="single-counter-box">
                    <div class="counter-wrapper">
                        <div class="count-icon">
                            <i class="icofont icofont-unity-hand"></i>
                        </div>
                        <h4>@lang('pages.row3_title')</h4>
                        <span class=""></span>
                        <span class=""><strong>{{ $row3!=null?$row3->val:'' }}</strong></span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="single-counter-box">
                    <div class="counter-wrapper">
                        <div class="count-icon">
                            <i class="icofont icofont-money"></i>
                        </div>
                        <h4>@lang('pages.row4_title')</h4>
                        <span class=""></span>
                        <span class=""><strong>{{ $row4!=null?$row4->val:'' }}</strong></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- count service end-->

<!-- muslim festival start-->
<section class="muslim-festival">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center">
                <div class="section-title">
                    <h2>@lang('pages.album_gallery')</h2>
                    <span class="title-separetor">
                        <img src="{{ asset('assets/img/separetor-icon.png') }}" style="background: url('{{ asset('background_image/photo_2019-04-15_12-24-29.jpg') }}')" alt="separetor image">
                    </span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="festival-menu">
                    <ul>
                        <li data-filter="*" class="active" id="all">@lang('pages.all') </li>
                        @foreach($albums as $album)
                            <li data-filter=".{{$album->id}}">{{ $album->title }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="masonary-container">
        <div class="festival-masonary">
            <?php $j = 0;?>
            @foreach($galleries as $gallery)
            @php
                $album_id = DB::table('albums')->where('id', $gallery->album_id)->first();
            @endphp

                @if($album_id->status == 1)
                    <div class="grid-item {{ $album_id->id }}">
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
                @endif
                <?php if(++$j > 7) break; ?>
            @endforeach
        </div>
        <div class="more-festival-images">
            <a href="{{ route('albums') }}" class="boxed-btn">@lang('pages.view_more')</a>
        </div>
    </div>
</section>
<!-- muslim festival end-->

<!--our causes start-->
<section class="our-causes" style="background: url('{{ asset('background_image/photo_2019-04-15_12-24-29.jpg') }}')">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center">
                <div class="section-title">
                    <h2>@lang('pages.our_causes')</h2>
                    <span class="title-separetor">
                        <img src="{{ asset('assets/img/separetor-icon.png') }}" style="background: url('{{ asset('background_image/photo_2019-04-15_12-24-29.jpg') }}')" alt="separetor image">
                    </span>
                </div>
            </div>
        </div>
        <div class="cause-wrapper">
            <div class="row">
                @foreach($our_causes_news as $item)
                    @php
                        $category_name = DB::table('categories')
                        ->join('category_lang', 'categories.id', 'category_lang.category_id')
                        ->select('category_lang.name')
                        ->where('categories.id', $item->category_id)
                        ->where('category_lang.category_id', '!=', 2)
                        ->first();

                        $user = \App\User::where('id', $item->user_id)->first();
                    @endphp

                    <div class="single-causes-item">
                        <div class="row">
                            <div class="col-md-4 col-sm-4">
                                <div class="cause-thumb">
                                    <a href="{{ route('blog.details', ['id' => $item->id]) }}">
                                        <img src="{{ $item->img!=null?asset('storage') .'/posts/'. $item->img:asset('sitelogo/section_3.jpg') }}" alt="{{ $item->title }}" style="width: 370px; height: 260px">
                                    </a>
                                </div>
                                <div class="cause-amount">
                                    <div class="rise-amount">
                                        <span class="cause-center-social-icon">
                                            @lang('pages.share_post')
                                        </span>
                                    </div>
                                    <div class="goal-amount">
                                        <a href="https://www.facebook.com/sharer/sharer.php?u={{route('blog.details', ['id' => $item->id])}}" onclick="window.open(this.href, 'mywin',
'left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;"><i class="icofont icofont-social-facebook"></i></a>
                                        <a href="https://twitter.com/intent/tweet?text=my share text&amp;url={{route('blog.details', ['id' => $item->id])}}" onclick="window.open(this.href, 'mywin',
'left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;"><i class="icofont icofont-social-twitter"></i></a>
                                        <a href="https://www.linkedin.com/shareArticle?mini=true&amp;url={{ route('blog.details', ['id' => $item->id])}}&amp;title=my share text&amp;summary=dit is de linkedin summary" onclick="window.open(this.href, 'mywin',
'left=20,top=20,width=1000,height=1000,toolbar=1,resizable=0'); return false;"><i class="icofont icofont-social-linkedin"></i></a>
                                        <a href="https://telegram.me/share/url?url={{route('blog.details', ['id' => $item->id])}}" onclick="window.open(this.href, 'mywin',
'left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;"><i class="icofont icofont-social-telegram"></i></a>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-8 col-sm-8">
                                <div class="cause-right">
                                    <div class="cause-right-top">
                                        <h5>
                                            <a href="{{ route('blog.details', ['id' => $item->id]) }}" style="color: #0b0b0b !important; ">
                                                <span class="color">{{ $item->title }}</span>
                                            </a>
                                        </h5>
                                        <small class="post-meta">
                                            <span>
                                                <i class="icofont icofont-eye-alt"></i>
                                                <span style="margin-right: 10px">{{ $item->seen_count }}</span>
                                            </span>
                                            <span>
                                                <i class="icofont icofont-user-alt-3"></i>
                                                <span style="margin-right: 10px">{{ $user->firstname }}</span>
                                            </span>
                                            <span>
                                                <i class="icofont icofont-clock-time"></i>
                                                <span style="margin-right: 10px">{{ date('d.m.Y', strtotime($item->created_at)) }}</span>
                                            </span>
                                            <span>
                                                <i class="icofont icofont-sub-listing"></i>
                                                <span style="margin-right: 10px">{{ $category_name->name }}</span>
                                            </span>
                                        </small>
                                        <p>
                                            {!! str_limit($item->description, 300) !!}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!--our causes end-->

<!-- our team start-->
<div class="our-team-section">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center">
                <div class="section-title">
                    <h2>@lang('pages.our_handwriting')</h2>
                    <span class="title-separetor">
                         <img src="{{ asset('assets/img/separetor-icon.png') }}" style="background: url('{{ asset('background_image/photo_2019-04-15_12-24-29.jpg') }}')" alt="separetor image">
                    </span>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($handwriting as $item)
                <div class="col-md-3 col-sm-6">
                    <div class="single-team-member">
                        <a href="{{ route('blog.details', ['id' => $item->id]) }}">
                            <div class="team-profile">
                                <img src="{{ $item->img!=null ? asset('storage') .'/handwritingPostsThumbnail/'. $item->img : asset('sitelogo/section_3.jpg') }}" alt="team member" style="max-width: 270px; min-height: 324px">
                                <div class="team-hover">
                                    <div class="team-details-wrapper text-center">
                                        <div class="team-table-cell">
                                            <div class="team-inner-top">
                                                <div class="team-member-name">
                                                    <h5>{{ $item->title }}</h5>
                                                </div>
                                                <p>{!! $item->description !!}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!--our team end-->

<!--our lattest news start-->
<section class="latest-news-section" style="background: url('{{ asset('background_image/photo_2019-04-15_12-24-29.jpg') }}')">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center">
                <div class="section-title">
                    <h2>@lang('pages.latest_news')</h2>
                    <span class="title-separetor">
                         <img src="{{ asset('assets/img/separetor-icon.png') }}" style="background: url('{{ asset('background_image/photo_2019-04-15_12-24-29.jpg') }}')" alt="separetor image">
                     </span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                @foreach($latest_news_one as $item)
                    @php
                        $category_name = DB::table('categories')
                        ->join('category_lang', 'categories.id', 'category_lang.category_id')
                        ->select('category_lang.name')
                        ->where('categories.id', $item->category_id)
                        ->where('categories.id', '!=', 2)
                        ->first();

                        $user = \App\User::where('id', $item->user_id)->first();
                    @endphp
                    <div class="latest-news-left-post">
                        <div class="post-thumb">
                            <a href="{{ route('blog.details', ['id' => $item->id]) }}">
                                <img src="{{ $item->img!=null?asset('storage') .'/posts/'. $item->img:asset('sitelogo/section_3.jpg') }}" alt="lattest news">
                            </a>
                        </div>
                        <div class="latest-news-left-post-content">
                            <div class="left-post-wrapper">
                                <div class="lattest-lefp-content-top">
                                    <h4>
                                        <a href="{{ route('blog.details', ['id' => $item->id]) }}">
                                            {{ $item->title }}
                                        </a>
                                    </h4>
                                    <p>{!! str_limit($item->description, 100) !!}</p>
                                    <small class="post-meta">
                                         <span>
                                            <i class="icofont icofont-eye-alt"></i>
                                             <span style="margin-right: 10px">{{ $item->seen_count }}</span>
                                        </span>
                                        <span>
                                            <i class="icofont icofont-user-alt-3"></i>
                                            <span style="margin-right: 10px">{{ $user->firstname }}</span>
                                        </span>
                                        <span>
                                            <i class="icofont icofont-clock-time"></i>
                                            <span style="margin-right: 10px">{{ date('d.m.Y', strtotime($item->created_at)) }}</span>
                                        </span>
                                        <span>
                                            <i class="icofont icofont-sub-listing"></i>
                                            <span style="margin-right: 10px">{{ $category_name->name }}</span>
                                        </span>
                                    </small>
                                </div>
                                <a href="{{ route('blog.details', ['id' => $item->id]) }}" class="read-more">@lang('pages.read_more')</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-md-6">
                <div class="right-latest-news-wrapper">
                    @foreach($latest_news_two as $item)
                        @php
                            $category_name = DB::table('categories')
                            ->join('category_lang', 'categories.id', 'category_lang.category_id')
                            ->select('category_lang.name')
                            ->where('categories.id', $item->category_id)
                            ->first();

                            $user = \App\User::where('id', $item->user_id)->first();
                        @endphp
                        <object data="" type="">
                            <a href="{{ route('blog.details', ['id' => $item->id]) }}">
                                <div class="single-latest-news-list">
                                    <div class="post-thumb">
                                        <img src="{{ $item->img!=null?asset('storage') .'/posts/'. $item->img:asset('sitelogo/section_3.jpg')  }}" alt="latest news image" style="width: 270px; height: 188px">
                                    </div>
                                    <div class="single-news-wrapper">
                                        <div class="latest-news-list-content" style="border: none; padding-bottom: 0; margin-bottom: 2em">
                                            <h6>{{ str_limit($item->title, 50) }}</h6>
                                            <small>{!! str_limit($item->description, 100) !!}</small>
                                            <br>
                                            <small class="post-meta">
                                                 <span>
                                                    <i class="icofont icofont-eye-alt"></i>
                                                     <span style="margin-right: 5px">{{ $item->seen_count }}</span>
                                                </span>
                                                <span>
                                                    <i class="icofont icofont-clock-time"></i>
                                                    <span style="margin-right: 5px">{{ date('d.m.Y', strtotime($item->created_at)) }}</span>
                                                </span>
                                                <span>
                                                    <i class="icofont icofont-sub-listing"></i>
                                                    <span style="margin-right: 5px">{{ $category_name->name }}</span>
                                                </span>
                                            </small>
                                        </div>
                                        <hr>
                                    </div>
                                </div>
                                <hr>
                            </a>
                        </object>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!--our lattest news end-->

<!--our donator say start-->
<div class="donator-section our-donator-bg" style="background-image: url('{{ asset('sitelogo/section.jpg') }}')">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center">
                <div class="section-title">
                    <h2 style="font-size: 22px">@lang('pages.comments_display')</h2>
                    <span class="title-separetor our-donator">
                         <img src="{{ asset('assets/img/footer-separetor-icon.png') }}" style="background-color:transparent" alt="separetor image">
                     </span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 text-center col-md-offset-2">
                <div class="donator-carousel">
                    @foreach($comments as $comment)
                        <div class="signle-donartor">
                            <div class="donator-picture">
                                <img src="{{ asset('storage') .'/'. $comment->image}}" alt="donator image">
                            </div>
                            <div class="donator-content">
                                <h4>{{ $comment->name }}</h4>
                                <p>
                                <i class="icofont icofont-quote-left"></i>
                                        {!! $comment->text !!}
                                <i class="icofont icofont-quote-right"></i></p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!--our donator say end-->

<!--our product start -->

    <section class="our-product-section" id="product">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center">
                <div class="section-title">
                    <h2>@lang('pages.our_partners')</h2>
                    <span class="title-separetor">
                         <img src="{{ asset('assets/img/separetor-icon.png') }}" style="background: url('{{ asset('background_image/photo_2019-04-15_12-24-29.jpg') }}')" alt="separetor image">
                     </span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="product-carousel text-center">
                    @foreach($partners as $partner)
                        <div class="single-product-box">
                                <div class="product-thumb">
                                    <a href="{{ route('blog.details', ['id' => $partner->id]) }}">
                                        <img src="{{ $partner->img!=null?asset('storage') .'/partnerPostsThumbnail/'. $partner->img:asset('sitelogo/section_3.jpg')  }}" style="width: 270px; height: 309px" alt="product image">
                                        <div class="product-hover">
                                            <div class="product-table">
                                                <div class="product-table-cell">
                                                    <span>{!! $partner->description !!}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <div class="product-details text-center" style="width: 100%">
                                <h6 style="font-size: 12px">{{ $partner->title }}</h6>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!--our product end -->
@endsection
