<!DOCTYPE html>
<html lang="uz">
@php
    $langss = \App\Language::all();
@endphp
<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Nomad TECHNO">
    <meta name="author" content="Nomad techno">
    <meta name="keywords" content="Nomad techno">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Title Page-->
    <title>Dashboard</title>

    <!-- Fontfaces CSS-->
    <script src="{{ asset('admin_files/vendor/jquery-3.2.1.min.js') }}"></script>
    <link href="{{ asset('admin_files/css/font-face.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin_files/vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin_files/vendor/font-awesome-5/css/fontawesome-all.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin_files/vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->

    <link href="{{ asset('admin_files/vendor/bootstrap-4.1/bootstrap.min.css') }}" rel="stylesheet" media="all">
{{--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">--}}
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <!-- Vendor CSS-->
    <link href="{{ asset('admin_files/vendor/animsition/animsition.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin_files/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet" media="all">
{{--    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script>--}}
    <link href="{{ asset('admin_files/vendor/wow/animate.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin_files/vendor/css-hamburgers/hamburgers.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin_files/vendor/slick/slick.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin_files/vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin_files/vendor/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" media="all">

    <!-- Main CSS-->

    <link href="{{ asset('admin_files/css/theme.css') }}" rel="stylesheet" media="all">
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
{{--    <script src="{{ asset('ckeditor/lang/en.js') }}"></script>--}}
{{--    <script src="{{ asset('ckeditor/lang/ru.js') }}"></script>--}}

    <link rel="stylesheet" type="text/css" href="{{ asset('admin_files/image_uploader/fancy_fileupload.css') }}">
    <script src="{{ asset('admin_files/image_uploader/jquery.ui.widget.js') }}"></script>
    <script src="{{ asset('admin_files/image_uploader/jquery.fileupload.js') }}"></script>
    <script src="{{ asset('admin_files/image_uploader/jquery.iframe-transport.js') }}"></script>
    <script src="{{ asset('admin_files/image_uploader/jquery.fancy-fileupload.js') }}"></script>
{{--    <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>--}}
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
{{--    <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>--}}
    <script src="{{ asset('vendor/unisharp/laravel-ckeditor/adapters/jquery.js') }}"></script>
{{--    <script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>--}}
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.3/summernote.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.3/summernote.js"></script>
    <script>

    </script>
    <style>
        .list-unstyled li a {
            border-bottom: 1px solid grey;
            transition: all .2s ease-in-out;
        }
        .list-unstyled li a i:last-child{
            float: right;
        }
        .list-unstyled li:hover a {
            transform: scale(1.1);
            opacity: 1;
        }
        .pagination li.disabled{
            background-color: grey;
            border-color: grey;
            color: #FFFFFF;
            cursor: not-allowed;
        }
        .pagination li.disabled:hover{
            background-color: grey;
        }
        .pagination {
            margin-bottom: 10em;
        }
    </style>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.js.map"></script>--}}
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    @stack('script')

</head>

<body class="animsition">
<div class="page-wrapper">
    <!-- HEADER MOBILE-->
    <header class="header-mobile d-block d-lg-none">
        <div class="header-mobile__bar">
            <div class="container-fluid">
                <div class="header-mobile-inner">
                    <a class="logo" href="{{ route('admin.index') }}">
                        <img src="{{ asset('assets/img/logo.png') }}" alt="CoolAdmin" />
                    </a>
                    <button class="hamburger hamburger--slider" type="button">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
        </div>
        <nav class="navbar-mobile">
            <div class="container-fluid">
                <ul class="navbar-mobile__list list-unstyled">
                    <li class="active">
                        <a class="" href="{{ route('admin.index') }}">
                            <i class="fas fa-tachometer-alt"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="has-sub">
                        <a class="js-arrow" href="#">
                            <i class="fas fa-server"></i>
                            Contents
                            <i class="fas fa-chevron-down"></i>
                        </a>
                        <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                            <li>
                                <a href="{{ route('categories.index') }}">
                                    <i class="fas fa-list-ul"></i>
                                    Categories
                                    <i></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('posts.index') }}">
                                    <i class="fas fa-newspaper"></i>
                                    Posts
                                    <i></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('comments.index') }}">
                                    <i class="fas fa-comments"></i>
                                    Comments
                                    <i></i>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="has-sub">
                        <a class="js-arrow" href="#">
                            <i class="fas fa-images"></i>
                            Media
                            <i class="fas fa-chevron-down mt-1 down"></i>
                        </a>
                        <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                            <li>
                                <a href="{{ route('albums.index') }}">
                                    <i class="far fa-image"></i>
                                    Albums
                                    <i></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('galleries.index') }}">
                                    <i class="far fa-images"></i>
                                    Galleries
                                    <i></i>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="has-sub">
                        <a class="js-arrow" href="#">
                            <i class="fas fa-cogs"></i>
                            Permission
                            <i class="fas fa-chevron-down mt-1 down"></i>
                        </a>
                        <ul class="navbar-mobile-sub__list list-unstyled js-sub-list    ">
                            <li>
                                <a href="{{ route('settings.index') }}">
                                    Settings
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('users.index') }}">
                                    Users
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('permissions.index') }}">Permissions</a>
                            </li>
                            <li>
                                <a href="{{ route('roles.index') }}">Roles</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="" href="{{ route('admin.homepage-control') }}">
                            <i class="fas fa-tachometer-alt"></i>
                            Homepage
                            <i></i>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('messages.index') }}">
                            <i class="fas fa-comments"></i>
                            Feedbacke message
                            <i></i>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- END HEADER MOBILE-->

    <!-- MENU SIDEBAR-->
    <aside class="menu-sidebar d-none d-lg-block">
        <div class="logo">
            <a href="{{ route('admin.index') }}">
                <img src="{{ asset('sitelogo/logo1.png') }}" style="width: 60px" alt="Cool Admin" />
            </a>
        </div>
        <div class="menu-sidebar__content js-scrollbar1" style="background-color: #f5f5f5 !important;">
            <nav class="navbar-sidebar">
                <ul class="list-unstyled navbar__list">
                    <li class="active">
                        <a href="{{ route('admin.index') }}">
                            <i class="fas fa-tachometer-alt"></i>
                            Dashboard
                            <i></i>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('menus.index') }}">
                            <i class="fas fa-server"></i>
                            Menus
                            <i></i>
                        </a>
                    </li>
                    <li>

                    </li>
                    <li class="has-sub">
                        <a class="js-arrow" href="#">
                            <i class="fas fa-box"></i>
                            Content
                            <i class="fas fa-chevron-down mt-1 down"></i>
                        </a>
                        <ul class="list-unstyled navbar__sub-list js-sub-list">
                            <li>
                                <a href="{{ route('categories.index') }}">
                                    <i class="fas fa-list-ul"></i>
                                    Categories
                                    <i></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('posts.index') }}">
                                    <i class="fas fa-newspaper"></i>
                                    Posts
                                    <i></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('comments.index') }}">
                                    <i class="fas fa-comments"></i>
                                    Comments
                                    <i></i>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="has-sub">
                        <a class="js-arrow" href="#">
                            <i class="fas fa-images"></i>
                            Media
                            <i class="fas fa-chevron-down mt-1 down"></i>
                        </a>
                        <ul class="list-unstyled navbar__sub-list js-sub-list">
                            <li>
                                <a href="{{ route('albums.index') }}">
                                    <i class="far fa-image"></i>
                                    Albums
                                    <i></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('galleries.index') }}">
                                    <i class="far fa-images"></i>
                                    Galleries
                                    <i></i>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="has-sub">
                        <a class="js-arrow" href="#">
                            <i class="fas fa-cogs"></i>
                            Permission
                            <i class="fas fa-chevron-down mt-1 down"></i>
                        </a>
                        <ul class="list-unstyled navbar__sub-list js-sub-list">
                            <li>
                                <a href="{{ route('settings.index') }}">
                                    Settings
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('users.index') }}">
                                    Users
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('permissions.index') }}">Permissions</a>
                            </li>
                            <li>
                                <a href="{{ route('roles.index') }}">Roles</a>
                            </li>
                        </ul>
                    </li>
                    <li class="">
                        <a class="" href="{{ route('admin.homepage-control') }}">
                            <i class="fas fa-cog"></i>
                            Homepage
                            <i class=""></i>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('messages.index') }}">
                            <i class="fas fa-comments"></i>
                            Messages
                            @if(DB::table('messages')->where('status', 0)->first())
                                <sup class="text-danger">News <sup class="badge badge-success">{{ count(DB::table('messages')->where('status',0)->get()) }}</sup></sup>
                            @endif
                            <i></i>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('helper') }}">
                            <i class="far fa-question-circle"></i>
                                Helper
                            <i></i>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>

    <!-- END MENU SIDEBAR-->
    <!-- PAGE CONTAINER-->
    <div class="page-container">
        <!-- HEADER DESKTOP-->
        <header class="header-desktop">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="header-wrap">
                        <form class="form-header" action="" method="GET">
                            <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                            <button class="au-btn--submit" type="submit">
                                <i class="zmdi zmdi-search"></i>
                            </button>
                        </form>
                        @php $lang = App::getLocale() @endphp
                        <div class="header-button">
                            <div class="noti-wrap">
                                <div class="noti__item js-item-menu">
                                    <i class="zmdi zmdi-settings"></i>
                                    <span>
                                        @if($lang == 'uz')
                                            <img src="{{ asset('flags/uz.svg') }}" alt="" style="width: 40px">
                                        @elseif($lang == 'ru')
                                            <img src="{{ asset('flags/ru.svg') }}" alt="" style="width: 40px">
                                        @elseif($lang == 'en')
                                            <img src="{{ asset('flags/en.svg') }}" alt="" style="width: 40px">
                                        @elseif($lang == 'ar')
                                            <img src="{{ asset('flags/ar.svg') }}" alt="" style="width: 40px">
                                        @elseif($lang == 'tr')
                                            <img src="{{ asset('flags/tr.svg') }}" alt="" style="width: 40px">
                                        @endif
                                    </span>
                                    <div class="notifi-dropdown js-dropdown">
                                        @foreach($langss as $item)
                                            <a href="{{ route('locale', ['locale' => $item->lang]) }}" class="notifi__item">
                                                <div class="img-cir img-40">
                                                    <img src="{{ asset('flags/' .$item->lang. '.svg') }}" alt="" style="height: 100%">
                                                </div>
                                                <div class="content">
                                                    <p>{{ $item->name }}</p>
                                                </div>
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="account-wrap">
                                <div class="account-item clearfix js-item-menu">
                                    <div class="image">
                                        <img src="{{ asset('storage') .'/'. Auth::user()->avatar }}" alt="{{ Auth::user()->name }}" />
                                    </div>
                                    <div class="content">
                                        <a class="js-acc-btn" href="#">{{ Auth::user()->firstname . ' ' . Auth::user()->lastname}}</a>
                                    </div>
                                    <div class="account-dropdown js-dropdown">
                                        <div class="info clearfix">
                                            <div class="image">
                                                <a href="#">
                                                    <img src="{{ asset('storage') .'/'. Auth::user()->avatar }}" alt="{{ Auth::user()->firstname .' ' . Auth::user()->lastname }}" />
                                                </a>
                                            </div>
                                            <div class="content">
                                                <h5 class="name">
                                                    <a href="#">{{ Auth::user()->firstname . ' '. Auth::user()->lastname}}</a>
                                                </h5>
                                                <span class="email">{{ Auth::user()->email }}</span>
                                            </div>
                                        </div>
                                        <div class="account-dropdown__body">
                                            <div class="account-dropdown__item">
                                                <a href="{{ route('index') }}" target="_blank">
                                                    <i class="zmdi zmdi-home"></i>Home</a>
                                            </div>
                                            <div class="account-dropdown__item">
                                                <a href="{{ route('user.account.edit') }}">
                                                    <i class="zmdi zmdi-settings"></i>Setting</a>
                                            </div>
                                            @guest
                                                ok
                                            @else
                                                <div class="account-dropdown__footer">
                                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                                       onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                                        <i class="zmdi zmdi-power"></i>
                                                        Logout
                                                    </a>

                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                        @csrf
                                                    </form>
                                                </div>
                                            @endguest
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        @yield('content')
    </div>
