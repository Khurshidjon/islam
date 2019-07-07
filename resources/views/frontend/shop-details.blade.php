@extends('layouts.main')
@section('content')

    <div class="overlay-bg"></div>

    <!--breadcum start -->
    <section class="breadcumb-section breadcumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Shop Details</h1>
                    <p><a href="index.html">Home</a>/Shop Details</p>
                </div>
            </div>
        </div>
    </section>
    <!--breadcum end-->
    <div class="shop-details-page">
        <div class="container">
            <div class="row">
                <div class="col-md-6 ">
                    <div class="product-thumbnail">
                        <div class="single-product-thumb-box">
                            <img src="{{ asset('assets/img/single-product-small-thumb.jpg') }}" alt="">
                        </div>
                        <div class="single-product-thumb-box">
                            <img src="{{ asset('assets/img/single-product-small-thumb-1.jpg') }}" alt="">
                        </div>
                        <div class="single-product-thumb-box">
                            <img src="{{ asset('assets/img/product-1.jpg') }}" alt="">
                        </div>
                    </div>
                    <div class="product-main-thumb">
                        <img src="{{ asset('assets/img/single-product-thumb.jpg') }}" alt="Product Main Thumb">
                        <div class="main-thumb-hover"><a href="{{ asset('assets/img/single-product-thumb.jpg') }}" class="image-popup"> <i class="icofont icofont-search-alt-1"></i></a></div>
                    </div>
                </div>
                <div class="col-md-6 ">
                    <div class="product-details-single">
                        <h4>Al Quran Book</h4>
                        <div class="review">
                            <i class="icofont icofont-star"></i>
                            <i class="icofont icofont-star"></i>
                            <i class="icofont icofont-star"></i>
                            <i class="icofont icofont-star  "></i>
                            <i class="icofont icofont-star  "></i>
                        </div>
                        <div class="price">
                            <p>$80.00 <del>$160.00</del></p>
                        </div>
                        <div class="product-specification">
                            <p>sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <ul>
                                <li><i class="icofont icofont-ui-check"></i> Satisfaction 100% Guaranteed</li>
                                <li><i class="icofont icofont-ui-check"></i> Free shipping on orders over $99</li>
                                <li><i class="icofont icofont-ui-check"></i> 14 day easy Return</li>
                            </ul>
                        </div>
                        <div class="product-buy">
                            <input type="number" value="1">
                            <input type="submit" value="ADD TO CART">
                            <i class="icofont icofont-ui-love"></i>
                        </div>
                        <div class="product-details-bottom">
                            <p>SKU: <span>00012</span> </p><span>|</span>
                            <p>Categories: <a href="#">Islamicbook</a> </p><span>|</span>
                            <p>Tags: <a href="#">Book</a></p>
                            <div class="product-share-links">
                                Share Link:
                                <a href="#"><i class="icofont icofont-social-facebook"></i></a>
                                <a href="#"><i class="icofont icofont-social-twitter"></i></a>
                                <a href="#"><i class="icofont icofont-social-google-plus"></i></a>
                                <a href="#"><i class="icofont icofont-rss-feed"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="product-details-tabs">
                        <ul class="nav nav-tabs ">
                            <li class="active"><a href="#description" data-toggle="tab">Description</a></li>
                            <li><a href="#Additional-info" data-toggle="tab">Additional info</a></li>
                            <li><a href="#review" data-toggle="tab">Reviews(3)</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="description">
                                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                            </div>
                            <div class="tab-pane fade" id="Additional-info">
                                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                            </div>
                            <div class="tab-pane fade clearfix" id="review">
                                <div class="total-review">
                                    <h4>3 Reviews</h4>
                                    <div class="single-review-box clearfix">
                                        <div class="reviewer-image">
                                            <img src="{{ asset('assets/img/reviewer.jpg') }}" alt="reviewer image">
                                        </div>
                                        <div class="review-text clearfix">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris pariatur. </p>
                                            <div class="review-meta">
                                                <p>Jhon Doe-</p>
                                                <div class="review">
                                                    <i class="icofont icofont-star"></i>
                                                    <i class="icofont icofont-star"></i>
                                                    <i class="icofont icofont-star"></i>
                                                    <i class="icofont icofont-star  "></i>
                                                    <i class="icofont icofont-star  "></i>
                                                </div>
                                                <p class="review-date"> October 30, 2017 </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-review-box clearfix">
                                        <div class="reviewer-image">
                                            <img src="{{ asset('assets/img/reviewer.jpg') }}" alt="reviewer image">
                                        </div>
                                        <div class="review-text clearfix">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris pariatur. </p>
                                            <div class="review-meta">
                                                <p>Jhon Doe-</p>
                                                <div class="review">
                                                    <i class="icofont icofont-star"></i>
                                                    <i class="icofont icofont-star"></i>
                                                    <i class="icofont icofont-star"></i>
                                                    <i class="icofont icofont-star  "></i>
                                                    <i class="icofont icofont-star  "></i>
                                                </div>
                                                <p class="review-date"> October 30, 2017 </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-review-box clearfix">
                                        <div class="reviewer-image">
                                            <img src="{{ asset('assets/img/reviewer.jpg') }}" alt="reviewer image">
                                        </div>
                                        <div class="review-text clearfix">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris pariatur. </p>
                                            <div class="review-meta">
                                                <p>Jhon Doe-</p>
                                                <div class="review">
                                                    <i class="icofont icofont-star"></i>
                                                    <i class="icofont icofont-star"></i>
                                                    <i class="icofont icofont-star"></i>
                                                    <i class="icofont icofont-star  "></i>
                                                    <i class="icofont icofont-star  "></i>
                                                </div>
                                                <p class="review-date"> October 30, 2017 </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="review-form">
                                    <h4>Add Review</h4>
                                    <div class="your-rating">
                                        <h6>Your Rating</h6>
                                        <div class="review">
                                            <i class="icofont icofont-star"></i> <span>|</span>
                                            <i class="icofont icofont-star"></i>
                                            <i class="icofont icofont-star"></i><span>|</span>
                                            <i class="icofont icofont-star  "></i>
                                            <i class="icofont icofont-star  "></i>
                                            <i class="icofont icofont-star  "></i><span>|</span>
                                            <i class="icofont icofont-star  "></i>
                                            <i class="icofont icofont-star  "></i>
                                            <i class="icofont icofont-star  "></i>
                                            <i class="icofont icofont-star  "></i><span>|</span>
                                            <i class="icofont icofont-star  "></i>
                                            <i class="icofont icofont-star  "></i>
                                            <i class="icofont icofont-star  "></i>
                                            <i class="icofont icofont-star  "></i>
                                            <i class="icofont icofont-star  "></i>
                                        </div>
                                    </div>
                                    <div class="review-submit-form">
                                        <form action="shop-details.html">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input type="text" name="name" id="name" placeholder="Name">
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="email" name="email" id="email" placeholder="Email">
                                                </div>
                                                <div class="col-md-12">
                                                    <textarea name="message" id="message" cols="30" rows="10" placeholder="Message"></textarea>
                                                    <input type="submit" value="Send Message">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--our product start -->
    <section class="our-product-section">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h4>Related Products</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="product-carousel">
                        <div class="single-product-box">
                            <div class="product-thumb">
                                <img src="{{ asset('assets/img/product-1.jpg') }}" alt="product image">
                                <div class="product-hover">
                                    <div class="product-table">
                                        <div class="product-table-cell">
                                            <a href="#"><i class="icofont icofont-shopping-cart"></i></a>
                                            <a href="#"><i class="icofont icofont-eye"></i></a>
                                            <a href="#"><i class="icofont icofont-ui-love"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-details text-center">
                                <h4>Al Quran Pocket</h4>
                                <span class="size">Book Printing</span>
                                <span class="price">$5.00</span>
                                <div class="product-rating">
                                    <i class="icofont icofont-star"></i>
                                    <i class="icofont icofont-star"></i>
                                    <i class="icofont icofont-star"></i>
                                    <i class="icofont icofont-star"></i>
                                    <i class="icofont icofont-star"></i>
                                    <span>(12)</span>
                                </div>
                            </div>
                        </div>
                        <div class="single-product-box">
                            <div class="product-thumb">
                                <img src="{{ asset('assets/img/product-1.jpg') }}" alt="product image">
                                <div class="product-hover">
                                    <div class="product-table">
                                        <div class="product-table-cell">
                                            <a href="#"><i class="icofont icofont-shopping-cart"></i></a>
                                            <a href="#"><i class="icofont icofont-eye"></i></a>
                                            <a href="#"><i class="icofont icofont-ui-love"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-details text-center">
                                <h4>Al Quran Pocket</h4>
                                <span class="size">Book Printing</span>
                                <span class="price">$5.00</span>
                                <div class="product-rating">
                                    <i class="icofont icofont-star"></i>
                                    <i class="icofont icofont-star"></i>
                                    <i class="icofont icofont-star"></i>
                                    <i class="icofont icofont-star"></i>
                                    <i class="icofont icofont-star"></i>
                                    <span>(12)</span>
                                </div>
                            </div>
                        </div>
                        <div class="single-product-box">
                            <div class="product-thumb">
                                <img src="{{ asset('assets/img/product-2.jpg') }}" alt="product image">
                                <div class="product-hover">
                                    <div class="product-table">
                                        <div class="product-table-cell">
                                            <a href="#"><i class="icofont icofont-shopping-cart"></i></a>
                                            <a href="#"><i class="icofont icofont-eye"></i></a>
                                            <a href="#"><i class="icofont icofont-ui-love"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-details text-center">
                                <h4>Al Quran Pocket</h4>
                                <span class="size">Book Printing</span>
                                <span class="price">$5.00</span>
                                <div class="product-rating">
                                    <i class="icofont icofont-star"></i>
                                    <i class="icofont icofont-star"></i>
                                    <i class="icofont icofont-star"></i>
                                    <i class="icofont icofont-star"></i>
                                    <i class="icofont icofont-star"></i>
                                    <span>(12)</span>
                                </div>
                            </div>
                        </div>
                        <div class="single-product-box">
                            <div class="product-thumb">
                                <img src="{{ asset('assets/img/product-3.jpg') }}" alt="product image">
                                <div class="product-hover">
                                    <div class="product-table">
                                        <div class="product-table-cell">
                                            <a href="#"><i class="icofont icofont-shopping-cart"></i></a>
                                            <a href="#"><i class="icofont icofont-eye"></i></a>
                                            <a href="#"><i class="icofont icofont-ui-love"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-details text-center">
                                <h4>Al Quran Pocket</h4>
                                <span class="size">Book Printing</span>
                                <span class="price">$5.00</span>
                                <div class="product-rating">
                                    <i class="icofont icofont-star"></i>
                                    <i class="icofont icofont-star"></i>
                                    <i class="icofont icofont-star"></i>
                                    <i class="icofont icofont-star"></i>
                                    <i class="icofont icofont-star"></i>
                                    <span>(12)</span>
                                </div>
                            </div>
                        </div>
                        <div class="single-product-box">
                            <div class="product-thumb">
                                <img src="{{ asset('assets/img/product-4.jpg') }}" alt="product image">
                                <div class="product-hover">
                                    <div class="product-table">
                                        <div class="product-table-cell">
                                            <a href="#"><i class="icofont icofont-shopping-cart"></i></a>
                                            <a href="#"><i class="icofont icofont-eye"></i></a>
                                            <a href="#"><i class="icofont icofont-ui-love"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-details text-center">
                                <h4>Al Quran Pocket</h4>
                                <span class="size">Book Printing</span>
                                <span class="price">$5.00</span>
                                <div class="product-rating">
                                    <i class="icofont icofont-star"></i>
                                    <i class="icofont icofont-star"></i>
                                    <i class="icofont icofont-star"></i>
                                    <i class="icofont icofont-star"></i>
                                    <i class="icofont icofont-star"></i>
                                    <span>(12)</span>
                                </div>
                            </div>
                        </div>
                        <div class="single-product-box">
                            <div class="product-thumb">
                                <img src="{{ asset('assets/img/product-1.jpg') }}" alt="product image">
                                <div class="product-hover">
                                    <div class="product-table">
                                        <div class="product-table-cell">
                                            <a href="#"><i class="icofont icofont-shopping-cart"></i></a>
                                            <a href="#"><i class="icofont icofont-eye"></i></a>
                                            <a href="#"><i class="icofont icofont-ui-love"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-details text-center">
                                <h4>Al Quran Pocket</h4>
                                <span class="size">Book Printing</span>
                                <span class="price">$5.00</span>
                                <div class="product-rating">
                                    <i class="icofont icofont-star"></i>
                                    <i class="icofont icofont-star"></i>
                                    <i class="icofont icofont-star"></i>
                                    <i class="icofont icofont-star"></i>
                                    <i class="icofont icofont-star"></i>
                                    <span>(12)</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!--our product end -->
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
