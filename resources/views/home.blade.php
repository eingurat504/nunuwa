@extends('layouts.app')

@section('content')
<div class="intro-slider-container">
    <div class="intro-slider owl-carousel owl-simple owl-nav-inside" data-toggle="owl" data-owl-options='{
            "nav": false,
            "responsive": {
                "992": {
                    "nav": true
                }
            }
        }'>
        @foreach($products as $product) 
            <div class="intro-slide" style="background-image: url('{{ asset('images/demos/demo-13/slider/slide-1.png') }}')">
                <div class="container intro-content">
                    <div class="row">
                        <div class="col-auto offset-lg-3 intro-col">
                            <h3 class="intro-subtitle">Trade-In Offer</h3>
                            <h1 class="intro-title">{{ $product->name }} <br>Latest Model
                                <span>
                                    <sup class="font-weight-light">from</sup>
                                    <span class="text-primary">{{ $product->price }}<sup>,99</sup></span>
                                </span>
                            </h1>

                            <form action="{{ route('cart.store') }}" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{ $product->id }}">
                                <input type="hidden" name="name" value="{{ $product->name }}">
                                <input type="hidden" name="price" value="{{ $product->price }}">
                                <div class="product-action">
                                    <button type="submit" class="btn btn-outline-primary-2">Shop Now <i class="icon-long-arrow-right"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <span class="slider-loader"></span>
</div>

<div class="mb-4"></div>

<div class="container">
    <h2 class="title text-center mb-2">Explore Popular Categories</h2>

    <div class="cat-blocks-container">
        <div class="row">
            @foreach($categories as $category) 
                <div class="col-6 col-sm-4 col-lg-2">
                    <a href="category.html" class="cat-block">
                        <figure>
                            <span>
                                <img src="{{ asset('images/demos/demo-13/cats/1.jpg') }}" alt="Category image">
                            </span>
                        </figure>

                        <h3 class="cat-block-title">{{ $category->name }}</h3>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>

<div class="mb-2"></div>

<div class="container">
    <div class="row">
        @foreach($products as $product) 
        <div class="col-sm-6 col-lg-3">
            <div class="banner banner-overlay">
                <a href="#">
                    <img src="{{ asset('images/demos/demo-13/banners/banner-1.jpg') }}" alt="Banner">
                </a>

                <div class="banner-content">
                    <h4 class="banner-subtitle text-white"><a href="#">Weekend Sale</a></h4><!-- End .banner-subtitle -->
                    <h3 class="banner-title text-white"><a href="#">Lighting <br>& Accessories <br><span>25% off</span></a></h3>
                    <form action="{{ route('cart.store') }}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $product->id }}">
                        <input type="hidden" name="name" value="{{ $product->name }}">
                        <input type="hidden" name="price" value="{{ $product->price }}">
                        <div class="product-action">
                            <button type="submit" class="banner-link">Shop Now <i class="icon-long-arrow-right"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        @endforeach
        <div class="col-lg-6">
            <div class="banner banner-overlay">
                <a href="#">
                    <img src="{{ asset('images/demos/demo-13/banners/banner-2.jpg') }}" alt="Banner">
                </a>

                <div class="banner-content">
                    <h4 class="banner-subtitle text-white d-none d-sm-block"><a href="#">Amazing Value</a></h4><!-- End .banner-subtitle -->
                    <h3 class="banner-title text-white"><a href="#">Clothes Trending <br>Spring Collection 2019 <br><span>from $12,99</span></a></h3>
                    <a href="#" class="banner-link">Discover Now <i class="icon-long-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="mb-3"></div>
            