<!-- HEADER DESKTOP-->

<!-- Jquery JS-->
<!-- Bootstrap JS-->
</div>
<script src="{{ asset('admin_files/vendor/bootstrap-4.1/popper.min.js') }}"></script>
<script src="{{ asset('admin_files/vendor/bootstrap-4.1/bootstrap.min.js') }}"></script>
<!-- Vendor JS       -->
<script src="{{ asset('admin_files/vendor/slick/slick.min.js') }}">
</script>
<script src="{{ asset('admin_files/vendor/wow/wow.min.js') }}"></script>
<script src="{{ asset('admin_files/vendor/animsition/animsition.min.js') }}"></script>
<script src="{{ asset('admin_files/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js') }}">
</script>
<script src="{{ asset('admin_files/vendor/counter-up/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('admin_files/vendor/counter-up/jquery.counterup.min.js') }}">
</script>
<script src="{{ asset('admin_files/vendor/circle-progress/circle-progress.min.js') }}"></script>
<script src="{{ asset('admin_files/vendor/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('admin_files/vendor/chartjs/Chart.bundle.min.js') }}"></script>
<script src="{{ asset('admin_files/vendor/select2/select2.min.js') }}">
</script>

<!-- Main JS-->
<script src="{{ asset('admin_files/js/main.js') }}"></script>
    <script src="{{ asset('js/homepage.js') }}"></script>
</body>

</html>
<!-- end document-->
