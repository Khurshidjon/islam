@extends('layouts.main')
@section('content')

    <div class="overlay-bg"></div>

    <!--breadcum start -->
    <section class="breadcumb-section breadcumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Shop</h1>
                    <p><a href="index.html">Home</a>/Shop</p>
                </div>
            </div>
        </div>
    </section>
    <!--breadcum end-->

    <!--sohp page start-->
    <div class="shop-page">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="sidebar">
                        <div class="category-widget">
                            <div class="widget-title">
                                <h3>Categories</h3>
                            </div>
                            <div class="widget-body">
                                <ul>
                                    <li><a href="#">Book <span>(2)</span></a></li>
                                    <li><a href="#">DVD <span>(3)</span></a></li>
                                    <li><a href="#">Novel <span>(7)</span></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="range-widget">
                            <div class="widget-title">
                                <h3>Shop By</h3>
                            </div>
                            <div class="widget-body">
                                <form action="shop.html">
                                    <div id="range"></div>
                                    <p>Price : $<span id="min">100</span> - $<span id="max">400</span></p>
                                    <input type="submit" value="Filter">
                                </form>
                            </div>
                        </div>
                        <div class="advertise-widget">
                            <img src="{{ asset('assets/img/advert-1.jpg') }}" alt="advertise image">
                        </div>
                        <div class="latest-product-widget">
                            <div class="widget-title">
                                <h3>Latest Products</h3>
                            </div>
                            <div class="widget-body">
                                <div class="single-latest-product-wrapper">
                                    <div class="single-latest-product">
                                        <div class="latest-post-thumb">
                                            <img src="{{ asset('assets/img/latest-product-thumb.jpg') }}" alt="">
                                        </div>
                                        <div class="latest-post-content">
                                            <a href="#">
                                                <h4>Al Quran</h4>
                                            </a>
                                            <p> $90.00 <del>$80.00</del></p>
                                        </div>
                                    </div>
                                    <div class="single-latest-product">
                                        <div class="latest-post-thumb">
                                            <img src="{{ asset('assets/img/latest-product-thumb.jpg') }}" alt="">
                                        </div>
                                        <div class="latest-post-content">
                                            <a href="#">
                                                <h4>Al Quran</h4>
                                            </a>
                                            <p> $90.00 <del>$80.00</del></p>
                                        </div>
                                    </div>
                                    <div class="single-latest-product">
                                        <div class="latest-post-thumb">
                                            <img src="{{ asset('assets/img/latest-product-thumb.jpg') }}" alt="">
                                        </div>
                                        <div class="latest-post-content">
                                            <a href="#">
                                                <h4>Al Quran</h4>
                                            </a>
                                            <p> $90.00 <del>$80.00</del></p>
                                        </div>
                                    </div>
                                    <div class="single-latest-product">
                                        <div class="latest-post-thumb">
                                            <img src="{{ asset('assets/img/latest-product-thumb.jpg') }}" alt="">
                                        </div>
                                        <div class="latest-post-content">
                                            <a href="#">
                                                <h4>Al Quran</h4>
                                            </a>
                                            <p> $90.00 <del>$80.00</del></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="sorting-area">
                                <div class="row">
                                    <div class="col-md-4 col-sm-4">
                                        <select name="sorting" id="sorting">
                                            <option value="0">Defautl Sorting</option>
                                            <option value="1">A-Z Sorting</option>
                                            <option value="2">Z-A Sorting</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <select name="sorting_two" id="sorting_two">
                                            <option value="0">1-12 Products</option>
                                            <option value="1">1-24 Sorting</option>
                                            <option value="2">1-36 Sorting</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <p class="show-text">Showing 1–20 of 60 results</p>
                                    </div>
                                </div>
                            </div>
                            <div class="shop-view-page">
                                <div class="row">
                                    <div class="col-md-4 col-sm-6">
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
                                    <div class="col-md-4 col-sm-6">
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
                                    <div class="col-md-4 col-sm-6">
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
                                    <div class="col-md-4 col-sm-6">
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
                                    <div class="col-md-4 col-sm-6">
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
                                    <div class="col-md-4 col-sm-6">
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
                                    <div class="col-md-4 col-sm-6">
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
                                    <div class="col-md-4 col-sm-6">
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
                                    <div class="col-md-4 col-sm-6">
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
                                    <div class="col-md-4 col-sm-6">
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
                                    <div class="col-md-4 col-sm-6">
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
                                    <div class="col-md-4 col-sm-6">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--sohp page end-->



    <!--our product start -->
    <section class="our-product-section shop-page">
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
    </section>
    <!--our product end -->
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
