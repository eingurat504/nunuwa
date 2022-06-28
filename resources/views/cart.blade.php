@extends('layouts.app')

@section('content')
<div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
    <div class="container">
        <h1 class="page-title">Shopping<span>Cart</span></h1>
    </div>
</div>

<nav aria-label="breadcrumb" class="breadcrumb-nav">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Shop</a></li>
            <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
        </ol>
    </div>
</nav>

    <div class="page-content">
        <div class="cart">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <table class="table table-cart table-mobile">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach (Cart::instance('default')->content() as $item)
                                <tr>
                                        <td class="product-col">
                                            <div class="product">
                                                <figure class="product-media">
                                                    <a href="#">
                                                        <img src="{{ asset('images/products/table/product-1.jpg') }}" alt="Product image">
                                                    </a>
                                                </figure>

                                                <h3 class="product-title">
                                                    <a href="{{ route('products.show', $item->id) }}">{{ $item->model->name }}</a>
                                                </h3>
                                            </div>
                                        </td>
                                        <td class="price-col">${{ $item->subtotal() }}</td>
                                        <td class="quantity-col">
                                            <div class="cart-product-quantity">
                                                <input type="number" class="form-control" value="{{ $item->qty }}" min="1" max="10" step="1" data-decimals="0" required>
                                            </div>
                                            <!-- <div class="border d-flex align-items-center justify-content-between px-3">
                                                <div class="quantity">
                                                    <button class="dec-btn p-0" data-row-id="{{ $item->rowId }}">
                                                        <i class="fas fa-caret-left"></i>
                                                    </button>
                                                    <input class="form-control form-control-sm border-0 shadow-0 p-0 bg-transparent"
                                                        type="text" value="{{ $item->qty }}" readonly/>
                                                    <button class="inc-btn p-0" data-row-id="{{ $item->rowId }}">
                                                        <i class="fas fa-caret-right"></i>
                                                    </button>
                                                </div>
                                            </div> -->
                                        </td>
                                        <td class="total-col">${{ $item->subtotal() }}</td>
                                        <td class="remove-col">
                                            <form action="{{ route('cart.destroy', $item->rowId) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="btn-remove"><i class="icon-close"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="cart-bottom">
                            <div class="cart-discount">
                                <form action="#">
                                    <div class="input-group">
                                        <input type="text" class="form-control" required placeholder="coupon code">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-primary-2" type="submit"><i class="icon-long-arrow-right"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <a href="#" class="btn btn-outline-dark-2"><span>UPDATE CART</span><i class="icon-refresh"></i></a>
                        </div>
                    </div>
                    <aside class="col-lg-3">
                        <div class="summary summary-cart">
                            <h3 class="summary-title">Cart Total</h3>

                            <table class="table table-summary">
                                <tbody>
                                    <tr class="summary-subtotal">
                                        <td>Subtotal:</td>
                                        <td>${{ Cart::instance('default')->subtotal() }}</td>
                                    </tr>
                                    <tr class="summary-shipping">
                                        <td>Shipping:</td>
                                        <td>&nbsp;</td>
                                    </tr>

                                    <!-- <tr class="summary-shipping-row">
                                        <td>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="free-shipping" name="shipping" class="custom-control-input">
                                                <label class="custom-control-label" for="free-shipping">Free Shipping</label>
                                            </div>
                                        </td>
                                        <td>$0.00</td>
                                    </tr>

                                    <tr class="summary-shipping-row">
                                        <td>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="standart-shipping" name="shipping" class="custom-control-input">
                                                <label class="custom-control-label" for="standart-shipping">Standart:</label>
                                            </div>
                                        </td>
                                        <td>$10.00</td>
                                    </tr> -->

                                    <tr class="summary-shipping-row">
                                        <td>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="express-shipping" name="shipping" class="custom-control-input">
                                                <label class="custom-control-label" for="express-shipping">Tax ({{ config('cart.tax') }}%):</label>
                                            </div>
                                        </td>
                                        <td>${{ Cart::instance('default')->tax() }}</td>
                                    </tr>

                                    <!-- <tr class="summary-shipping-estimate">
                                        <td>Estimate for Your Country<br> <a href="dashboard.html">Change address</a></td>
                                        <td>&nbsp;</td>
                                    </tr> -->

                                    <tr class="summary-total">
                                        <td>Total:</td>
                                        <td>${{ Cart::instance('default')->total() }}</td>
                                    </tr>
                                </tbody>
                            </table>

                            <a href="checkout.html" class="btn btn-outline-primary-2 btn-order btn-block">PROCEED TO CHECKOUT</a>
                        </div>

                        <a href="{{ route('home.index') }}" class="btn btn-outline-dark-2 btn-block mb-3"><span>CONTINUE SHOPPING</span><i class="icon-refresh"></i></a>
                    </aside>
                </div>
            </div>
        </div>
    </div>
@endsection