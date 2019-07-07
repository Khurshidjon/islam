@extends('layouts.main')
@section('content')

    <div class="overlay-bg"></div>

    <!--breadcum start -->
    <section class="breadcumb-section breadcumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Make a donation</h1>
                    <p><a href="index.html">Home</a>/Make a donation</p>
                </div>
            </div>
        </div>
    </section>
    <!--breadcum end-->

    <!--donate page start-->
    <div class="donate-page">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="how-much-donate">
                        <h4>How Much Would You Like To <span>Donate</span>?</h4>
                        <ul class="donate-amount">
                            <li>$10</li>
                            <li class="active">$25</li>
                            <li>$50</li>
                            <li>$100</li>
                            <li>$150</li>
                            <li>or</li>
                            <li><input type="text" placeholder="Other Amount"></li>
                        </ul>
                    </div>
                    <div class="billing-form">
                        <h4>Billing Information</h4>
                        <form action="#">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="billing-element">
                                        <label for="firstname">First Name <span>*</span></label>
                                        <input type="text" id="firstname" placeholder="First Name">
                                    </div>
                                    <div class="billing-element">
                                        <label for="email">Email <span>*</span></label>
                                        <input type="email" id="email" placeholder="Enter Email">
                                    </div>
                                    <div class="billing-element">
                                        <label for="address">Address 1 <span>*</span></label>
                                        <input type="text" id="address" placeholder="Enter Address">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="billing-element">
                                        <label for="lastname">Last Name <span>*</span></label>
                                        <input type="text" id="lastname" placeholder="Last Name">
                                    </div>
                                    <div class="billing-element">
                                        <label for="phone">Phone <span>*</span></label>
                                        <input type="text" id="phone" placeholder="Enter Number">
                                    </div>
                                    <div class="billing-element">
                                        <label for="address-two">Address 2 <span>*</span></label>
                                        <input type="text" id="address-two" placeholder="Enter Address">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="billing-element">
                                        <label for="city">City <span>*</span></label>
                                        <select name="city" id="city">
                                            <option value="1">Dhaka</option>
                                            <option value="2">Chittagong</option>
                                            <option value="3">Khulna</option>
                                            <option value="4">Rajshahi</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="billing-element">
                                        <label for="state">State/Probince <span>*</span></label>
                                        <select name="city" id="state">
                                            <option value="1">Dinajpur</option>
                                            <option value="2">Shirajgong</option>
                                            <option value="3">Pabna</option>
                                            <option value="4">Basudebpur</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="billing-element">
                                        <label for="city">Zip/Postal Code <span>*</span></label>
                                        <input type="text" placeholder="eg:3850">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="payment-imfomation">
                        <h4>Payment Information</h4>
                        <div class="payment-logo">
                            <img src="{{ asset('assets/img/payment-1.png') }}" alt="payment logo">
                            <img src="{{ asset('assets/img/payment-2.png') }}" alt="payment logo">
                            <img src="{{ asset('assets/img/payment-3.png') }}" alt="payment logo">
                            <img src="{{ asset('assets/img/payment-4.png') }}" alt="payment logo">
                        </div>
                        <form action="index.html">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="billing-element">
                                        <label for="cardnumber">Card Number <span>*</span></label>
                                        <input type="text" id="cardnumber" placeholder="Card Number">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="billing-element">
                                        <label for="cardholder">Card Holder Name <span>*</span></label>
                                        <input type="text" id="cardholder" placeholder="Card Holder Name">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="billing-element">
                                        <label for="expire_date">Expire Date <span>*</span></label>
                                        <select name="expire_date" id="expire_date">
                                            <option value="1">01</option>
                                            <option value="2">02</option>
                                            <option value="3">03</option>
                                            <option value="4">04</option>
                                            <option value="4">05</option>
                                            <option value="4">06</option>
                                            <option value="4">07</option>
                                            <option value="4">08</option>
                                            <option value="4">09</option>
                                            <option value="4">10</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="billing-element">
                                        <label for="year" class="hidden-label">---</label>
                                        <select name="year" id="year">
                                            <option value="1">2017</option>
                                            <option value="2">2018</option>
                                            <option value="3">2019</option>
                                            <option value="4">2020</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="billing-element">
                                        <label for="city">Security Code (CVC) <span>*</span></label>
                                        <input type="text" placeholder="Security Code">
                                    </div>
                                </div>
                            </div>
                            <input type="submit" value="submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--donate page end-->

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
        <!--azan time end-->
    </div>

@endsection