<div class="bg-light pt-3 pb-5">
    <div class="container">
        <div class="heading heading-flex heading-border mb-3">
            <div class="heading-left">
                <h2 class="title">Hot Deals Products</h2>
            </div>

            <div class="heading-right">
                <ul class="nav nav-pills nav-border-anim justify-content-center" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="hot-all-link" data-toggle="tab" href="#hot-all-tab" role="tab" aria-controls="hot-all-tab" aria-selected="true">All</a>
                    </li>
                    @foreach($categories as $category) 
                    <li class="nav-item">
                        <a class="nav-link" id="hot-elec-link" data-toggle="tab" href="#hot-elec-tab" role="tab" aria-controls="hot-elec-tab" aria-selected="false">{{ $category->name }}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="tab-content tab-content-carousel">
            <div class="tab-pane p-0 fade show active" id="hot-all-tab" role="tabpanel" aria-labelledby="hot-all-link">
                <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                    data-owl-options='{
                        "nav": false, 
                        "dots": true,
                        "margin": 20,
                        "loop": false,
                        "responsive": {
                            "0": {
                                "items":2
                            },
                            "480": {
                                "items":2
                            },
                            "768": {
                                "items":3
                            },
                            "992": {
                                "items":4
                            },
                            "1280": {
                                "items":5,
                                "nav": true
                            }
                        }
                    }'>
                    
                    @foreach($products as $product) 
                    <div class="product">
                        <figure class="product-media">
                            <span class="product-label label-sale">Sale</span>
                            <a href="{{ route('products.show',$product->id) }}">
                                <img src="{{ asset('images/demos/demo-13/products/product-1.jpg') }}" alt="Product image" class="product-image">
                            </a>

                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                                <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                            </div>

                            <form action="{{ route('cart.store') }}" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{ $product->id }}">
                                <input type="hidden" name="name" value="{{ $product->name }}">
                                <input type="hidden" name="price" value="{{ $product->price }}">
                                <div class="product-action">
                                    <button type="submit" class="btn-product btn-cart">Add To Cart</button>
                                </div>
                            </form>
                        </figure>

                        <div class="product-body">
                            <div class="product-cat">
                                <a href="#">{{ $product->category->name }}</a>
                            </div>
                            <h3 class="product-title"><a href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a></h3>
                            <div class="product-price">
                                <span class="new-price">${{ $product->price }}</span>
                                <span class="old-price">Was $290.00</span>
                            </div>
                            <div class="ratings-container">
                                <div class="ratings">
                                    <div class="ratings-val" style="width: 100%;"></div>
                                </div>
                                <span class="ratings-text">( 2 Reviews )</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="tab-pane p-0 fade" id="hot-elec-tab" role="tabpanel" aria-labelledby="hot-elec-link">
                <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                    data-owl-options='{
                        "nav": false, 
                        "dots": true,
                        "margin": 20,
                        "loop": false,
                        "responsive": {
                            "0": {
                                "items":2
                            },
                            "480": {
                                "items":2
                            },
                            "768": {
                                "items":3
                            },
                            "992": {
                                "items":4
                            },
                            "1280": {
                                "items":5,
                                "nav": true
                            }
                        }
                    }'>
                    @foreach($furnitures as $furniture)
                    <div class="product">
                        <figure class="product-media">
                            <span class="product-label label-sale">Sale</span>
                            <a href="{{ route('products.show', $furniture->id) }}">
                                <img src="{{ asset('images/demos/demo-13/products/product-4.jpg') }}" alt="Product image" class="product-image">
                            </a>

                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                                <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                            </div>

                            <form action="{{ route('cart.store') }}" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{ $furniture->id }}">
                                <input type="hidden" name="name" value="{{ $furniture->name }}">
                                <input type="hidden" name="price" value="{{ $furniture->price }}">
                                <div class="product-action">
                                    <button type="submit" class="btn-product btn-cart">add to cart</button>
                                </div>
                            </form>
                        </figure>

                        <div class="product-body">
                            <div class="product-cat">
                                <a href="#">{{ $furniture->category->name }}</a>
                            </div>
                            <h3 class="product-title"><a href="{{ route('products.show',$furniture->id)}}">{{ $furniture->name }}</a></h3>
                            <div class="product-price">
                                <span class="new-price">${{ $furniture->price }}</span>
                                <span class="old-price">Was $310.00</span>
                            </div>
                            <div class="ratings-container">
                                <div class="ratings">
                                    <div class="ratings-val" style="width: 80%;"></div>
                                </div>
                                <span class="ratings-text">( 4 Reviews )</span>
                            </div>

                            <div class="product-nav product-nav-dots">
                                <a href="#" class="active" style="background: #b58555;"><span class="sr-only">Color name</span></a>
                                <a href="#" style="background: #93a6b0;"><span class="sr-only">Color name</span></a>
                            </div><!-- End .product-nav -->
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="tab-pane p-0 fade" id="hot-furn-tab" role="tabpanel" aria-labelledby="hot-furn-link">
                <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                    data-owl-options='{
                        "nav": false, 
                        "dots": true,
                        "margin": 20,
                        "loop": false,
                        "responsive": {
                            "0": {
                                "items":2
                            },
                            "480": {
                                "items":2
                            },
                            "768": {
                                "items":3
                            },
                            "992": {
                                "items":4
                            },
                            "1280": {
                                "items":5,
                                "nav": true
                            }
                        }
                    }'>
                    @foreach($electronics as $electronic) 
                    <div class="product">
                        <figure class="product-media">
                            <span class="product-label label-new">New</span>
                            <a href="{{ route('products.show',$electronic->id)}}">
                                <img src="{{ asset('images/demos/demo-13/products/product-17.jpg') }}" alt="Product image" class="product-image">
                            </a>

                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                                <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                            </div>

                            <form action="{{ route('cart.store') }}" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{ $electronic->id }}">
                                <input type="hidden" name="name" value="{{ $electronic->name }}">
                                <input type="hidden" name="price" value="{{ $electronic->price }}">
                                <div class="product-action">
                                    <button type="submit" class="btn-product btn-cart">add to cart</button>
                                </div>
                            </form>
                        </figure>

                        <div class="product-body">
                            <div class="product-cat">
                                {{ $electronic->category->name }}
                            </div>
                            <h3 class="product-title"><a href="{{ route('products.show', $electronic->id) }}">{{ $electronic->name }}</a></h3>
                            <div class="product-price">
                                ${{ $electronic->price }}
                            </div>
                            <div class="ratings-container">
                                <div class="ratings">
                                    <div class="ratings-val" style="width: 100%;"></div>
                                </div>
                                <span class="ratings-text">( 10 Reviews )</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="tab-pane p-0 fade" id="hot-clot-tab" role="tabpanel" aria-labelledby="hot-clot-link">
                <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                    data-owl-options='{
                        "nav": false, 
                        "dots": true,
                        "margin": 20,
                        "loop": false,
                        "responsive": {
                            "0": {
                                "items":2
                            },
                            "480": {
                                "items":2
                            },
                            "768": {
                                "items":3
                            },
                            "992": {
                                "items":4
                            },
                            "1280": {
                                "items":5,
                                "nav": true
                            }
                        }
                    }'>
                    @foreach($clothings as $clothing) 
                    <div class="product">
                        <figure class="product-media">
                            <span class="product-label label-new">New</span>
                            <a href="{{ route('products.show',$clothing->id)}}">
                                <img src="{{ asset('images/demos/demo-13/products/product-17.jpg') }}" alt="Product image" class="product-image">
                            </a>

                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                                <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                            </div>

                            <form action="{{ route('cart.store') }}" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{ $clothing->id }}">
                                <input type="hidden" name="name" value="{{ $clothing->name }}">
                                <input type="hidden" name="price" value="{{ $clothing->price }}">
                                <div class="product-action">
                                    <button type="submit" class="btn-product btn-cart">add to cart</button>
                                </div>
                            </form>
                        </figure>

                        <div class="product-body">
                            <div class="product-cat">
                                {{ $electronic->category->name }}
                            </div>
                            <h3 class="product-title"><a href="{{ route('products.show', $clothing->id) }}">{{ $clothing->name }}</a></h3>
                            <div class="product-price">
                                ${{ $electronic->price }}
                            </div>
                            <div class="ratings-container">
                                <div class="ratings">
                                    <div class="ratings-val" style="width: 100%;"></div>
                                </div>
                                <span class="ratings-text">( 10 Reviews )</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="tab-pane p-0 fade" id="hot-acc-tab" role="tabpanel" aria-labelledby="hot-acc-link">
                <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                    data-owl-options='{
                        "nav": false, 
                        "dots": true,
                        "margin": 20,
                        "loop": false,
                        "responsive": {
                            "0": {
                                "items":2
                            },
                            "480": {
                                "items":2
                            },
                            "768": {
                                "items":3
                            },
                            "992": {
                                "items":4
                            },
                            "1280": {
                                "items":5,
                                "nav": true
                            }
                        }
                    }'>
                    @foreach($electronics as $electronic) 
                    <div class="product">
                        <figure class="product-media">
                            <span class="product-label label-new">New</span>
                            <a href="{{ route('products.show',$electronic->id)}}">
                                <img src="{{ asset('images/demos/demo-13/products/product-6.jpg') }}" alt="Product image" class="product-image">
                            </a>

                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                                <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                            </div>

                            <form action="{{ route('cart.store') }}" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{ $electronic->id }}">
                                <input type="hidden" name="name" value="{{ $electronic->name }}">
                                <input type="hidden" name="price" value="{{ $electronic->price }}">
                                <div class="product-action">
                                    <button type="submit" class="btn-product btn-cart">add to cart</button>
                                </div>
                            </form>
                        </figure>

                        <div class="product-body">
                            <div class="product-cat">
                                <a href="#">Appliances</a>
                            </div>
                            <h3 class="product-title"><a href="{{ route('products.show',$electronic->id)}}">{{ $electronic->name }}</a></h3>
                            <div class="product-price">
                                $399.00
                            </div>
                            <div class="ratings-container">
                                <div class="ratings">
                                    <div class="ratings-val" style="width: 80%;"></div>
                                </div>
                                <span class="ratings-text">( 12 Reviews )</span>
                            </div>
                        </div>
                    </div>

                    <div class="product">
                        <figure class="product-media">
                            <span class="product-label label-sale">Sale</span>
                            <a href="{{ route('products.show',$electronic->id)}}">
                                <img src="{{ asset('images/demos/demo-13/products/product-1.jpg') }}" alt="Product image" class="product-image">
                            </a>

                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                                <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                            </div>

                            <form action="{{ route('cart.store') }}" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{ $electronic->id }}">
                                <input type="hidden" name="name" value="{{ $electronic->name }}">
                                <input type="hidden" name="price" value="{{ $electronic->price }}">
                                <div class="product-action">
                                    <button type="submit" class="btn-product btn-cart">add to cart</button>
                                </div>
                            </form>
                        </figure>

                        <div class="product-body">
                            <div class="product-cat">
                                <a href="#">Furniture</a>
                            </div>
                            <h3 class="product-title"><a href="{{ route('products.show',$electronic->id)}}">Butler Stool Ladder</a></h3>
                            <div class="product-price">
                                <span class="new-price">$251.99</span>
                                <span class="old-price">Was $290.00</span>
                            </div>
                            <div class="ratings-container">
                                <div class="ratings">
                                    <div class="ratings-val" style="width: 100%;"></div>
                                </div>
                                <span class="ratings-text">( 2 Reviews )</span>
                            </div>
                        </div>
                    </div>

                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div><!-- End .bg-light pt-5 pb-5 -->

