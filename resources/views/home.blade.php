@extends('layouts.app')

@section('content')
<div class="mb-lg-2"></div>
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-9 col-xxl-8 offset-lg-3 offset-xxl-2">
            <div class="intro-slider-container slider-container-ratio mb-2">
                <div class="intro-slider owl-carousel owl-simple owl-nav-inside" data-toggle="owl" data-owl-options='{
                        "nav": false, 
                        "dots": true
                    }'>
                    <div class="intro-slide">
                        <figure class="slide-image">
                            <picture>
                                <source media="(max-width: 480px)" srcset="assets/images/demos/demo-14/slider/slide-1-480w.jpg">
                                <img src="{{ asset('images/demos/demo-14/slider/slide-1.jpg') }}" alt="Image Desc">
                            </picture>
                        </figure>

                        <div class="intro-content">
                            <h3 class="intro-subtitle">New Arrivals</h3>
                            <h1 class="intro-title text-white">
                                The New Way <br>To Buy Furniture
                            </h1>

                            <div class="intro-text text-white">
                                Spring Collections 2019
                            </div>

                            <a href="category.html" class="btn btn-primary">
                                <span>Discover Now</span>
                                <i class="icon-long-arrow-right"></i>
                            </a>
                        </div>
                    </div>

                    <div class="intro-slide">
                        <figure class="slide-image">
                            <picture>
                                <source media="(max-width: 480px)" srcset="{{ asset('images/demos/demo-14/slider/slide-2-480w.jpg') }}">
                                <img src="{{ asset('images/demos/demo-14/slider/slide-2.jpg') }}" alt="Image Desc">
                            </picture>
                        </figure>

                        <div class="intro-content">
                            <h3 class="intro-subtitle">Hottest Deals</h3>
                            <h1 class="intro-title">
                                <span>Wherever You Go</span> <br>DJI Mavic 2 Pro
                            </h1>

                            <div class="intro-price">
                                <sup>from</sup>
                                <span>
                                    $1,948<sup>.99</sup>
                                </span>
                            </div>

                            <a href="category.html" class="btn btn-primary">
                                <span>Discover Here</span>
                                <i class="icon-long-arrow-right"></i>
                            </a>
                        </div>
                    </div>

                    <div class="intro-slide">
                        <figure class="slide-image">
                            <picture>
                                <source media="(max-width: 480px)" srcset="{{ asset('images/demos/demo-14/slider/slide-3-480w.jpg') }}">
                                <img src="{{ asset('images/demos/demo-14/slider/slide-3.jpg') }}" alt="Image Desc">
                            </picture>
                        </figure>

                        <div class="intro-content">
                            <h3 class="intro-subtitle">Limited Quantities</h3>
                            <h1 class="intro-title">
                                Refresh Your <br>Wardrobe
                            </h1>

                            <div class="intro-text">
                                Summer Collection 2019
                            </div>

                            <a href="category.html" class="btn btn-primary">
                                <span>Discover Now</span>
                                <i class="icon-long-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                
                <span class="slider-loader"></span>
            </div>
        </div>
        
        <div class="col-xl-3 col-xxl-2 d-none d-xxl-block">
            <div class="banner banner-overlay  banner-content-stretch ">
                <a href="#">
                    <img src="{{ asset('images/demos/demo-14/banners/banner-1.png') }}" alt="Banner img desc">
                </a>
                <div class="banner-content text-right">
                    <div class="price text-center">
                        <sup class="text-white">from</sup>
                        <span class="text-white">
                            <strong>$199</strong><sup class="text-white">,99</sup>
                        </span>
                    </div>
                    <a href="#" class="banner-link">Discover Now <i class="icon-long-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-9 col-xxl-10">
            <div class="row">
                <div class="col-lg-12 col-xxl-4-5col">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="banner banner-overlay">
                                <a href="#">
                                    <img src="{{ asset('images/demos/demo-14/banners/banner-2.jpg') }}" alt="Banner img desc">
                                </a>

                                <div class="banner-content">
                                    <h4 class="banner-subtitle text-white d-none d-sm-block"><a href="#">Hottest Deals</a></h4>
                                    <h3 class="banner-title text-white"><a href="#">Detox And Beautify <br>For Spring <br><span>Up To  20% Off</span></a></h3>
                                    <a href="#" class="banner-link">Shop Now <i class="icon-long-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="banner banner-overlay">
                                <a href="#">
                                    <img src="{{ asset('images/demos/demo-14/banners/banner-3.png') }}" alt="Banner img desc">
                                </a>

                                <div class="banner-content">
                                    <h4 class="banner-subtitle text-white d-none d-sm-block"><a href="#">Deal of the Day</a></h4>
                                    <h3 class="banner-title text-white"><a href="#">Headphones <br><span>Up To 30% Off</span></a></h3>
                                    <a href="#" class="banner-link">Shop Now <i class="icon-long-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-xxl-5col d-none d-xxl-block">
                    <div class="banner banner-overlay">
                        <a href="#">
                            <img src="{{ asset('images/demos/demo-14/banners/banner-4.jpg') }}" alt="Banner img desc">
                        </a>

                        <div class="banner-content">
                            <h4 class="banner-subtitle text-white"><a href="#">Clearance</a></h4>
                            <h3 class="banner-title text-white"><a href="#">Seating and Tables Clearance</a></h3>
                            <a href="#" class="banner-link">Shop Now <i class="icon-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-3"></div>

            <div class="owl-carousel owl-simple brands-carousel" data-toggle="owl" 
                data-owl-options='{
                    "nav": false, 
                    "dots": false,
                    "margin": 20,
                    "loop": false,
                    "responsive": {
                        "0": {
                            "items":2
                        },
                        "420": {
                            "items":3
                        },
                        "600": {
                            "items":4
                        },
                        "900": {
                            "items":5
                        },
                        "1600": {
                            "items":6,
                            "nav": true
                        }
                    }
                }'>
                <a href="#" class="brand">
                    <img src="{{ asset('images/brands/1.png') }}" alt="Brand Name">
                </a>

                <a href="#" class="brand">
                    <img src="{{ asset('images/brands/2.png') }}" alt="Brand Name">
                </a>

                <a href="#" class="brand">
                    <img src="{{ asset('images/brands/3.png') }}" alt="Brand Name">
                </a>

                <a href="#" class="brand">
                    <img src="{{ asset('images/brands/4.png') }}" alt="Brand Name">
                </a>

                <a href="#" class="brand">
                    <img src="{{ asset('images/brands/5.png') }}" alt="Brand Name">
                </a>

                <a href="#" class="brand">
                    <img src="{{ asset('images/brands/6.png') }}" alt="Brand Name">
                </a>

                <a href="#" class="brand">
                    <img src="{{ asset('images/brands/7.png') }}" alt="Brand Name">
                </a>
            </div>

            <div class="mb-5"></div>

            <div class="mb-3"></div><!-- End .mb-3 -->

            <div class="icon-boxes-container">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6 col-lg-3">
                            <div class="icon-box icon-box-side">
                                <span class="icon-box-icon text-dark">
                                    <i class="icon-rocket"></i>
                                </span>
                                <div class="icon-box-content">
                                    <h3 class="icon-box-title">Free Shipping</h3>
                                    <p>Orders $50 or more</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-3">
                            <div class="icon-box icon-box-side">
                                <span class="icon-box-icon text-dark">
                                    <i class="icon-rotate-left"></i>
                                </span>

                                <div class="icon-box-content">
                                    <h3 class="icon-box-title">Free Returns</h3><!-- End .icon-box-title -->
                                    <p>Within 30 days</p>
                                </div><!-- End .icon-box-content -->
                            </div><!-- End .icon-box -->
                        </div><!-- End .col-sm-6 col-lg-3 -->

                        <div class="col-sm-6 col-lg-3">
                            <div class="icon-box icon-box-side">
                                <span class="icon-box-icon text-dark">
                                    <i class="icon-info-circle"></i>
                                </span>

                                <div class="icon-box-content">
                                    <h3 class="icon-box-title">Get 20% Off 1 Item</h3><!-- End .icon-box-title -->
                                    <p>When you sign up</p>
                                </div><!-- End .icon-box-content -->
                            </div><!-- End .icon-box -->
                        </div><!-- End .col-sm-6 col-lg-3 -->

                        <div class="col-sm-6 col-lg-3">
                            <div class="icon-box icon-box-side">
                                <span class="icon-box-icon text-dark">
                                    <i class="icon-life-ring"></i>
                                </span>

                                <div class="icon-box-content">
                                    <h3 class="icon-box-title">We Support</h3><!-- End .icon-box-title -->
                                    <p>24/7 amazing services</p>
                                </div><!-- End .icon-box-content -->
                            </div><!-- End .icon-box -->
                        </div><!-- End .col-sm-6 col-lg-3 -->
                    </div><!-- End .row -->
                </div><!-- End .container-fluid -->
            </div>
            <div class="mb-5"></div>
        </div>
    </div>
</div>
@endsection

