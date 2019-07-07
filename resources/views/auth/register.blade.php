@extends('layouts.main')

@section('content')

    <div class="overlay-bg"></div>

    <!--breadcum start -->
    <section class="breadcumb-section breadcumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Create A Account</h1>
                    <p><a href="index.html">Home</a>/Create A Account</p>
                </div>
            </div>
        </div>
    </section>
    <!--breadcum end-->
    <!--sign up start-->
    <div class="sign-in-page">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <h2>Create New Account</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui asperiores velit, minus repellendus! Fuga repellat perspiciatis amet at, deleniti. Porro!</p>
                    <div class="login-form">
                        <form action="{{ route('register') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" name="firstname" id="firstname" placeholder="First Name">

                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="lastname" id="lastname" placeholder="Last Name">
                                </div>
                            </div>
                            <input type="email" name="email" placeholder="Email Address">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="password" name="password" id="password" placeholder="Password">

                                </div>
                                <div class="col-md-6">
                                    <input type="password" name="password_confirmation" id="con_password" placeholder="Confirm Password">
                                </div>
                            </div>
                            <input type="submit" value="Create Account">
                            <p>A verification email will be send yo you</p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--sign up end-->

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
    </div>Z

@endsection