<div class="mb-3"></div>

<div class="container electronics">
    <div class="heading heading-flex heading-border mb-3">
        <div class="heading-left">
            <h2 class="title">Electronics</h2>
        </div>

        <div class="heading-right">
            <ul class="nav nav-pills nav-border-anim justify-content-center" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="elec-new-link" data-toggle="tab" href="#elec-new-tab" role="tab" aria-controls="elec-new-tab" aria-selected="true">New</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="elec-featured-link" data-toggle="tab" href="#elec-featured-tab" role="tab" aria-controls="elec-featured-tab" aria-selected="false">Featured</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="elec-best-link" data-toggle="tab" href="#elec-best-tab" role="tab" aria-controls="elec-best-tab" aria-selected="false">Best Seller</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="tab-content tab-content-carousel">
        <div class="tab-pane p-0 fade show active" id="elec-new-tab" role="tabpanel" aria-labelledby="elec-new-link">
            <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                data-owl-options='{
                    "nav": false, 
                    "dots": true,
                    "margin": 20,
                    "loop": false,
                    "responsive": {
                        "0": {
                            "items":2
                        },
                        "480": {
                            "items":2
                        },
                        "768": {
                            "items":3
                        },
                        "992": {
                            "items":4
                        },
                        "1280": {
                            "items":5,
                            "nav": true
                        }
                    }
                }'>
                @foreach($electronics as $electronic) 
                <div class="product">
                    <figure class="product-media">
                        <span class="product-label label-new">New</span>
                        <a href="{{ route('products.show',$electronic->id)}}">
                            <img src="{{ asset('images/demos/demo-13/products/product-17.jpg') }}" alt="Product image" class="product-image">
                        </a>

                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                            <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                            <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                        </div>

                        <form action="{{ route('cart.store') }}" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{ $electronic->id }}">
                            <input type="hidden" name="name" value="{{ $electronic->name }}">
                            <input type="hidden" name="price" value="{{ $electronic->price }}">
                            <div class="product-action">
                                <button type="submit" class="btn-product btn-cart">add to cart</button>
                            </div>
                        </form>
                    </figure>

                    <div class="product-body">
                        <div class="product-cat">
                            {{ $electronic->category->name }}
                        </div>
                        <h3 class="product-title"><a href="{{ route('products.show', $electronic->id) }}">{{ $electronic->name }}</a></h3>
                        <div class="product-price">
                            ${{ $electronic->price }}
                        </div>
                        <div class="ratings-container">
                            <div class="ratings">
                                <div class="ratings-val" style="width: 100%;"></div>
                            </div>
                            <span class="ratings-text">( 10 Reviews )</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="tab-pane p-0 fade" id="elec-featured-tab" role="tabpanel" aria-labelledby="elec-featured-link">
            <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                data-owl-options='{
                    "nav": false, 
                    "dots": true,
                    "margin": 20,
                    "loop": false,
                    "responsive": {
                        "0": {
                            "items":2
                        },
                        "480": {
                            "items":2
                        },
                        "768": {
                            "items":3
                        },
                        "992": {
                            "items":4
                        },
                        "1280": {
                            "items":5,
                            "nav": true
                        }
                    }
                }'>
                @foreach($electronics as $electronic) 
                <div class="product">
                    <figure class="product-media">
                        <span class="product-label label-new">New</span>
                        <a href="{{ route('products.show',$electronic->id)}}">
                            <img src="{{ asset('images/demos/demo-13/products/product-17.jpg') }}" alt="Product image" class="product-image">
                        </a>

                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                            <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                            <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                        </div>

                        <form action="{{ route('cart.store') }}" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{ $electronic->id }}">
                            <input type="hidden" name="name" value="{{ $electronic->name }}">
                            <input type="hidden" name="price" value="{{ $electronic->price }}">
                            <div class="product-action">
                                <button type="submit" class="btn-product btn-cart">add to cart</button>
                            </div>
                        </form>
                    </figure>

                    <div class="product-body">
                        <div class="product-cat">
                            {{ $electronic->category->name }}
                        </div>
                        <h3 class="product-title"><a href="{{ route('products.show', $electronic->id) }}">{{ $electronic->name }}</a></h3>
                        <div class="product-price">
                            ${{ $electronic->price }}
                        </div>
                        <div class="ratings-container">
                            <div class="ratings">
                                <div class="ratings-val" style="width: 100%;"></div>
                            </div>
                            <span class="ratings-text">( 10 Reviews )</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="tab-pane p-0 fade" id="elec-best-tab" role="tabpanel" aria-labelledby="elec-best-link">
            <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                data-owl-options='{
                    "nav": false, 
                    "dots": true,
                    "margin": 20,
                    "loop": false,
                    "responsive": {
                        "0": {
                            "items":2
                        },
                        "480": {
                            "items":2
                        },
                        "768": {
                            "items":3
                        },
                        "992": {
                            "items":4
                        },
                        "1280": {
                            "items":5,
                            "nav": true
                        }
                    }
                }'>
                @foreach($electronics as $electronic) 
                <div class="product">
                    <figure class="product-media">
                        <span class="product-label label-new">New</span>
                        <a href="{{ route('products.show',$electronic->id)}}">
                            <img src="{{ asset('images/demos/demo-13/products/product-17.jpg') }}" alt="Product image" class="product-image">
                        </a>

                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                            <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                            <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                        </div>

                        <form action="{{ route('cart.store') }}" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{ $electronic->id }}">
                            <input type="hidden" name="name" value="{{ $electronic->name }}">
                            <input type="hidden" name="price" value="{{ $electronic->price }}">
                            <div class="product-action">
                                <button type="submit" class="btn-product btn-cart">add to cart</button>
                            </div>
                        </form>
                    </figure>

                    <div class="product-body">
                        <div class="product-cat">
                            {{ $electronic->category->name }}
                        </div>
                        <h3 class="product-title"><a href="{{ route('products.show', $electronic->id) }}">{{ $electronic->name }}</a></h3>
                        <div class="product-price">
                            ${{ $electronic->price }}
                        </div>
                        <div class="ratings-container">
                            <div class="ratings">
                                <div class="ratings-val" style="width: 100%;"></div>
                            </div>
                            <span class="ratings-text">( 10 Reviews )</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<div class="mb-3"></div>

