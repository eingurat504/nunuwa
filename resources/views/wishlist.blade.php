@extends('layouts.app')

@section('content')
<div class="page-header text-center" style="background-image: url('{{ asset('images/page-header-bg.jpg') }}')">
    <div class="container">
        <h1 class="page-title">Wishlist<span>Shop</span></h1>
    </div><!-- End .container -->
</div>
<nav aria-label="breadcrumb" class="breadcrumb-nav">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Shop</a></li>
            <li class="breadcrumb-item active" aria-current="page">Wishlist</li>
        </ol>
    </div><!-- End .container -->
</nav><!-- End .breadcrumb-nav -->

<div class="page-content">
    <div class="container">
        <table class="table table-wishlist table-mobile">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <!-- <th>Stock Status</th> -->
                    <th></th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                @foreach($wishlists as $wishlist) 
                    <tr>
                        <td class="product-col">
                            <div class="product">
                                <figure class="product-media">
                                    <a href="#">
                                        <img src="{{ asset('images/products/table/product-3.jpg') }}" alt="Product image">
                                    </a>
                                </figure>

                                <h3 class="product-title">
                                    <a href="{{ route('products.show') }}">{{ $wishlist->product->name }}</a>
                                </h3>
                            </div>
                        </td>
                        <td class="price-col">{{ $wishlist->product->price }}</td>
                        <!-- <td class="stock-col"><span class="out-of-stock">Out of stock</span></td> -->
                        <!-- <td class="action-col">
                            <button class="btn btn-block btn-outline-primary-2 disabled">Out of Stock</button>
                        </td> -->
                        <td class="remove-col"><button class="btn-remove"><i class="icon-close"></i></button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="wishlist-share">
            <div class="social-icons social-icons-sm mb-2">
                <label class="social-label">Share on:</label>
                <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                <a href="#" class="social-icon" title="Youtube" target="_blank"><i class="icon-youtube"></i></a>
                <a href="#" class="social-icon" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
            </div><!-- End .soial-icons -->
        </div><!-- End .wishlist-share -->
    </div><!-- End .container -->
</div>
@endsection