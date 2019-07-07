@extends('layouts.main')
@section('content')

    <div class="overlay-bg"></div>

    <!--breadcum start -->
    <section class="breadcumb-section breadcumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Single Cause</h1>
                    <p><a href="index.html">Home</a>/Single Cause</p>
                </div>
            </div>
        </div>
    </section>
    <!--breadcum end-->
    <!--single causes start-->
    <div class="single-causes">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="single-cause-thumb">
                        <img src="{{ asset('assets/img/single-cause-image.jpg') }}" alt="">
                    </div>
                    <div class="box-shadow-bottom"></div>
                    <div class="prog-item">
                        <span id="prog-two"></span>
                    </div>
                </div>
                <div class="cause-amount-collected">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="cause-amount">
                                <div class="rise-amount">Raised <span>$3000</span></div>
                                <div class="goal-amount">Goal <span>$5000</span></div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 text-right">
                            <a href="#" class="boxed-btn">Donate Now!</a>
                        </div>
                    </div>
                </div>

                <div class="single-cause-content">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown scrambled it to make a type specimen book.</p>
                    <div class="row">
                        <div class="col-md-6">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the </p>
                            <p>1500s, when an unknown printer took a galley of type and scrambled it dsu make a type specimen book. It has survived only five </p>
                        </div>
                        <div class="col-md-6">
                            <ul class="single-cause-ul">
                                <li><i class="icofont icofont-verification-check"></i> Lorem Ipsum is simply printing and typesetting industry.</li>
                                <li><i class="icofont icofont-verification-check"></i> When unknow printer took gallery something.</li>
                                <li><i class="icofont icofont-verification-check"></i> Lorem Ipsum is simply printing and typesetting industry.</li>
                                <li><i class="icofont icofont-verification-check"></i> When unknow printer took gallery something.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--single causes start-->

    <!--recent causes start-->
    <div class="recent-causes">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <div class="section-title">
                        <h2>Recent <span>Causes</span></h2>
                        <span class="title-separetor">
                                <img src="{{ asset('assets/img/separetor-icon.png') }}" alt="separetor image">
                            </span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="single-causes-item single-page">
                        <div class="cause-thumb">
                            <img src="{{ asset('assets/img/single-cause-1.jpg') }}" alt="case image">
                            <div class="box-shadow-bottom"></div>
                            <div class="prog-item">
                                <span id="prog-three"></span>
                            </div>
                        </div>
                        <div class="cause-amount">
                            <div class="rise-amount">Raised <span>$3000</span></div>
                            <div class="goal-amount">Goal <span>$5000</span></div>
                        </div>
                        <div class="cause-right">
                            <div class="cause-right-top">
                                <h4>Donation for <span class="color">Childrens Teaching</span></h4>
                                <p>Lorem ipsum dolor sit amet, consectetur elit, sed do eiusmod tempor ut labore et dolore aliqua. Ut enim ad minim veniam, </p>
                            </div>
                            <div class="cause-right-bottom">
                                <a href="" class="boxed-btn">Donate Now</a>
                                <div class="cause-right-social-icon text-right">
                                    Share: <a href=""><i class="icofont icofont-social-facebook"></i></a>
                                    <a href=""><i class="icofont icofont-social-twitter"></i></a>
                                    <a href=""><i class="icofont icofont-social-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-causes-item single-page">
                        <div class="cause-thumb">
                            <img src="{{ asset('assets/img/single-cause-1.jpg') }}" alt="case image">
                            <div class="box-shadow-bottom"></div>
                            <div class="prog-item">
                                <span id="prog-five"></span>
                            </div>
                        </div>
                        <div class="cause-amount">
                            <div class="rise-amount">Raised <span>$3000</span></div>
                            <div class="goal-amount">Goal <span>$5000</span></div>
                        </div>
                        <div class="cause-right">
                            <div class="cause-right-top">
                                <h4>Donation for <span class="color">Childrens Teaching</span></h4>
                                <p>Lorem ipsum dolor sit amet, consectetur elit, sed do eiusmod tempor ut labore et dolore aliqua. Ut enim ad minim veniam, </p>
                            </div>
                            <div class="cause-right-bottom">
                                <a href="" class="boxed-btn">Donate Now</a>
                                <div class="cause-right-social-icon text-right">
                                    Share: <a href=""><i class="icofont icofont-social-facebook"></i></a>
                                    <a href=""><i class="icofont icofont-social-twitter"></i></a>
                                    <a href=""><i class="icofont icofont-social-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-causes-item single-page">
                        <div class="cause-thumb">
                            <img src="{{ asset('assets/img/single-cause-1.jpg') }}" alt="case image">
                            <div class="box-shadow-bottom"></div>
                            <div class="prog-item">
                                <span id="prog-one"></span>
                            </div>
                        </div>
                        <div class="cause-amount">
                            <div class="rise-amount">Raised <span>$3000</span></div>
                            <div class="goal-amount">Goal <span>$5000</span></div>
                        </div>
                        <div class="cause-right">
                            <div class="cause-right-top">
                                <h4>Donation for <span class="color">Childrens Teaching</span></h4>
                                <p>Lorem ipsum dolor sit amet, consectetur elit, sed do eiusmod tempor ut labore et dolore aliqua. Ut enim ad minim veniam, </p>
                            </div>
                            <div class="cause-right-bottom">
                                <a href="" class="boxed-btn">Donate Now</a>
                                <div class="cause-right-social-icon text-right">
                                    Share: <a href=""><i class="icofont icofont-social-facebook"></i></a>
                                    <a href=""><i class="icofont icofont-social-twitter"></i></a>
                                    <a href=""><i class="icofont icofont-social-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--recent causes end-->

    <div class="newsletter">
        <!--news letter section-->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="news-letter-wrapper">
                        <div class="row">
                            <div class="col-md-5">
                                <span class="sub-title">Subscribe</span>
                                <h4>to our newsletter</h4>
                            </div>
                            <div class="col-md-7">
                                <form action="index.html">
                                    <div class="form-element">
                                        <input type="email" name="email" placeholder="Enter your email address....">
                                        <span class="has-icon"><input type="submit" value="submit"></span>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
