<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="google-site-verification" content="TIEI60O5EHFx-WNcivMquffN3VbkurPHc_nxGCvQkAc">
    <meta name="robots" content="noindex,nofollow">
    <title>Center of Islamic Civilization in Uzbekistan under the Cabinet of Ministers of the Republic of Uzbekistan</title>
    <!--Favicon add-->
    <link rel="shortcut icon" type="image/png" href="{{ asset('sitelogo/logo1.png') }}">
    <!--jquery script load-->
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script src="{{ asset('js/responsivevoice.js') }}"></script>
    <!--bootstrap Css-->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <!--ico font Css-->
    <link href="{{ asset('assets/css/icofont.css') }}" rel="stylesheet">
    <!-- magnific-popup Css-->
    <link href="{{ asset('assets/css/magnific-popup.css') }}" rel="stylesheet">
    <!--lineProgressbar Css-->
    <link href="{{ asset('assets/css/jquery.lineProgressbar.css') }}" rel="stylesheet">
    <!--owl.carousel Css-->
    <link href="{{ asset('assets/css/owl.carousel.css') }}" rel="stylesheet">
    <!--jquery ui Css-->
    <link href="{{ asset('assets/css/jquery-ui.min.css') }}" rel="stylesheet">
    <!--Slick Nav Css-->
    <link href="{{ asset('assets/css/slicknav.min.css') }}" rel="stylesheet">
    <!--Animate Css-->
    <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet">
    <!--Style Css-->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <!--Responsive Css-->
    <link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet">

    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

    <style>
        .support-bar-wrapper{
            background-color: #0268b2 !important;
        }
        .navbar-section{
            border-top-color:  #0268b2 !important;
        }
        .single-causes-item .row {
            margin-left: 0;
            margin-right: 0;
        }
        .sliderText{
            color: grey;
        }
        #getText{
            background-color: #0f74a8;
        }
    </style>
    <script>
        function startTime() {
            var today = new Date();
            var h = today.getHours();
            var m = today.getMinutes();
            var s = today.getSeconds();
            m = checkTime(m);
            s = checkTime(s);
            document.getElementById('dynamicClock').innerHTML =
                h + ":" + m + ":" + s;
            var t = setTimeout(startTime, 500);
        }
        function checkTime(i) {
            if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
            return i;
        }
    </script>
    @stack('meta')
</head>
@php
        $lang = App::getLocale();

        if ($lang == 'uz'){
            $week = ['Yakshanba', 'Dushanba', 'Seshanba', 'Chorshanba', 'Payshanba', 'Juma', 'Shanba'];
            $years = ['Yanvar', 'Fevral', 'Mart', 'Aprel', 'May', 'Iyun', 'Iyul', 'Avgust', 'Sentabr', 'Oktabr', 'Noyabr', 'Dekabr'];
        }elseif ($lang == 'ru'){
            $week = [ 'Воскресенье', 'Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота'];
            $years = ['январь', 'февраль', 'март', 'апрель', 'май', 'июнь', 'июль', 'август', 'сентябрь', 'октябрь', 'ноябрь', 'декабрь'];
        }elseif($lang == 'en'){
            $week = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
            $years = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        }elseif($lang == 'ar'){
            $week = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
            $years = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        }elseif($lang == 'tr'){
            $week = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
            $years = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        }
@endphp
<body onload="startTime()" style="background-image: url('{{ asset('background_image/photo_2019-04-15_12-24-29.jpg') }}')">
<!--preloader start-->
    <div class="preloader">
        <div class="preloader-wrapper">
            <div class="preloader-img">
                <img src="{{ asset('sitelogo/logo1.png') }}" alt="Preloader Image" style="width: 100px">
            </div>
        </div>
    </div>
<!--preloader end-->
<!--navbar section start-->



