@extends('layouts.main')

@section('content')
    <div class="overlay-bg"></div>

    <!--breadcum start -->
    <section class="breadcumb-section breadcumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Sign In</h1>
                    <p><a href="{{ route('index') }}">Home</a>/Sign In</p>
                </div>
            </div>
        </div>
    </section>
    <!--breadcum end-->

    <div class="sign-in-page">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <h2>Sign In Now</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui asperiores velit, minus repellendus! Fuga repellat perspiciatis amet at, deleniti. Porro!</p>
                    <div class="login-form">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" name="email" id="email" placeholder="Email Address">

                                </div>
                                <div class="col-md-6">
                                    <input type="password" name="password" id="password" placeholder="Password">
                                </div>
                            </div>
                            <input type="submit" value="Let Me Enter">
                            <a href="#">Have You Forgot Your Username or password?</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
