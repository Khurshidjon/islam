@extends('layouts.main')
@section('content')


    <!--breadcum start -->
    <section class="breadcumb-section breadcumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>About Us</h1>
                    <p><a href="index.html">Home</a>/About us</p>
                </div>
            </div>
        </div>
    </section>
    <!--breadcum end-->
    <div class="about-page-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="about-us-image">
                        <img src="{{ asset('assets/img/about-us.jpg') }}" alt="about us image">
                        <div class="hover-icon">
                            <a href="https://www.youtube.com/watch?v=oQRMuK5EuuE" class="mfp-iframe video-play-btn"><i class="icofont icofont-ui-play"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <h3>We are think <span>Ahed</span></h3>
                    <p>Lorem ipsum dolor some link sit amet, cum at inani interesset set
                        fugit vet dolor amet modo eum homero set dummy</p>
                    <p>There are many variations of passages of Lorem Ipsum available but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believab</p>
                    <ul>
                        <li><i class="icofont icofont-double-right"></i> Lorem ipsum dolor.</li>
                        <li><i class="icofont icofont-double-right"></i> Lorem ipsum dolor.</li>
                        <li><i class="icofont icofont-double-right"></i> Lorem ipsum dolor.</li>
                        <li><i class="icofont icofont-double-right"></i> Lorem ipsum dolor.</li>
                    </ul>
                </div>
            </div>
            <div class="about-box-sections">
                <div class="row">
                    <div class="col-md-4">
                        <h4>Our Mission</h4>
                        <p>There are many variations of passages of Lorem real lypsum available, but the in the majority have suffered alteration in some form, by injected </p>
                        <p>humour, or lipuan domised words which don't look evenIpsum, you need to be sure there isn't theanything embarrassing </p>
                    </div>
                    <div class="col-md-4">
                        <h4>We Established in <span>1998</span></h4>
                        <p>There are many variations of passages of Lorem real lypsum available, but the in the majority have suffered alteration in some form, by injected </p>
                        <p>humour, or lipuan domised words which don't look evenIpsum, you need to be sure there isn't theanything embarrassing </p>
                    </div>
                    <div class="col-md-4">
                        <h4>Our Goal</h4>
                        <p>There are many variations of passages of Lorem real lypsum available, but the in the majority have suffered alteration in some form, by injected </p>
                        <p>humour, or lipuan domised words which don't look evenIpsum, you need to be sure there isn't theanything embarrassing </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- count service start-->
    <section class="count-sectoin count-section-bg">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-3 col-sm-6">
                    <div class="single-counter-box">
                        <div class="counter-wrapper">
                            <div class="count-icon">
                                <i class="icofont icofont-ui-love"></i>
                            </div>
                            <h4>Causes</h4>
                            <span class="count-separator"></span>
                            <span class="count-number"><strong>2500</strong></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-counter-box">
                        <div class="counter-wrapper">
                            <div class="count-icon">
                                <i class="icofont icofont-holding-hands"></i>
                            </div>
                            <h4>Saved Life</h4>
                            <span class="count-separator"></span>
                            <span class="count-number"><strong>2500</strong></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-counter-box">
                        <div class="counter-wrapper">
                            <div class="count-icon">
                                <i class="icofont icofont-unity-hand"></i>
                            </div>
                            <h4>Expert Volunteers</h4>
                            <span class="count-separator"></span>
                            <span class="count-number"><strong>2500</strong></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-counter-box">
                        <div class="counter-wrapper">
                            <div class="count-icon">
                                <i class="icofont icofont-money"></i>
                            </div>
                            <h4>Fund Collected</h4>
                            <span class="count-separator"></span>
                            <span class="count-number">$ <strong>25,000</strong></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- count service end-->

    <!-- our team start-->
    <div class="our-team-section">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <div class="section-title">
                        <h2>Our <span>Team</span></h2>
                        <span class="title-separetor">
                             <img src="{{ asset('assets/img/separetor-icon.png') }}" alt="separetor image">
                         </span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="single-team-member">
                        <div class="team-profile">
                            <img src="{{ asset('assets/img/team-1.jpg') }}" alt="team member">
                            <div class="team-hover">
                                <div class="team-details-wrapper text-center">
                                    <div class="team-table-cell">
                                        <div class="team-inner-top">
                                            <div class="team-member-name">
                                                <h4>Abdul-Mumin</h4>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor</p>
                                        </div>
                                        <div class="team-social-btn">
                                            <a href=""><i class="icofont icofont-social-facebook"></i></a>
                                            <a href=""><i class="icofont icofont-social-twitter"></i></a>
                                            <a href=""><i class="icofont icofont-social-google-plus"></i></a>
                                            <a href=""><i class="icofont icofont-social-instagram"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-team-member">
                        <div class="team-profile">
                            <img src="{{ asset('assets/img/team-2.jpg') }}" alt="team member">
                            <div class="team-hover">
                                <div class="team-details-wrapper text-center">
                                    <div class="team-table-cell">
                                        <div class="team-inner-top">
                                            <div class="team-member-name">
                                                <h4>AL Zahra</h4>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor</p>
                                        </div>
                                        <div class="team-social-btn">
                                            <a href=""><i class="icofont icofont-social-facebook"></i></a>
                                            <a href=""><i class="icofont icofont-social-twitter"></i></a>
                                            <a href=""><i class="icofont icofont-social-google-plus"></i></a>
                                            <a href=""><i class="icofont icofont-social-instagram"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-team-member">
                        <div class="team-profile">
                            <img src="{{ asset('assets/img/team-3.jpg') }}" alt="team member">
                            <div class="team-hover">
                                <div class="team-details-wrapper text-center">
                                    <div class="team-table-cell">
                                        <div class="team-inner-top">
                                            <div class="team-member-name">
                                                <h4>Abdus-Salaam</h4>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor</p>
                                        </div>
                                        <div class="team-social-btn">
                                            <a href=""><i class="icofont icofont-social-facebook"></i></a>
                                            <a href=""><i class="icofont icofont-social-twitter"></i></a>
                                            <a href=""><i class="icofont icofont-social-google-plus"></i></a>
                                            <a href=""><i class="icofont icofont-social-instagram"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-team-member">
                        <div class="team-profile">
                            <img src="{{ asset('assets/img/team-4.jpg') }}" alt="team member">
                            <div class="team-hover">
                                <div class="team-details-wrapper text-center">
                                    <div class="team-table-cell">
                                        <div class="team-inner-top">
                                            <div class="team-member-name">
                                                <h4>Naimal Nazir</h4>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor</p>
                                        </div>
                                        <div class="team-social-btn">
                                            <a href=""><i class="icofont icofont-social-facebook"></i></a>
                                            <a href=""><i class="icofont icofont-social-twitter"></i></a>
                                            <a href=""><i class="icofont icofont-social-google-plus"></i></a>
                                            <a href=""><i class="icofont icofont-social-instagram"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--our team end-->

    <div class="newsletter"><!--news letter section-->
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
