@extends('layouts.app')

@section('content')
            <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
                <div class="container d-flex align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Articles</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $article->title }}</li>
                    </ol>

                    <nav class="product-pager ml-auto" aria-label="Product">
                        <a class="product-pager-link product-pager-prev" href="#" aria-label="Previous" tabindex="-1">
                            <i class="icon-angle-left"></i>
                            <span>Prev</span>
                        </a>

                        <a class="product-pager-link product-pager-next" href="#" aria-label="Next" tabindex="-1">
                            <span>Next</span>
                            <i class="icon-angle-right"></i>
                        </a>
                    </nav><!-- End .pager-nav -->
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
                <div class="container">
                    <div class="product-details-top">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="product-gallery product-gallery-vertical">
                                    <div class="row">
                                        <figure class="product-main-image">
                                            <img id="product-zoom" src="{{ asset('images/products/single/1.jpg') }}" data-zoom-image="{{ asset('images/products/single/1-big.jpg') }}" alt="product image">

                                            <a href="#" id="btn-product-gallery" class="btn-product-gallery">
                                                <i class="icon-arrows"></i>
                                            </a>
                                        </figure>

                                        <div id="product-zoom-gallery" class="product-image-gallery">
                                            <a class="product-gallery-item active" href="#" data-image="{{ asset('images/products/single/1.jpg') }}" data-zoom-image="{{ asset('images/products/single/1-big.jpg') }}">
                                                <img src="{{ asset('images/products/single/1-small.jpg') }}" alt="product side">
                                            </a>

                                            <a class="product-gallery-item" href="#" data-image="{{ asset('images/products/single/2.jpg') }}" data-zoom-image="{{ asset('images/products/single/2-big.jpg') }}">
                                                <img src="{{ asset('images/products/single/2-small.jpg') }}" alt="product cross">
                                            </a>

                                            <a class="product-gallery-item" href="#" data-image="{{ asset('images/products/single/3.jpg') }}" data-zoom-image="{{ asset('images/products/single/3-big.jpg') }}">
                                                <img src="{{ asset('images/products/single/3-small.jpg') }}" alt="product with model">
                                            </a>

                                            <a class="product-gallery-item" href="#" data-image="{{ asset('images/products/single/4.jpg') }}" data-zoom-image="{{ asset('images/products/single/4-big.jpg') }}">
                                                <img src="{{ asset('images/products/single/4-small.jpg') }}" alt="product back">
                                            </a>
                                        </div><!-- End .product-image-gallery -->
                                    </div>
                                </div><!-- End .product-gallery -->
                            </div>

                            <div class="col-md-6">
                                <div class="product-details">
                                    <h1 class="product-title">{{ $article->title }}</h1><!-- End .product-title -->

                                    <div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->
                                        </div><!-- End .ratings -->
                                        <a class="ratings-text" href="#product-review-link" id="review-link">( 2 Comments )</a>
                                    </div><!-- End .rating-container -->

                                    <div class="product-content">
                                        <p> {{ $article->description }} </p>
                                    </div><!-- End .product-content -->

                                    <div class="details-filter-row details-row-size">
                                        <label>Color:</label>

                                        <div class="product-nav product-nav-thumbs">
                                            <a href="#" class="active">
                                                <img src="{{ asset('images/products/single/1-thumb.jpg') }}" alt="product desc">
                                            </a>
                                            <a href="#">
                                                <img src="{{ asset('images/products/single/2-thumb.jpg') }}" alt="product desc">
                                            </a>
                                        </div><!-- End .product-nav -->
                                    </div><!-- End .details-filter-row -->

                                    <div class="product-details-footer">
                                        <div class="product-cat">
                                            <span>Category:</span>
                                            <a href="#">{{ $product->category->name }}</a>
                                        </div>

                                        <div class="social-icons social-icons-sm">
                                            <span class="social-label">Share:</span>
                                            <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                            <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                            <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                                            <a href="#" class="social-icon" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="product-details-tab">
                        <ul class="nav nav-pills justify-content-center" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="product-desc-link" data-toggle="tab" href="#product-desc-tab" role="tab" aria-controls="product-desc-tab" aria-selected="true">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="product-info-link" data-toggle="tab" href="#product-info-tab" role="tab" aria-controls="product-info-tab" aria-selected="false">Additional information</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="product-shipping-link" data-toggle="tab" href="#product-shipping-tab" role="tab" aria-controls="product-shipping-tab" aria-selected="false">Shipping & Returns</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="product-review-link" data-toggle="tab" href="#product-review-tab" role="tab" aria-controls="product-review-tab" aria-selected="false">Reviews ( {{ $reviews->count() }} )</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel" aria-labelledby="product-desc-link">
                                <div class="product-desc-content">
                                    <h3>Product Information</h3>
                                    
                                    <p> {{ $article->description }} </p>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="product-info-tab" role="tabpanel" aria-labelledby="product-info-link">
                                <div class="product-desc-content">
                                    <h3>Information</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. </p>

                                    <h3>Fabric & care</h3>
                                    <ul>
                                        <li>Faux suede fabric</li>
                                        <li>Gold tone metal hoop handles.</li>
                                        <li>RI branding</li>
                                        <li>Snake print trim interior </li>
                                        <li>Adjustable cross body strap</li>
                                        <li> Height: 31cm; Width: 32cm; Depth: 12cm; Handle Drop: 61cm</li>
                                    </ul>

                                    <h3>Size</h3>
                                    <p>one size</p>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="product-shipping-tab" role="tabpanel" aria-labelledby="product-shipping-link">
                                <div class="product-desc-content">
                                    <h3>Delivery & returns</h3>
                                    <p>We deliver to over 100 countries around the world. For full details of the delivery options we offer, please view our <a href="#">Delivery information</a><br>
                                    We hope you’ll love every purchase, but if you ever need to return an item you can do so within a month of receipt. For full details of how to make a return, please view our <a href="#">Returns information</a></p>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="product-review-tab" role="tabpanel" aria-labelledby="product-review-link">
                                <div class="reviews">
                                    <h3>Reviews ( {{ $comments->count() }} )</h3>
                                    @foreach($comments as $comment) 
                                        <div class="review">
                                            <div class="row no-gutters">
                                                <div class="col-auto">
                                                    <h4><a href="#">{{ $comment->user_id }}</a></h4>
                                                    <div class="ratings-container">
                                                        <div class="ratings">
                                                            <div class="ratings-val" style="width: 100%;"></div>
                                                        </div>
                                                    </div>
                                                    <span class="review-date">{{ $comment->created_at }}</span>
                                                </div>

                                                <div class="col">
                                                    <h4>{{ $comment->title }}</h4>

                                                    <div class="review-content">
                                                        <p> {{ $comment->remarks }} </p>
                                                    </div>

                                                    <div class="review-action">
                                                        <a href="#"><i class="icon-thumbs-up"></i>Helpful (0)</a>
                                                        <a href="#"><i class="icon-thumbs-down"></i>Unhelpful (0)</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection