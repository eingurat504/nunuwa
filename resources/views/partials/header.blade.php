<header class="header header-10 header-intro-clearance">
            <div class="header-top">
                <div class="container">
                    <div class="header-left">
                        <a href="tel:#"><i class="icon-phone"></i>Call: +256779 357 </a>
                    </div><!-- End .header-left -->

                    <div class="header-right">

                        <ul class="top-menu">
                            <li>
                                <a href="#">Links</a>
                                <ul>
                                    <li>
                                        <div class="header-dropdown">
                                            <a href="#">USD</a>
                                            <div class="header-menu">
                                                <ul>
                                                    <li><a href="#">Eur</a></li>
                                                    <li><a href="#">Usd</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                    <li>   
                                        <div class="header-dropdown">
                                            <a href="#">English</a>
                                            <div class="header-menu">
                                                <ul>
                                                    <li><a href="#">English</a></li>
                                                    <li><a href="#">Kiswahili</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                    @if (Auth::guard('web')->guest())
                                    <li class="login">
                                        <a href="#signin-modal" data-toggle="modal">Sign in / Sign up</a>
                                    </li>
                                    @else
                                    <li>
                                        <div class="header-dropdown">
                                            <a href="#">{{ Auth::guard('web')->user()->name }}</a>
                                            <div class="header-menu">
                                                <ul>
                                                    <!-- <li><a href="#" >English</a></li> -->
                                                    <li>
                                                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                            Logout
                                                        </a>
                                                        
                                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                            @csrf
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                    @endguest
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="header-middle">
                <div class="container">
                    <div class="header-left">
                        <button class="mobile-menu-toggler">
                            <span class="sr-only">Toggle mobile menu</span>
                            <i class="icon-bars"></i>
                        </button>
                        
                        <a href="index.html" class="logo">
                            <img src="{{ asset('images/demos/demo-13/logo.png') }}" alt="Molla Logo" width="105" height="25">
                        </a>
                    </div><!-- End .header-left -->

                    <div class="header-center">
                        <div class="header-search header-search-extended header-search-visible header-search-no-radius d-none d-lg-block">
                            <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
                            <form action="#" method="get">
                                <div class="header-search-wrapper search-wrapper-wide">
                                    <div class="select-custom">
                                        <select id="cat" name="cat">
                                            <option value="">All Departments</option>
                                            <option value="1">Fashion</option>
                                            <option value="2">- Women</option>
                                            <option value="3">- Men</option>
                                            <option value="4">- Jewellery</option>
                                            <option value="5">- Kids Fashion</option>
                                            <option value="6">Electronics</option>
                                            <option value="7">- Smart TVs</option>
                                            <option value="8">- Cameras</option>
                                            <option value="9">- Games</option>
                                            <option value="10">Home &amp; Garden</option>
                                            <option value="11">Motors</option>
                                            <option value="12">- Cars and Trucks</option>
                                            <option value="15">- Boats</option>
                                            <option value="16">- Auto Tools &amp; Supplies</option>
                                        </select>
                                    </div><!-- End .select-custom -->
                                    <label for="q" class="sr-only">Search</label>
                                    <input type="search" class="form-control" name="q" id="q" placeholder="Search product ..." required>
                                    <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
                                </div><!-- End .header-search-wrapper -->
                            </form>
                        </div><!-- End .header-search -->
                    </div>

                    <div class="header-right">
                        <div class="header-dropdown-link">
                            <div class="dropdown compare-dropdown">
                                <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static" title="Compare Products" aria-label="Compare Products">
                                    <i class="icon-random"></i>
                                    <span class="compare-txt">Compare</span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right">
                                    <ul class="compare-products">
                                        <li class="compare-product">
                                            <a href="#" class="btn-remove" title="Remove Product"><i class="icon-close"></i></a>
                                            <h4 class="compare-product-title"><a href="product.html">Blue Night Dress</a></h4>
                                        </li>
                                        <li class="compare-product">
                                            <a href="#" class="btn-remove" title="Remove Product"><i class="icon-close"></i></a>
                                            <h4 class="compare-product-title"><a href="product.html">White Long Skirt</a></h4>
                                        </li>
                                    </ul>

                                    <div class="compare-actions">
                                        <a href="#" class="action-link">Clear All</a>
                                        <a href="#" class="btn btn-outline-primary-2"><span>Compare</span><i class="icon-long-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div><!-- End .compare-dropdown -->

                            <a href="{{ route('wishlist.index') }}" class="wishlist-link">
                                <i class="icon-heart-o"></i>
                                <span class="wishlist-count">3</span>
                                <span class="wishlist-txt">Wishlist</span>
                            </a>

                            <div class="dropdown cart-dropdown">
                                <a href="{{ route('cart.index') }}" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                                    <i class="icon-shopping-cart"></i>
                                    <span class="cart-count">@if(empty(Cart::instance('default')->content())) 
                                    {{ Cart::instance('default')->count() }}
                                        @else 
                                        {{ Cart::instance('default')->count() }}
                                        @endif</span>
                                    <span class="cart-txt">Cart</span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right">
                                    <div class="dropdown-cart-products">
                                        @foreach (Cart::instance('default')->content() as $item)
                                            <div class="product">
                                                <div class="product-cart-details">
                                                    <h4 class="product-title">
                                                        <a href="product.html">{{ $item->model->name }}</a>
                                                    </h4>

                                                    <span class="cart-product-info">
                                                        <!-- <span class="cart-product-qty">1</span> -->
                                                        ${{ $item->subtotal() }}
                                                    </span>
                                                </div><!-- End .product-cart-details -->

                                                <figure class="product-image-container">
                                                    <a href="product.html" class="product-image">
                                                        <img src="{{ asset('images/products/cart/product-1.jpg') }}" alt="product">
                                                    </a>
                                                </figure>

                                                <form action="{{ route('cart.destroy', $item->rowId) }}" method="POST">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <button type="submit" class="btn-remove"><i class="icon-close"></i></button>
                                                </form>
                                            </div>
                                        @endforeach
                                    </div>

                                    <div class="dropdown-cart-total">
                                        <span>Total</span>

                                        <span class="cart-total-price">${{ Cart::instance('default')->total() }}</span>
                                    </div>

                                    <div class="dropdown-cart-action">
                                        <a href="{{ route('cart.index') }}" class="btn btn-primary">View Cart</a>
                                        <a href="{{ route('checkout.index') }}" class="btn btn-outline-primary-2"><span>Checkout</span><i class="icon-long-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="header-bottom sticky-header">
                <div class="container">
                    <div class="header-left">
                        <div class="dropdown category-dropdown show is-on" data-visible="true">
                            <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" data-display="static" title="Browse Categories">
                                Browse Categories
                            </a>

                            <div class="dropdown-menu show">
                                <nav class="side-nav">
                                    <ul class="menu-vertical sf-arrows">
                                        <li class="megamenu-container">
                                            <a class="sf-with-ul" href="{{ route('electronics.index') }}">Electronics</a>

                                            <div class="megamenu">
                                                <div class="row no-gutters">
                                                    <div class="col-md-8">
                                                        <div class="menu-col">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="menu-title">Laptops & Computers</div><!-- End .menu-title -->
                                                                    <ul>
                                                                        <li><a href="{{ route('electronics.index') }}">Desktop Computers</a></li>
                                                                        <li><a href="{{ route('electronics.index') }}">Monitors</a></li>
                                                                        <li><a href="{{ route('electronics.index') }}">Laptops</a></li>
                                                                        <li><a href="{{ route('electronics.index') }}">iPad & Tablets</a></li>
                                                                        <li><a href="{{ route('electronics.index') }}">Hard Drives & Storage</a></li>
                                                                        <li><a href="{{ route('electronics.index') }}">Printers & Supplies</a></li>
                                                                        <li><a href="{{ route('electronics.index') }}">Computer Accessories</a></li>
                                                                    </ul>

                                                                    <div class="menu-title">TV & Video</div><!-- End .menu-title -->
                                                                    <ul>
                                                                        <li><a href="{{ route('electronics.index') }}">TVs</a></li>
                                                                        <li><a href="{{ route('electronics.index') }}">Home Audio Speakers</a></li>
                                                                        <li><a href="{{ route('electronics.index') }}">Projectors</a></li>
                                                                        <li><a href="{{ route('electronics.index') }}">Media Streaming Devices</a></li>
                                                                    </ul>
                                                                </div><!-- End .col-md-6 -->

                                                                <div class="col-md-6">
                                                                    <div class="menu-title">Cell Phones</div><!-- End .menu-title -->
                                                                    <ul>
                                                                        <li><a href="{{ route('electronics.index') }}">Carrier Phones</a></li>
                                                                        <li><a href="{{ route('electronics.index') }}">Unlocked Phones</a></li>
                                                                        <li><a href="{{ route('electronics.index') }}">Phone & Cellphone Cases</a></li>
                                                                        <li><a href="{{ route('electronics.index') }}">Cellphone Chargers </a></li>
                                                                    </ul>

                                                                    <div class="menu-title">Digital Cameras</div><!-- End .menu-title -->
                                                                    <ul>
                                                                        <li><a href="{{ route('electronics.index') }}">Digital SLR Cameras</a></li>
                                                                        <li><a href="{{ route('electronics.index') }}">Sports & Action Cameras</a></li>
                                                                        <li><a href="{{ route('electronics.index') }}">Camcorders</a></li>
                                                                        <li><a href="{{ route('electronics.index') }}">Camera Lenses</a></li>
                                                                        <li><a href="{{ route('electronics.index') }}">Photo Printer</a></li>
                                                                        <li><a href="{{ route('electronics.index') }}">Digital Memory Cards</a></li>
                                                                        <li><a href="{{ route('electronics.index') }}">Camera Bags, Backpacks & Cases</a></li>
                                                                    </ul>
                                                                </div><!-- End .col-md-6 -->
                                                            </div><!-- End .row -->
                                                        </div><!-- End .menu-col -->
                                                    </div><!-- End .col-md-8 -->

                                                    <div class="col-md-4">
                                                        <div class="banner banner-overlay">
                                                            <a href="category.html" class="banner banner-menu">
                                                                <img src="{{ asset('images/demos/demo-13/menu/banner-1.jpg') }}" alt="Banner">
                                                            </a>
                                                        </div><!-- End .banner banner-overlay -->
                                                    </div><!-- End .col-md-4 -->
                                                </div><!-- End .row -->
                                            </div><!-- End .megamenu -->
                                        </li>
                                        <li class="megamenu-container">
                                            <a class="sf-with-ul" href="{{ route('furniture.index') }}">Furniture</a>

                                            <div class="megamenu">
                                                <div class="row no-gutters">
                                                    <div class="col-md-8">
                                                        <div class="menu-col">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="menu-title">Bedroom</div><!-- End .menu-title -->
                                                                    <ul>
                                                                        <li><a href="{{ route('furniture.index') }}">Beds, Frames & Bases</a></li>
                                                                        <li><a href="{{ route('furniture.index') }}">Dressers</a></li>
                                                                        <li><a href="{{ route('furniture.index') }}">Nightstands</a></li>
                                                                        <li><a href="{{ route('furniture.index') }}">Kids' Beds & Headboards</a></li>
                                                                        <li><a href="{{ route('furniture.index') }}">Armoires</a></li>
                                                                    </ul>

                                                                    <div class="menu-title">Living Room</div><!-- End .menu-title -->
                                                                    <ul>
                                                                        <li><a href="{{ route('furniture.index') }}">Coffee Tables</a></li>
                                                                        <li><a href="{{ route('furniture.index') }}">Chairs</a></li>
                                                                        <li><a href="{{ route('furniture.index') }}">Tables</a></li>
                                                                        <li><a href="{{ route('furniture.index') }}">Futons & Sofa Beds</a></li>
                                                                        <li><a href="{{ route('furniture.index') }}">Cabinets & Chests</a></li>
                                                                    </ul>
                                                                </div><!-- End .col-md-6 -->

                                                                <div class="col-md-6">
                                                                    <div class="menu-title">Office</div><!-- End .menu-title -->
                                                                    <ul>
                                                                        <li><a href="{{ route('furniture.index') }}">Office Chairs</a></li>
                                                                        <li><a href="{{ route('furniture.index') }}">Desks</a></li>
                                                                        <li><a href="{{ route('furniture.index') }}">Bookcases</a></li>
                                                                        <li><a href="{{ route('furniture.index') }}">File Cabinets</a></li>
                                                                        <li><a href="{{ route('furniture.index') }}">Breakroom Tables</a></li>
                                                                    </ul>

                                                                    <div class="menu-title">Kitchen & Dining</div><!-- End .menu-title -->
                                                                    <ul>
                                                                        <li><a href="{{ route('furniture.index') }}">Dining Sets</a></li>
                                                                        <li><a href="{{ route('furniture.index') }}">Kitchen Storage Cabinets</a></li>
                                                                        <li><a href="{{ route('furniture.index') }}">Bakers Racks</a></li>
                                                                        <li><a href="{{ route('furniture.index') }}">Dining Chairs</a></li>
                                                                        <li><a href="{{ route('furniture.index') }}">Dining Room Tables</a></li>
                                                                        <li><a href="{{ route('furniture.index') }}">Bar Stools</a></li>
                                                                    </ul>
                                                                </div><!-- End .col-md-6 -->
                                                            </div><!-- End .row -->
                                                        </div><!-- End .menu-col -->
                                                    </div><!-- End .col-md-8 -->

                                                    <div class="col-md-4">
                                                        <div class="banner banner-overlay">
                                                            <a href="category.html" class="banner banner-menu">
                                                                <img src="{{ asset('images/demos/demo-13/menu/banner-2.jpg') }}" alt="Banner">
                                                            </a>
                                                        </div><!-- End .banner banner-overlay -->
                                                    </div><!-- End .col-md-4 -->
                                                </div><!-- End .row -->
                                            </div><!-- End .megamenu -->
                                        </li>
                                        <li class="megamenu-container">
                                            <a class="sf-with-ul" href="{{ route('cooking.index') }}">Cooking</a>

                                            <div class="megamenu">
                                                <div class="menu-col">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="menu-title">Cookware</div><!-- End .menu-title -->
                                                            <ul>
                                                                <li><a href="{{ route('cooking.index') }}">Cookware Sets</a></li>
                                                                <li><a href="{{ route('cooking.index') }}">Pans, Griddles & Woks</a></li>
                                                                <li><a href="{{ route('cooking.index') }}">Pots</a></li>
                                                                <li><a href="{{ route('cooking.index') }}">Skillets & Grill Pans</a></li>
                                                                <li><a href="{{ route('cooking.index') }}">Kettles</a></li>
                                                                <li><a href="{{ route('cooking.index') }}">Soup & Stockpots</a></li>
                                                            </ul>
                                                        </div><!-- End .col-md-4 -->

                                                        <div class="col-md-4">
                                                            <div class="menu-title">Dinnerware & Tabletop</div><!-- End .menu-title -->
                                                            <ul>
                                                                <li><a href="{{ route('cooking.index') }}">Plates</a></li>
                                                                <li><a href="{{ route('cooking.index') }}">Cups & Mugs</a></li>
                                                                <li><a href="{{ route('cooking.index') }}">Trays & Platters</a></li>
                                                                <li><a href="{{ route('cooking.index') }}">Coffee & Tea Serving</a></li>
                                                                <li><a href="{{ route('cooking.index') }}">Salt & Pepper Shaker</a></li>
                                                            </ul>
                                                        </div><!-- End .col-md-4 -->

                                                        <div class="col-md-4">
                                                            <div class="menu-title">Cooking Appliances</div><!-- End .menu-title -->
                                                            <ul>
                                                                <li><a href="{{ route('cooking.index') }}">Microwaves</a></li>
                                                                <li><a href="{{ route('cooking.index') }}">Coffee Makers</a></li>
                                                                <li><a href="{{ route('cooking.index') }}">Mixers & Attachments</a></li>
                                                                <li><a href="{{ route('cooking.index') }}">Slow Cookers</a></li>
                                                                <li><a href="{{ route('cooking.index') }}">Air Fryers</a></li>
                                                                <li><a href="{{ route('cooking.index') }}">Toasters & Ovens</a></li>
                                                            </ul>
                                                        </div><!-- End .col-md-4 -->
                                                    </div><!-- End .row -->

                                                    <div class="row menu-banners">
                                                        <div class="col-md-4">
                                                            <div class="banner">
                                                                <a href="#">
                                                                    <img src="{{ asset('images/demos/demo-13/menu/1.jpg') }}" alt="image">
                                                                </a>
                                                            </div><!-- End .banner -->
                                                        </div><!-- End .col-md-4 -->

                                                        <div class="col-md-4">
                                                            <div class="banner">
                                                                <a href="#">
                                                                    <img src="{{ asset('images/demos/demo-13/menu/2.jpg') }}" alt="image">
                                                                </a>
                                                            </div><!-- End .banner -->
                                                        </div><!-- End .col-md-4 -->

                                                        <div class="col-md-4">
                                                            <div class="banner">
                                                                <a href="#">
                                                                    <img src="{{ asset('images/demos/demo-13/menu/3.jpg') }}" alt="image">
                                                                </a>
                                                            </div><!-- End .banner -->
                                                        </div><!-- End .col-md-4 -->
                                                    </div><!-- End .row -->
                                                </div><!-- End .menu-col -->
                                            </div><!-- End .megamenu -->
                                        </li>
                                        <li class="megamenu-container">
                                            <a class="sf-with-ul" href="{{ route('clothing.index') }}">Clothing</a>

                                            <div class="megamenu">
                                                <div class="row no-gutters">
                                                    <div class="col-md-8">
                                                        <div class="menu-col">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="menu-title">Women</div><!-- End .menu-title -->
                                                                    <ul>
                                                                        <li><a href="{{ route('clothing.index') }}"><strong>New Arrivals</strong></a></li>
                                                                        <li><a href="{{ route('clothing.index') }}"><strong>Best Sellers</strong></a></li>
                                                                        <li><a href="{{ route('clothing.index') }}"><strong>Trending</strong></a></li>
                                                                        <li><a href="{{ route('clothing.index') }}">Clothing</a></li>
                                                                        <li><a href="{{ route('clothing.index') }}">Shoes</a></li>
                                                                        <li><a href="{{ route('clothing.index') }}">Bags</a></li>
                                                                        <li><a href="{{ route('clothing.index') }}">Accessories</a></li>
                                                                        <li><a href="{{ route('clothing.index') }}">Jewlery & Watches</a></li>
                                                                        <li><a href="{{ route('clothing.index') }}"><strong>Sale</strong></a></li>
                                                                    </ul>
                                                                </div><!-- End .col-md-6 -->

                                                                <div class="col-md-6">
                                                                    <div class="menu-title">Men</div><!-- End .menu-title -->
                                                                    <ul>
                                                                        <li><a href="{{ route('clothing.index') }}"><strong>New Arrivals</strong></a></li>
                                                                        <li><a href="{{ route('clothing.index') }}"><strong>Best Sellers</strong></a></li>
                                                                        <li><a href="{{ route('clothing.index') }}"><strong>Trending</strong></a></li>
                                                                        <li><a href="{{ route('clothing.index') }}">Clothing</a></li>
                                                                        <li><a href="{{ route('clothing.index') }}">Shoes</a></li>
                                                                        <li><a href="{{ route('clothing.index') }}">Bags</a></li>
                                                                        <li><a href="{{ route('clothing.index') }}">Accessories</a></li>
                                                                        <li><a href="{{ route('clothing.index') }}">Jewlery & Watches</a></li>
                                                                    </ul>
                                                                </div><!-- End .col-md-6 -->
                                                            </div><!-- End .row -->
                                                        </div><!-- End .menu-col -->
                                                    </div><!-- End .col-md-8 -->

                                                    <div class="col-md-4">
                                                        <div class="banner banner-overlay">
                                                            <a href="category.html" class="banner banner-menu">
                                                                <img src="{{ asset('images/demos/demo-13/menu/banner-3.jpg') }}" alt="Banner">
                                                            </a>
                                                        </div><!-- End .banner banner-overlay -->
                                                    </div><!-- End .col-md-4 -->
                                                </div><!-- End .row -->

                                                <div class="menu-col menu-brands">
                                                    <div class="row">
                                                        <div class="col-lg-2">
                                                            <a href="#" class="brand">
                                                                <img src="{{ asset('images/brands/1.png') }}" alt="Brand Name">
                                                            </a>
                                                        </div><!-- End .col-lg-2 -->

                                                        <div class="col-lg-2">
                                                            <a href="#" class="brand">
                                                                <img src="{{ asset('images/brands/2.png') }}" alt="Brand Name">
                                                            </a>
                                                        </div><!-- End .col-lg-2 -->

                                                        <div class="col-lg-2">
                                                            <a href="#" class="brand">
                                                                <img src="{{ asset('images/brands/3.png') }}" alt="Brand Name">
                                                            </a>
                                                        </div><!-- End .col-lg-2 -->

                                                        <div class="col-lg-2">
                                                            <a href="#" class="brand">
                                                                <img src="{{ asset('images/brands/4.png') }}" alt="Brand Name">
                                                            </a>
                                                        </div><!-- End .col-lg-2 -->

                                                        <div class="col-lg-2">
                                                            <a href="#" class="brand">
                                                                <img src="{{ asset('images/brands/5.png') }}" alt="Brand Name">
                                                            </a>
                                                        </div><!-- End .col-lg-2 -->

                                                        <div class="col-lg-2">
                                                            <a href="#" class="brand">
                                                                <img src="{{ asset('images/brands/6.png') }}" alt="Brand Name">
                                                            </a>
                                                        </div><!-- End .col-lg-2 -->
                                                    </div><!-- End .row -->
                                                </div><!-- End .menu-brands -->
                                            </div><!-- End .megamenu -->
                                        </li>
                                        <li><a href="{{ route('appliances.index') }}">Home Appliances</a></li>
                                        <li><a href="{{ route('healthy.index') }}">Healthy & Beauty</a></li>
                                        <li><a href="{{ route('foot_wear.index') }}">Shoes & Boots</a></li>
                                        <li><a href="{{ route('travel.index') }}">Travel & Outdoor</a></li>
                                        <li><a href="{{ route('phones.index') }}">Smart Phones</a></li>
                                        <li><a href="{{ route('audios.index') }}">TV & Audio</a></li>
                                        <li><a href="#">Gift Ideas</a></li>
                                    </ul><!-- End .menu-vertical -->
                                </nav><!-- End .side-nav -->
                            </div>
                        </div><!-- End .category-dropdown -->
                    </div><!-- End .col-lg-3 -->
                    <div class="header-center">
                        <nav class="main-nav">
                            <ul class="menu sf-arrows">
                                <li class="megamenu-container active">
                                    <a href="index.html" class="sf-with-ul">Home</a>

                                    <div class="megamenu demo">
                                    <div class="menu-col">
                                        <div class="menu-title">Choose your demo</div><!-- End .menu-title -->

                                        <div class="demo-list">
                                            <div class="demo-item">
                                                <a href="index-1.html">
                                                    <span class="demo-bg" style="background-image: url(assets/images/menu/demos/1.jpg);"></span>
                                                    <span class="demo-title">01 - furniture store</span>
                                                </a>
                                            </div><!-- End .demo-item -->

                                            <div class="demo-item">
                                                <a href="index-2.html">
                                                    <span class="demo-bg" style="background-image: url(assets/images/menu/demos/2.jpg);"></span>
                                                    <span class="demo-title">02 - furniture store</span>
                                                </a>
                                            </div><!-- End .demo-item -->

                                            <div class="demo-item">
                                                <a href="index-3.html">
                                                    <span class="demo-bg" style="background-image: url(assets/images/menu/demos/3.jpg);"></span>
                                                    <span class="demo-title">03 - electronic store</span>
                                                </a>
                                            </div><!-- End .demo-item -->

                                            <div class="demo-item">
                                                <a href="index-4.html">
                                                    <span class="demo-bg" style="background-image: url(assets/images/menu/demos/4.jpg);"></span>
                                                    <span class="demo-title">04 - electronic store</span>
                                                </a>
                                            </div><!-- End .demo-item -->

                                            <div class="demo-item">
                                                <a href="index-5.html">
                                                    <span class="demo-bg" style="background-image: url(assets/images/menu/demos/5.jpg);"></span>
                                                    <span class="demo-title">05 - fashion store</span>
                                                </a>
                                            </div><!-- End .demo-item -->

                                            <div class="demo-item">
                                                <a href="index-6.html">
                                                    <span class="demo-bg" style="background-image: url(assets/images/menu/demos/6.jpg);"></span>
                                                    <span class="demo-title">06 - fashion store</span>
                                                </a>
                                            </div><!-- End .demo-item -->

                                            <div class="demo-item">
                                                <a href="index-7.html">
                                                    <span class="demo-bg" style="background-image: url(assets/images/menu/demos/7.jpg);"></span>
                                                    <span class="demo-title">07 - fashion store</span>
                                                </a>
                                            </div><!-- End .demo-item -->

                                            <div class="demo-item">
                                                <a href="index-8.html">
                                                    <span class="demo-bg" style="background-image: url(assets/images/menu/demos/8.jpg);"></span>
                                                    <span class="demo-title">08 - fashion store</span>
                                                </a>
                                            </div><!-- End .demo-item -->

                                            <div class="demo-item">
                                                <a href="index-9.html">
                                                    <span class="demo-bg" style="background-image: url(assets/images/menu/demos/9.jpg);"></span>
                                                    <span class="demo-title">09 - fashion store</span>
                                                </a>
                                            </div><!-- End .demo-item -->

                                            <div class="demo-item">
                                                <a href="index-10.html">
                                                    <span class="demo-bg" style="background-image: url(assets/images/menu/demos/10.jpg);"></span>
                                                    <span class="demo-title">10 - shoes store</span>
                                                </a>
                                            </div><!-- End .demo-item -->

                                            <div class="demo-item hidden">
                                                <a href="index-11.html">
                                                    <span class="demo-bg" style="background-image: url(assets/images/menu/demos/11.jpg);"></span>
                                                    <span class="demo-title">11 - furniture simple store</span>
                                                </a>
                                            </div><!-- End .demo-item -->

                                            <div class="demo-item hidden">
                                                <a href="index-12.html">
                                                    <span class="demo-bg" style="background-image: url(assets/images/menu/demos/12.jpg);"></span>
                                                    <span class="demo-title">12 - fashion simple store</span>
                                                </a>
                                            </div><!-- End .demo-item -->

                                            <div class="demo-item hidden">
                                                <a href="index-13.html">
                                                    <span class="demo-bg" style="background-image: url(assets/images/menu/demos/13.jpg);"></span>
                                                    <span class="demo-title">13 - market</span>
                                                </a>
                                            </div><!-- End .demo-item -->

                                            <div class="demo-item hidden">
                                                <a href="index-14.html">
                                                    <span class="demo-bg" style="background-image: url(assets/images/menu/demos/14.jpg);"></span>
                                                    <span class="demo-title">14 - market fullwidth</span>
                                                </a>
                                            </div><!-- End .demo-item -->

                                            <div class="demo-item hidden">
                                                <a href="index-15.html">
                                                    <span class="demo-bg" style="background-image: url(assets/images/menu/demos/15.jpg);"></span>
                                                    <span class="demo-title">15 - lookbook 1</span>
                                                </a>
                                            </div><!-- End .demo-item -->

                                            <div class="demo-item hidden">
                                                <a href="index-16.html">
                                                    <span class="demo-bg" style="background-image: url(assets/images/menu/demos/16.jpg);"></span>
                                                    <span class="demo-title">16 - lookbook 2</span>
                                                </a>
                                            </div><!-- End .demo-item -->

                                            <div class="demo-item hidden">
                                                <a href="index-17.html">
                                                    <span class="demo-bg" style="background-image: url(assets/images/menu/demos/17.jpg);"></span>
                                                    <span class="demo-title">17 - fashion store</span>
                                                </a>
                                            </div><!-- End .demo-item -->

                                            <div class="demo-item hidden">
                                                <a href="index-18.html">
                                                    <span class="demo-bg" style="background-image: url(assets/images/menu/demos/18.jpg);"></span>
                                                    <span class="demo-title">18 - fashion store (with sidebar)</span>
                                                </a>
                                            </div><!-- End .demo-item -->

                                            <div class="demo-item hidden">
                                                <a href="index-19.html">
                                                    <span class="demo-bg" style="background-image: url(assets/images/menu/demos/19.jpg);"></span>
                                                    <span class="demo-title">19 - games store</span>
                                                </a>
                                            </div><!-- End .demo-item -->

                                            <div class="demo-item hidden">
                                                <a href="index-20.html">
                                                    <span class="demo-bg" style="background-image: url(assets/images/menu/demos/20.jpg);"></span>
                                                    <span class="demo-title">20 - book store</span>
                                                </a>
                                            </div><!-- End .demo-item -->

                                            <div class="demo-item hidden">
                                                <a href="index-21.html">
                                                    <span class="demo-bg" style="background-image: url(assets/images/menu/demos/21.jpg);"></span>
                                                    <span class="demo-title">21 - sport store</span>
                                                </a>
                                            </div><!-- End .demo-item -->

                                            <div class="demo-item hidden">
                                                <a href="index-22.html">
                                                    <span class="demo-bg" style="background-image: url(assets/images/menu/demos/22.jpg);"></span>
                                                    <span class="demo-title">22 - tools store</span>
                                                </a>
                                            </div><!-- End .demo-item -->

                                            <div class="demo-item hidden">
                                                <a href="index-23.html">
                                                    <span class="demo-bg" style="background-image: url(assets/images/menu/demos/23.jpg);"></span>
                                                    <span class="demo-title">23 - fashion left navigation store</span>
                                                </a>
                                            </div><!-- End .demo-item -->

                                            <div class="demo-item hidden">
                                                <a href="index-24.html">
                                                    <span class="demo-bg" style="background-image: url(assets/images/menu/demos/24.jpg);"></span>
                                                    <span class="demo-title">24 - extreme sport store</span>
                                                </a>
                                            </div><!-- End .demo-item -->

                                        </div><!-- End .demo-list -->

                                        <div class="megamenu-action text-center">
                                            <a href="#" class="btn btn-outline-primary-2 view-all-demos"><span>View All Demos</span><i class="icon-long-arrow-right"></i></a>
                                        </div><!-- End .text-center -->
                                    </div><!-- End .menu-col -->
                                </div><!-- End .megamenu -->
                                </li>
                                <li>
                                    <a href="category.html" class="sf-with-ul">Shop</a>

                                    <div class="megamenu megamenu-md">
                                    <div class="row no-gutters">
                                        <div class="col-md-8">
                                            <div class="menu-col">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="menu-title">Shop with sidebar</div><!-- End .menu-title -->
                                                        <ul>
                                                            <li><a href="category-list.html">Shop List</a></li>
                                                            <li><a href="category-2cols.html">Shop Grid 2 Columns</a></li>
                                                            <li><a href="category.html">Shop Grid 3 Columns</a></li>
                                                            <li><a href="category-4cols.html">Shop Grid 4 Columns</a></li>
                                                            <li><a href="category-market.html"><span>Shop Market<span class="tip tip-new">New</span></span></a></li>
                                                        </ul>

                                                        <div class="menu-title">Shop no sidebar</div><!-- End .menu-title -->
                                                        <ul>
                                                            <li><a href="category-boxed.html"><span>Shop Boxed No Sidebar<span class="tip tip-hot">Hot</span></span></a></li>
                                                            <li><a href="category-fullwidth.html">Shop Fullwidth No Sidebar</a></li>
                                                        </ul>
                                                    </div><!-- End .col-md-6 -->

                                                    <div class="col-md-6">
                                                        <div class="menu-title">Product Category</div><!-- End .menu-title -->
                                                        <ul>
                                                            <li><a href="product-category-boxed.html">Product Category Boxed</a></li>
                                                            <li><a href="product-category-fullwidth.html"><span>Product Category Fullwidth<span class="tip tip-new">New</span></span></a></li>
                                                        </ul>
                                                        <div class="menu-title">Shop Pages</div><!-- End .menu-title -->
                                                        <ul>
                                                            <li><a href="{{ route('cart.index') }}">Cart</a></li>
                                                            <li><a href="{{ route('checkout.index')  }}">Checkout</a></li>
                                                            <li><a href="{{ route('wishlist.index') }}">Wishlist</a></li>
                                                            <li><a href="dashboard.html">My Account</a></li>
                                                            <li><a href="#">Lookbook</a></li>
                                                        </ul>
                                                    </div><!-- End .col-md-6 -->
                                                </div><!-- End .row -->
                                            </div><!-- End .menu-col -->
                                        </div><!-- End .col-md-8 -->

                                        <div class="col-md-4">
                                            <div class="banner banner-overlay">
                                                <a href="category.html" class="banner banner-menu">
                                                    <img src="assets/images/menu/banner-1.jpg" alt="Banner">

                                                    <div class="banner-content banner-content-top">
                                                        <div class="banner-title text-white">Last <br>Chance<br><span><strong>Sale</strong></span></div><!-- End .banner-title -->
                                                    </div><!-- End .banner-content -->
                                                </a>
                                            </div><!-- End .banner banner-overlay -->
                                        </div><!-- End .col-md-4 -->
                                    </div><!-- End .row -->
                                </div><!-- End .megamenu megamenu-md -->
                                </li>
                                <li>
                                    <a href="product.html" class="sf-with-ul">Product</a>

                                    <div class="megamenu megamenu-sm">
                                        <div class="row no-gutters">
                                            <div class="col-md-6">
                                                <div class="menu-col">
                                                    <div class="menu-title">Product Details</div><!-- End .menu-title -->
                                                    <ul>
                                                        <li><a href="product.html">Default</a></li>
                                                        <li><a href="product-centered.html">Centered</a></li>
                                                        <li><a href="product-extended.html"><span>Extended Info<span class="tip tip-new">New</span></span></a></li>
                                                        <li><a href="product-gallery.html">Gallery</a></li>
                                                        <li><a href="product-sticky.html">Sticky Info</a></li>
                                                        <li><a href="product-sidebar.html">Boxed With Sidebar</a></li>
                                                        <li><a href="product-fullwidth.html">Full Width</a></li>
                                                        <li><a href="product-masonry.html">Masonry Sticky Info</a></li>
                                                    </ul>
                                                </div><!-- End .menu-col -->
                                            </div><!-- End .col-md-6 -->

                                            <div class="col-md-6">
                                                <div class="banner banner-overlay">
                                                    <a href="category.html">
                                                        <img src="{{ asset('images/menu/banner-2.jpg') }}" alt="Banner">

                                                        <div class="banner-content banner-content-bottom">
                                                            <div class="banner-title text-white">New Trends<br><span><strong>spring 2019</strong></span></div><!-- End .banner-title -->
                                                        </div><!-- End .banner-content -->
                                                    </a>
                                                </div><!-- End .banner -->
                                            </div><!-- End .col-md-6 -->
                                        </div><!-- End .row -->
                                    </div><!-- End .megamenu megamenu-sm -->
                                </li>
                                <li>
                                    <a href="#" class="sf-with-ul">Pages</a>

                                    <ul>
                                        <li>
                                            <a href="about.html" class="sf-with-ul">About</a>

                                            <ul>
                                                <li><a href="about.html">About 01</a></li>
                                                <li><a href="about-2.html">About 02</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="contact.html" class="sf-with-ul">Contact</a>

                                            <ul>
                                                <li><a href="contact.html">Contact 01</a></li>
                                                <li><a href="contact-2.html">Contact 02</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="login.html">Login</a></li>
                                        <li><a href="faq.html">FAQs</a></li>
                                        <li><a href="404.html">Error 404</a></li>
                                        <li><a href="coming-soon.html">Coming Soon</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="blog.html" class="sf-with-ul">Blog</a>

                                    <ul>
                                        <li><a href="blog.html">Classic</a></li>
                                        <li><a href="blog-listing.html">Listing</a></li>
                                        <li>
                                            <a href="#">Grid</a>
                                            <ul>
                                                <li><a href="blog-grid-2cols.html">Grid 2 columns</a></li>
                                                <li><a href="blog-grid-3cols.html">Grid 3 columns</a></li>
                                                <li><a href="blog-grid-4cols.html">Grid 4 columns</a></li>
                                                <li><a href="blog-grid-sidebar.html">Grid sidebar</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#">Masonry</a>
                                            <ul>
                                                <li><a href="blog-masonry-2cols.html">Masonry 2 columns</a></li>
                                                <li><a href="blog-masonry-3cols.html">Masonry 3 columns</a></li>
                                                <li><a href="blog-masonry-4cols.html">Masonry 4 columns</a></li>
                                                <li><a href="blog-masonry-sidebar.html">Masonry sidebar</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#">Mask</a>
                                            <ul>
                                                <li><a href="blog-mask-grid.html">Blog mask grid</a></li>
                                                <li><a href="blog-mask-masonry.html">Blog mask masonry</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#">Single Post</a>
                                            <ul>
                                                <li><a href="single.html">Default with sidebar</a></li>
                                                <li><a href="single-fullwidth.html">Fullwidth no sidebar</a></li>
                                                <li><a href="single-fullwidth-sidebar.html">Fullwidth with sidebar</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="elements-list.html" class="sf-with-ul">Elements</a>

                                    <ul>
                                        <li><a href="elements-products.html">Products</a></li>
                                        <li><a href="elements-typography.html">Typography</a></li>
                                        <li><a href="elements-titles.html">Titles</a></li>
                                        <li><a href="elements-banners.html">Banners</a></li>
                                        <li><a href="elements-product-category.html">Product Category</a></li>
                                        <li><a href="elements-video-banners.html">Video Banners</a></li>
                                        <li><a href="elements-buttons.html">Buttons</a></li>
                                        <li><a href="elements-accordions.html">Accordions</a></li>
                                        <li><a href="elements-tabs.html">Tabs</a></li>
                                        <li><a href="elements-testimonials.html">Testimonials</a></li>
                                        <li><a href="elements-blog-posts.html">Blog Posts</a></li>
                                        <li><a href="elements-portfolio.html">Portfolio</a></li>
                                        <li><a href="elements-cta.html">Call to Action</a></li>
                                        <li><a href="elements-icon-boxes.html">Icon Boxes</a></li>
                                    </ul>
                                </li>
                            </ul><!-- End .menu -->
                        </nav><!-- End .main-nav -->
                    </div><!-- End .col-lg-9 -->
                    <div class="header-right">
                        <i class="la la-lightbulb-o"></i><p>Clearance Up to 30% Off</span></p>
                    </div>
                </div>
            </div><!-- End .header-bottom -->
        </header><!-- End .header -->