<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <div class="banner banner-overlay banner-overlay-light">
                <a href="#">
                    <img src="{{ asset('images/demos/demo-13/banners/banner-4.jpg') }}" alt="Banner">
                </a>

                <div class="banner-content">
                    <h4 class="banner-subtitle d-none d-sm-block"><a href="#">Spring Sale is Coming</a></h4><!-- End .banner-subtitle -->
                    <h3 class="banner-title"><a href="#">All Smart Watches <br>Discount <br><span class="text-primary">15% off</span></a></h3>
                    <a href="#" class="banner-link banner-link-dark">Discover Now <i class="icon-long-arrow-right"></i></a>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="banner banner-overlay">
                <a href="#">
                    <img src="{{ asset('images/demos/demo-13/banners/banner-5.png') }}" alt="Banner">
                </a>

                <div class="banner-content">
                    <h4 class="banner-subtitle text-white  d-none d-sm-block"><a href="#">Amazing Value</a></h4><!-- End .banner-subtitle -->
                    <h3 class="banner-title text-white"><a href="#">Headphones Trending <br>JBL Harman <br><span>from $59,99</span></a></h3>
                    <a href="#" class="banner-link">Discover Now <i class="icon-long-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="mb-1"></div>
@if(!empty($furnitures))

<div class="container furniture">
    <div class="heading heading-flex heading-border mb-3">
        <div class="heading-left">
            <h2 class="title">Furniture</h2>
        </div>

        <div class="heading-right">
            <ul class="nav nav-pills nav-border-anim justify-content-center" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="furn-new-link" data-toggle="tab" href="#furn-new-tab" role="tab" aria-controls="furn-new-tab" aria-selected="true">New</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="furn-featured-link" data-toggle="tab" href="#furn-featured-tab" role="tab" aria-controls="furn-featured-tab" aria-selected="false">Featured</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="furn-best-link" data-toggle="tab" href="#furn-best-tab" role="tab" aria-controls="furn-best-tab" aria-selected="false">Best Seller</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="tab-content tab-content-carousel">
        <div class="tab-pane p-0 fade show active" id="furn-new-tab" role="tabpanel" aria-labelledby="furn-new-link">
            <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                data-owl-options='{
                    "nav": false, 
                    "dots": true,
                    "margin": 20,
                    "loop": false,
                    "responsive": {
                        "0": {
                            "items":2
                        },
                        "480": {
                            "items":2
                        },
                        "768": {
                            "items":3
                        },
                        "992": {
                            "items":4
                        },
                        "1280": {
                            "items":5,
                            "nav": true
                        }
                    }
                }'>
                @foreach($electronics as $electronic) 
                <div class="product">
                    <figure class="product-media">
                        <span class="product-label label-new">New</span>
                        <a href="{{ route('products.show',$electronic->id)}}">
                            <img src="{{ asset('images/demos/demo-13/products/product-17.jpg') }}" alt="Product image" class="product-image">
                        </a>

                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                            <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                            <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                        </div>

                        <form action="{{ route('cart.store') }}" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{ $electronic->id }}">
                            <input type="hidden" name="name" value="{{ $electronic->name }}">
                            <input type="hidden" name="price" value="{{ $electronic->price }}">
                            <div class="product-action">
                                <button type="submit" class="btn-product btn-cart">add to cart</button>
                            </div>
                        </form>
                    </figure>

                    <div class="product-body">
                        <div class="product-cat">
                            {{ $electronic->category->name }}
                        </div>
                        <h3 class="product-title"><a href="{{ route('products.show', $electronic->id) }}">{{ $electronic->name }}</a></h3>
                        <div class="product-price">
                            ${{ $electronic->price }}
                        </div>
                        <div class="ratings-container">
                            <div class="ratings">
                                <div class="ratings-val" style="width: 100%;"></div>
                            </div>
                            <span class="ratings-text">( 10 Reviews )</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="tab-pane p-0 fade" id="furn-featured-tab" role="tabpanel" aria-labelledby="furn-featured-link">
            <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                data-owl-options='{
                    "nav": false, 
                    "dots": true,
                    "margin": 20,
                    "loop": false,
                    "responsive": {
                        "0": {
                            "items":2
                        },
                        "480": {
                            "items":2
                        },
                        "768": {
                            "items":3
                        },
                        "992": {
                            "items":4
                        },
                        "1280": {
                            "items":5,
                            "nav": true
                        }
                    }
                }'>
                @foreach($electronics as $electronic) 
                <div class="product">
                    <figure class="product-media">
                        <span class="product-label label-new">New</span>
                        <a href="{{ route('products.show',$electronic->id)}}">
                            <img src="{{ asset('images/demos/demo-13/products/product-17.jpg') }}" alt="Product image" class="product-image">
                        </a>

                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                            <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                            <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                        </div>

                        <form action="{{ route('cart.store') }}" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{ $electronic->id }}">
                            <input type="hidden" name="name" value="{{ $electronic->name }}">
                            <input type="hidden" name="price" value="{{ $electronic->price }}">
                            <div class="product-action">
                                <button type="submit" class="btn-product btn-cart">add to cart</button>
                            </div>
                        </form>
                    </figure>

                    <div class="product-body">
                        <div class="product-cat">
                            {{ $electronic->category->name }}
                        </div>
                        <h3 class="product-title"><a href="{{ route('products.show', $electronic->id) }}">{{ $electronic->name }}</a></h3>
                        <div class="product-price">
                            ${{ $electronic->price }}
                        </div>
                        <div class="ratings-container">
                            <div class="ratings">
                                <div class="ratings-val" style="width: 100%;"></div>
                            </div>
                            <span class="ratings-text">( 10 Reviews )</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="tab-pane p-0 fade" id="furn-best-tab" role="tabpanel" aria-labelledby="furn-best-link">
            <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                data-owl-options='{
                    "nav": false, 
                    "dots": true,
                    "margin": 20,
                    "loop": false,
                    "responsive": {
                        "0": {
                            "items":2
                        },
                        "480": {
                            "items":2
                        },
                        "768": {
                            "items":3
                        },
                        "992": {
                            "items":4
                        },
                        "1280": {
                            "items":5,
                            "nav": true
                        }
                    }
                }'>
                @foreach($electronics as $electronic) 
                <div class="product">
                    <figure class="product-media">
                        <span class="product-label label-new">New</span>
                        <a href="{{ route('products.show',$electronic->id)}}">
                            <img src="{{ asset('images/demos/demo-13/products/product-17.jpg') }}" alt="Product image" class="product-image">
                        </a>

                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                            <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                            <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                        </div>

                        <form action="{{ route('cart.store') }}" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{ $electronic->id }}">
                            <input type="hidden" name="name" value="{{ $electronic->name }}">
                            <input type="hidden" name="price" value="{{ $electronic->price }}">
                            <div class="product-action">
                                <button type="submit" class="btn-product btn-cart">add to cart</button>
                            </div>
                        </form>
                    </figure>

                    <div class="product-body">
                        <div class="product-cat">
                            {{ $electronic->category->name }}
                        </div>
                        <h3 class="product-title"><a href="{{ route('products.show', $electronic->id) }}">{{ $electronic->name }}</a></h3>
                        <div class="product-price">
                            ${{ $electronic->price }}
                        </div>
                        <div class="ratings-container">
                            <div class="ratings">
                                <div class="ratings-val" style="width: 100%;"></div>
                            </div>
                            <span class="ratings-text">( 10 Reviews )</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@else