<div class="navbar-section">
    <div class="container-fluid">
        <div class="row" style="">
            <div class="col-md-1 col-sm-1">
                <a href="{{ route('index') }}" class="logo" style="margin-right: 0; margin-left: 0; display: block; margin-top: 30px">
                    <img src="{{ asset('sitelogo/logo.png') }}" alt="logo image" style="width: 11em">
                </a>
            </div>
            <div class="col-md-11 col-sm-11">
                <div class="col-md-8 col-md-offset-4 col-sm-10">
                    <div class="support-bar-wrapper">
                        <div class="support-content">
                            <div class="log_in_out2">
                                <div class="dropdown">
                                    <div class="icon_accessibility dataTooltip" data-toggle="dropdown" data-placement="bottom" title="" data-original-title="Mahsus imkoniyatlar" aria-expanded="true">
                                        <a href="#" style="margin-left: -230px; font-size: 12px">
                                            <i class="glyphicon glyphicon-eye-close"></i>
                                        </a>
                                    </div>
                                    <div class="dropdown-menu dropdown-menu-right specialViewArea no-propagation">
                                        <div class="triangle"></div>
                                        <div class="appearance">
                                            <p class="specialTitle">Кўриниш</p>
                                            <div class="squareAppearances">
                                                <div class="squareBox spcNormal" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Oddiy ko`rinish">A</div>
                                            </div>
                                            <div class="squareAppearances">
                                                <div class="squareBox spcWhiteAndBlack" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Oq-qora ko`rinish">A</div>
                                            </div>
                                            <div class="squareAppearances">
                                                <div class="squareBox spcDark" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Qorong`ilashgan ko`rinish">A</div>
                                            </div>
                                            <div class="squareAppearances">
                                                <div class="squareBox spcNoImage" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Расмли"></div>
                                            </div>
                                        </div>
                                        <div class="appearance">
                                            <p class="specialTitle">Шрифт ўлчами</p>
                                            <div class="block">
                                                <div class="sliderText"><span class="range">0</span>% га катталаштириш</div>
                                                <div id="fontSizer" class="defaultSlider ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
                                                    <div class="ui-slider-range ui-widget-header ui-corner-all ui-slider-range-min" style="width: 0%;"></div><span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0" style="left: 0%;"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="more_margin"></div>
                                        <div class="appearance">
                                            <div class="pull-right">
                                                <button class="btn" id="getText"><i class="icofont icofont-volume-up"></i></button>
                                            </div>
                                        </div>
                                        <div class="more_margin"></div>
                                        <div class="appearance">
                                            <div class="specialViewCopyrightText"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="#" class="blank-btn" style="color: #FFFFFF;">
                            <div class="date_time flex_row_cen">
                                <span>
                                    {{ date('d') .' '. $years[date('n')-1] .' '. date('Y') .' '. $week[date('w')]}}
                                </span>
                                <span class="line"></span>
                                <span>
                                    <span id="dynamicClock"></span>
                                </span>
                            </div>
                        </a>
                        <div class="support-content" style="font-size: 13px">

                            <a href="mailto:{{ $email!=null?$email->val:'' }}" class="support-email"> <i class="icofont icofont-email"></i>
                                {{ $email!=null?$email->val:'' }}
                                <span class="separetor">&#10072;</span>
                            </a>
                            <a href="tel:{{ $phone!=null?$phone->val:'#' }}" class="support-number"> <i class="icofont icofont-phone"></i> {{ $phone!=null?$phone->val:'' }} <span class="separetor">&#10072;</span></a>
                            <div class="support-social ">
                                <a href="{{ $facebook!=null?$facebook->url:'#' }}"><i class="icofont icofont-social-facebook"></i></a>
                                <a href="{{ $twitter!=null?$twitter->url:'#' }}"><i class="icofont icofont-social-twitter"></i></a>
                                <a href="{{ $instagram!=null?$instagram->url:'#' }}"><i class="icofont icofont-social-instagram"></i></a>
                                <a href="{{ $telegram!=null?$telegram->url:'#' }}"><i class="icofont icofont-social-telegram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10 text-right">
                        <ul id="main-menu" class="main-menu">
                            @foreach($menus as $menu)
                                <li>
                                    <a href="{{ $menu->url }}">{{ $menu->name }}
                                        @if($menu->sub_menu!=null)
                                            <i class="icofont icofont-thin-down"></i>
                                        @endif
                                    </a>
                                    @if($menu->sub_menu!=null)
                                    <ul class="sub-menu" style="z-index: 100">
                                        @foreach($menu->submenu->chunk(4) as $chunk)
                                            @foreach($chunk as $submenu)
                                                <li><a href="{{ $submenu->url }}">{{ $submenu->name }}</a></li>
                                            @endforeach
                                        @endforeach
                                    </ul>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-md-2 col-sm-1 text-left">
                        <div class="tools">
                            <a href="#" id="search-icon"><i class="icofont icofont-search"></i></a>
                        </div>
                        <a type="button" href="#" class="boxed-btn donate dropdown-toggle" style="color:#FFFFFF !important; right: 31px; z-index: 1" data-toggle="dropdown"> {{ \App\Language::where('lang', $locale)->first()->name }}</a>
                        <ul class="dropdown-menu" style="right: 0; left: unset">
                            @foreach($languages as $language)
                                <li><a class="dropdown-item {{ $language->lang==$locale?'active':'' }}" href="{{ route('locale', ['lang' => $language->lang]) }}">{{ $language->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--navbar section end-->
<!--search box start-->
<div class="search-box">
    <div class="search-box-wrapper">
        <div class="search-close-btn" id="serach-close-btn">
            <i class="icofont icofont-close-line-circled"></i>
        </div>
        <form action="{{ route('searching') }}">
            <p class="serach-element">
                <input type="text" name="search_text" id="search_text" value="{{ $q }}">
                <span class="search-icon">
                 <button class="btn" style="background-color: white" type="submit">
                     <i class="icofont icofont-search-alt-1"></i>
                 </button>
                </span>
            </p>
        </form>
    </div>
</div>
<!--search box end-->

<div class="overlay-bg"></div>

@yield('content')


<!--footer area start-->
<div class="newsletter">
    <!--news letter section-->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="news-letter-wrapper">
                    <div class="row">
                        <div class="col-md-5">
                            @lang('pages.subscribe_title')
                        </div>
                        <div class="col-md-7">
                            <form action="{{ route('subscribers') }}" class="subscribers-form" method="post">
                                <div class="form-element">
                                    <input type="email" name="subscribers" class="subscribers" placeholder="@lang('pages.subscriber_form_placeholder')">
                                    <span class="has-icon"><input type="submit" class="submit" value="@lang('pages.subscriber_form_button')"></span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<footer class="footer-section">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="widget-one-wrapper">
                    <div class="widget-one-body">
                        <div class="widget-title mb-0">
                            <h4>@lang('pages.social_links')</h4>
                            <span class="title-separetor">
                                 <img src="{{ asset('assets/img/footer-separetor-icon.png') }}" alt="separetor image">
                            </span>
                        </div>
                        <div class="footer-social-links text-center">
                            <a href="{{ $facebook!=null?$facebook->url:'#' }}"><i class="icofont icofont-social-facebook"></i></a>
                            <a href="{{ $twitter!=null?$twitter->url:'#' }}"><i class="icofont icofont-social-twitter"></i></a>
                            <a href="{{ $instagram!=null?$instagram->url:'#' }}"><i class="icofont icofont-social-instagram"></i></a>
                            <a href="{{ $telegram!=null?$telegram->url:'#' }}"><i class="icofont icofont-social-telegram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="widget-two-wrapper">
                    <div class="widget-title">
                        <h4>@lang('pages.addresses')</h4>
                        <span class="title-separetor">
                             <img src="{{ asset('assets/img/footer-separetor-icon.png') }}" alt="separetor image">
                        </span>
                    </div>
                    <div class="widget-two-body">
                        <p><i class="icofont icofont-phone"></i> {{ $phone!=null?$phone->val:'' }}</p>
                        <p><a href="mailTo:{{ $email!=null?$email->val:'#' }}"><i class="icofont icofont-email"></i> {{ $email!=null?$email->val:'' }}</a></p>
                        <p><a href="http://cisc.uz"><i class="icofont icofont-web"></i>http://cisc.uz</a></p>
                        <p><i class="icofont icofont-location-pin"></i> {{ $address!=null?$address->val:'' }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-7">
                <div class="widget-three-wrapper">
                    <div class="widget-title">
                        <h4>@lang('pages.useful_links')</h4>
                        <span class="title-separetor">
                             <img src="{{ asset('assets/img/footer-separetor-icon.png') }}" alt="separetor image">
                        </span>
                    </div>
                    <div class="widget-three-body">
                        <ul>
                            @foreach($footer_menus as $footer_menu)
                                <li><a href="{{$footer_menu->url}}" style="font-size: 14px"><i class="icofont icofont-curved-double-right"></i> {{ $footer_menu->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-5">
                <div class="widget-four-wrapper">
                    <div class="widget-title">
                        <h4>@lang('pages.album_gallery')</h4>
                        <span class="title-separetor">
                             <img src="{{ asset('assets/img/footer-separetor-icon.png') }}" alt="separetor image">
                        </span>
                    </div>
                    <div class="widget-four-body">
                        <ul>
                            @foreach($random_images as $random_image)
                                <li>
                                    <a href="{{ asset('storage') .'/'. $random_image->path }}" class="image-popup">
                                        <img src="{{ asset('storage') .'/'. $random_image->path }}" alt="" style="width: 80px; height: 80px">
                                        <span class="hover">
                                            <i class="icofont icofont-plus"></i>
                                        </span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--footer area end-->
<!--copyright area start-->
<div class="copyright-area">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <p>@lang('pages.copyright_title', ['date' => date('Y')])</p>
            </div>
        </div>
    </div>
</div>
<!--copyright area end-->

<div class="scroll-to-top">
    <i class="icofont icofont-rounded-up"></i>
</div>

<!--Isotope script load-->
<script src="{{ asset('assets/js/isotope.pkgd.js') }}"></script>
<!-- magnific popup script load-->
<script src="{{ asset('assets/js/jquery.magnific-popup.js') }}"></script>
<!--way point script load-->
<script src="{{ asset('assets/js/waypoints.min.js') }}"></script>
<!--line progress bar script load-->
<script src="{{ asset('assets/js/jquery.lineProgressbar.js') }}"></script>
<!-- counter up script load-->
<script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
<!--count down script load-->
<script src="{{ asset('assets/js/jquery.countdown.js') }}"></script>
<!--Owl carousel script load-->
<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
<!--Image load script -->
<script src="{{ asset('assets/js/imagesloaded.pkgd.js') }}"></script>
<!--Bootstrap v3 script load here-->
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<!--Slick Nav Js File Load-->
<script src="{{ asset('assets/js/jquery.slicknav.min.js') }}"></script>
<!-- jquery ui script load-->
<script src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>
<!--audio player Js File Load-->
<script src="{{ asset('assets/js/audio-player/audio.min.js') }}"></script>
<!--Wow Js File Load-->
<script src="{{ asset('assets/js/wow.min.js') }}"></script>
<!--Main js file load-->
<script src="{{ asset('assets/js/main.js') }}"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>


{{-- <script src="{{ asset('js/Gruntfile.js') }}"></script> --}}
<script src="{{ asset('js/jquery.cookie.js') }}"></script>
<script src="{{ asset('js/sw.js') }}"></script>
<!-- Subscribers script -->
<script src="{{ asset('js/subscribers.js') }}"></script>
<script src="{{ asset('toast/toastr.min.js') }}"></script>
<link rel="stylesheet" href="{{ asset('toast/toastr.css') }}">

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
</body>

</html>