@endif

<div class="mb-3"></div>

<div class="container clothing ">
    <div class="heading heading-flex heading-border mb-3">
        <div class="heading-left">
            <h2 class="title">Clothing & Apparel</h2>
        </div>

        <div class="heading-right">
            <ul class="nav nav-pills nav-border-anim justify-content-center" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="clot-new-link" data-toggle="tab" href="#clot-new-tab" role="tab" aria-controls="clot-new-tab" aria-selected="true">New</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="clot-featured-link" data-toggle="tab" href="#clot-featured-tab" role="tab" aria-controls="clot-featured-tab" aria-selected="false">Featured</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="clot-best-link" data-toggle="tab" href="#clot-best-tab" role="tab" aria-controls="clot-best-tab" aria-selected="false">Best Seller</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="tab-content tab-content-carousel">
        <div class="tab-pane p-0 fade show active" id="clot-new-tab" role="tabpanel" aria-labelledby="clot-new-link">
            <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                data-owl-options='{
                    "nav": false, 
                    "dots": true,
                    "margin": 20,
                    "loop": false,
                    "responsive": {
                        "0": {
                            "items":2
                        },
                        "480": {
                            "items":2
                        },
                        "768": {
                            "items":3
                        },
                        "992": {
                            "items":4
                        },
                        "1280": {
                            "items":5,
                            "nav": true
                        }
                    }
                }'>
                @foreach($electronics as $electronic) 
                <div class="product">
                    <figure class="product-media">
                        <span class="product-label label-new">New</span>
                        <a href="{{ route('products.show',$electronic->id)}}">
                            <img src="{{ asset('images/demos/demo-13/products/product-17.jpg') }}" alt="Product image" class="product-image">
                        </a>

                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                            <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                            <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                        </div>

                        <form action="{{ route('cart.store') }}" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{ $electronic->id }}">
                            <input type="hidden" name="name" value="{{ $electronic->name }}">
                            <input type="hidden" name="price" value="{{ $electronic->price }}">
                            <div class="product-action">
                                <button type="submit" class="btn-product btn-cart">add to cart</button>
                            </div>
                        </form>
                    </figure>

                    <div class="product-body">
                        <div class="product-cat">
                            {{ $electronic->category->name }}
                        </div>
                        <h3 class="product-title"><a href="{{ route('products.show', $electronic->id) }}">{{ $electronic->name }}</a></h3>
                        <div class="product-price">
                            ${{ $electronic->price }}
                        </div>
                        <div class="ratings-container">
                            <div class="ratings">
                                <div class="ratings-val" style="width: 100%;"></div>
                            </div>
                            <span class="ratings-text">( 10 Reviews )</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="tab-pane p-0 fade" id="clot-featured-tab" role="tabpanel" aria-labelledby="clot-featured-link">
            <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                data-owl-options='{
                    "nav": false, 
                    "dots": true,
                    "margin": 20,
                    "loop": false,
                    "responsive": {
                        "0": {
                            "items":2
                        },
                        "480": {
                            "items":2
                        },
                        "768": {
                            "items":3
                        },
                        "992": {
                            "items":4
                        },
                        "1280": {
                            "items":5,
                            "nav": true
                        }
                    }
                }'>
                @foreach($electronics as $electronic) 
                <div class="product">
                    <figure class="product-media">
                        <span class="product-label label-new">New</span>
                        <a href="{{ route('products.show',$electronic->id)}}">
                            <img src="{{ asset('images/demos/demo-13/products/product-17.jpg') }}" alt="Product image" class="product-image">
                        </a>

                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                            <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                            <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                        </div>

                            <form action="{{ route('cart.store') }}" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{ $electronic->id }}">
                                <input type="hidden" name="name" value="{{ $electronic->name }}">
                                <input type="hidden" name="price" value="{{ $electronic->price }}">
                                <div class="product-action">
                                    <button type="submit" class="btn-product btn-cart">add to cart</button>
                                </div>
                            </form>
                    </figure>

                    <div class="product-body">
                        <div class="product-cat">
                            {{ $electronic->category->name }}
                        </div>
                        <h3 class="product-title"><a href="{{ route('products.show', $electronic->id) }}">{{ $electronic->name }}</a></h3>
                        <div class="product-price">
                            ${{ $electronic->price }}
                        </div>
                        <div class="ratings-container">
                            <div class="ratings">
                                <div class="ratings-val" style="width: 100%;"></div>
                            </div>
                            <span class="ratings-text">( 10 Reviews )</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="tab-pane p-0 fade" id="clot-best-tab" role="tabpanel" aria-labelledby="clot-best-link">
            <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                data-owl-options='{
                    "nav": false, 
                    "dots": true,
                    "margin": 20,
                    "loop": false,
                    "responsive": {
                        "0": {
                            "items":2
                        },
                        "480": {
                            "items":2
                        },
                        "768": {
                            "items":3
                        },
                        "992": {
                            "items":4
                        },
                        "1280": {
                            "items":5,
                            "nav": true
                        }
                    }
                }'>
                @foreach($electronics as $electronic) 
                <div class="product">
                    <figure class="product-media">
                        <span class="product-label label-new">New</span>
                        <a href="{{ route('products.show',$electronic->id)}}">
                            <img src="{{ asset('images/demos/demo-13/products/product-17.jpg') }}" alt="Product image" class="product-image">
                        </a>

                        <div class="product-action-vertical">
                            <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                            <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                            <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                        </div>

                        <form action="{{ route('cart.store') }}" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{ $electronic->id }}">
                            <input type="hidden" name="name" value="{{ $electronic->name }}">
                            <input type="hidden" name="price" value="{{ $electronic->price }}">
                            <div class="product-action">
                                <button type="submit" class="btn-product btn-cart">add to cart</button>
                            </div>
                        </form>
                    </figure>

                    <div class="product-body">
                        <div class="product-cat">
                            {{ $electronic->category->name }}
                        </div>
                        <h3 class="product-title"><a href="{{ route('products.show', $electronic->id) }}">{{ $electronic->name }}</a></h3>
                        <div class="product-price">
                            ${{ $electronic->price }}
                        </div>
                        <div class="ratings-container">
                            <div class="ratings">
                                <div class="ratings-val" style="width: 100%;"></div>
                            </div>
                            <span class="ratings-text">( 10 Reviews )</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<div class="mb-3"></div>

<div class="container">
    <h2 class="title title-border mb-5">Shop by Brands</h2>
    <div class="owl-carousel mb-5 owl-simple" data-toggle="owl" 
        data-owl-options='{
            "nav": false, 
            "dots": true,
            "margin": 30,
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
                "1024": {
                    "items":6
                },
                "1280": {
                    "items":6,
                    "nav": true,
                    "dots": false
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
</div>

<div class="cta cta-horizontal cta-horizontal-box bg-primary">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-2xl-5col">
                <h3 class="cta-title text-white">Join Our Newsletter</h3>
                <p class="cta-desc text-white">Subcribe to get information about products and coupons</p>
            </div>
            
            <div class="col-3xl-5col">
                <form action="#">
                    <div class="input-group">
                        <input type="email" class="form-control form-control-white" placeholder="Enter your Email Address" aria-label="Email Adress" required>
                        <div class="input-group-append">
                            <button class="btn btn-outline-white-2" type="submit"><span>Subscribe</span><i class="icon-long-arrow-right"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="blog-posts bg-light pt-4 pb-7">
    <div class="container">
        <h2 class="title">From Our Blog</h2>

        <div class="owl-carousel owl-simple" data-toggle="owl" 
            data-owl-options='{
                "nav": false, 
                "dots": true,
                "items": 3,
                "margin": 20,
                "loop": false,
                "responsive": {
                    "0": {
                        "items":1
                    },
                    "600": {
                        "items":2
                    },
                    "992": {
                        "items":3
                    },
                    "1280": {
                        "items":4,
                        "nav": true, 
                        "dots": false
                    }
                }
            }'>
            @foreach($articles as $article) 
            <article class="entry">
                <figure class="entry-media">
                    <a href="#">
                        <img src="{{ asset('images/demos/demo-13/blog/post-1.jpg') }}" alt="image desc">
                    </a>
                </figure>

                <div class="entry-body">
                    <div class="entry-meta">
                        <a href="#">{{ $article->created_at }}</a>, 0 Comments
                    </div>

                    <h3 class="entry-title">
                        <a href="#">{{ $article->title}}</a>
                    </h3>

                    <div class="entry-content">
                        <p>{{ $article->description }}.</p>
                        <a href="{{ route('articles.show', $article->id) }}" class="read-more">Read More</a>
                    </div>
                </div>
            </article>
            @endforeach
        </div>
    </div>
</div>
@endsection

