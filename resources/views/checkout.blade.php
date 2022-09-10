@extends('layouts.app')

@section('content')
<div class="page-header text-center" style="background-image: url('{{ asset('images/page-header-bg.jpg') }}')">
        <div class="container">
            <h1 class="page-title">Checkout<span>Shop</span></h1>
        </div>
</div>
<nav aria-label="breadcrumb" class="breadcrumb-nav">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Shop</a></li>
            <li class="breadcrumb-item active" aria-current="page">Checkout</li>
        </ol>
    </div>
</nav>

<div class="page-content">

    <div class="row">
        <div class="col-md-12">
            @include('flash::message')
        </div>
    </div>

    <div class="checkout">
        <div class="container">
            <div class="checkout-discount">
                <form action="#">
                    <input type="text" class="form-control @error('billing_email') is-invalid @enderror" required id="checkout-discount-input">
                    <label for="checkout-discount-input" class="text-truncate">Have a coupon? <span>Click here to enter your code</span></label>
                </form>
            </div><!-- End .checkout-discount -->

            <form action="{{ route('checkout.store') }}" method="POST">

                @csrf

                <div class="row">
                    <div class="col-lg-9">
                        <h2 class="checkout-title">Billing Details</h2>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="billing_first_name">First Name *</label>
                                    <input type="text" name="billing_first_name" value="{{ old('billing_first_name') }}" class="form-control @error('billing_first_name') is-invalid @enderror @error('billing_first_name') is-invalid @enderror" required>
                                    @error('billing_first_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror   
                                </div>

                                <div class="col-sm-6">
                                    <label for="billing_last_name">Last Name *</label>
                                    <input type="text" name="billing_last_name" value="{{ old('billing_last_name') }}" class="form-control @error('billing_last_name') is-invalid @enderror @error('billing_last_name') is-invalid @enderror" required>
                                    @error('billing_last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror   
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <label>Company Name (Optional)</label>
                                    <input type="text" name="billing_company" value="{{ old('billing_company') }}" class="form-control @error('billing_company') is-invalid @enderror">
                                    @error('billing_company')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror  
                                </div>
                                <div class="col-sm-12">
                                    <label>Country *</label>
                                    <input type="text" name="billing_country" value="{{ old('billing_country') }}" class="form-control @error('billing_country') is-invalid @enderror" required>
                                    @error('billing_country')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror 
                                </div>
                                <div class="col-sm-12">
                                    <label>Street address *</label>
                                    <input type="text" class="form-control @error('billing_address_1') is-invalid @enderror" 
                                    name="billing_address_1" value="{{ old('billing_address_1') }}" placeholder="House number and Street name" required>
                                    <input type="text" class="form-control @error('billing_address_2v') is-invalid @enderror" 
                                    name="billing_address_2" value="{{ old('billing_address_2') }}" placeholder="Appartments, suite, unit etc ..." required>
                                    @error('billing_address_2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror 
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="billing_city">Town / City *</label>
                                    <input type="text" name="billing_city" value="{{ old('billing_city') }}" class="form-control @error('billing_city') is-invalid @enderror" required>
                                    @error('billing_city')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror  
                                </div>

                                <div class="col-sm-6">
                                    <label for="billing_state">State / County *</label>
                                    <input type="text" name="billing_state" value="{{ old('billing_state') }}" class="form-control @error('billing_state') is-invalid @enderror" required>
                                    @error('billing_state')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror   
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="billing_postalcode">Postcode / ZIP *</label>
                                    <input type="text" name="billing_postalcode" value="{{ old('billing_postalcode') }}" class="form-control @error('billing_postalcode') is-invalid @enderror" required>
                                    @error('billing_postalcode')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror   
                                </div>

                                <div class="col-sm-6">
                                    <label for="billing_phone">Phone *</label>
                                    <input type="tel" name="billing_phone" value="{{ old('billing_phone') }}" class="form-control @error('billing_phone') is-invalid @enderror" required>
                                    @error('billing_phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror   
                                </div>
                            </div>

                            <label for="billing_email">Email address *</label>
                            <input type="email" name="billing_email" value="{{ old('billing_email') }}" class="form-control @error('billing_email') is-invalid @enderror @error('billing_email') is-invalid @enderror" required>
                            @error('billing_email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror   

                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="checkout-create-acc">
                                <label class="custom-control-label" for="checkout-create-acc">Create an account?</label>
                            </div>

                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="checkout-diff-address">
                                <label class="custom-control-label" for="checkout-diff-address">Ship to a different address?</label>
                            </div>

                            <label>Order notes (optional)</label>
                            <textarea class="form-control @error('billing_email') is-invalid @enderror" cols="30" rows="4" placeholder="Notes about your order, e.g. special notes for delivery"></textarea>
                    </div><!-- End .col-lg-9 -->
                    <aside class="col-lg-3">
                        <div class="summary">
                            <h3 class="summary-title">Your Order</h3><!-- End .summary-title -->

                            <table class="table table-summary">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach (Cart::instance('default')->content() as $item)
                                <tr>
                                    <td><a href="#">{{ $item->model->name }}</a></td>
                                    <td>${{ $item->subtotal() }}</td>
                                </tr>
                                <tr class="summary-subtotal">
                                        <td>Subtotal:</td>
                                        <td>${{ Cart::instance('default')->subtotal() }}</td>
                                </tr><!-- End .summary-subtotal -->
                                <tr>
                                        <td>Tax ({{ config('cart.tax') }}%):</td>
                                        <td>${{ Cart::instance('default')->tax() }}</td>
                                    </tr>
                                    <tr class="summary-total">
                                        <td>Total:</td>
                                        <td>${{ Cart::instance('default')->total() }}</td>
                                    </tr><!-- End .summary-total -->
                                @endforeach
                                </tbody>
                            </table><!-- End .table table-summary -->

                            <div class="accordion-summary" id="accordion-payment">
                                <div class="card">
                                    <div class="card-header" id="heading-1">
                                        <h2 class="card-title">
                                            <a role="button" data-toggle="collapse" href="#collapse-1" aria-expanded="true" aria-controls="collapse-1">
                                                Direct bank transfer
                                            </a>
                                        </h2>
                                    </div><!-- End .card-header -->
                                    <div id="collapse-1" class="collapse show" aria-labelledby="heading-1" data-parent="#accordion-payment">
                                        <div class="card-body">
                                            Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.
                                        </div><!-- End .card-body -->
                                    </div><!-- End .collapse -->
                                </div><!-- End .card -->

                                <div class="card">
                                    <div class="card-header" id="heading-2">
                                        <h2 class="card-title">
                                            <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-2" aria-expanded="false" aria-controls="collapse-2">
                                                Check payments
                                            </a>
                                        </h2>
                                    </div><!-- End .card-header -->
                                    <div id="collapse-2" class="collapse" aria-labelledby="heading-2" data-parent="#accordion-payment">
                                        <div class="card-body">
                                            Ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. 
                                        </div><!-- End .card-body -->
                                    </div><!-- End .collapse -->
                                </div><!-- End .card -->

                                <div class="card">
                                    <div class="card-header" id="heading-3">
                                        <h2 class="card-title">
                                            <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-3" aria-expanded="false" aria-controls="collapse-3">
                                                Cash on delivery
                                            </a>
                                        </h2>
                                    </div><!-- End .card-header -->
                                    <div id="collapse-3" class="collapse" aria-labelledby="heading-3" data-parent="#accordion-payment">
                                        <div class="card-body">Quisque volutpat mattis eros. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. 
                                        </div><!-- End .card-body -->
                                    </div><!-- End .collapse -->
                                </div><!-- End .card -->

                                <div class="card">
                                    <div class="card-header" id="heading-4">
                                        <h2 class="card-title">
                                            <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-4" aria-expanded="false" aria-controls="collapse-4">
                                                PayPal <small class="float-right paypal-link">What is PayPal?</small>
                                            </a>
                                        </h2>
                                    </div><!-- End .card-header -->
                                    <div id="collapse-4" class="collapse" aria-labelledby="heading-4" data-parent="#accordion-payment">
                                        <div class="card-body">
                                            Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum.
                                        </div><!-- End .card-body -->
                                    </div><!-- End .collapse -->
                                </div><!-- End .card -->

                                <div class="card">
                                    <div class="card-header" id="heading-5">
                                        <h2 class="card-title">
                                            <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-5" aria-expanded="false" aria-controls="collapse-5">
                                                Credit Card (Stripe)
                                                <img src="{{ asset('images/payments-summary.png') }}" alt="payments cards">
                                            </a>
                                        </h2>
                                    </div><!-- End .card-header -->
                                    <div id="collapse-5" class="collapse" aria-labelledby="heading-5" data-parent="#accordion-payment">
                                        <div class="card-body"> Donec nec justo eget felis facilisis fermentum.Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Lorem ipsum dolor sit ame.
                                        </div><!-- End .card-body -->
                                    </div><!-- End .collapse -->
                                </div><!-- End .card -->
                            </div><!-- End .accordion -->

                            <a href="#signin-modal" class="btn btn-outline-primary-2 btn-order btn-block" data-toggle="modal">Proceed to Checkout</a>

                        </div><!-- End .summary -->
                    </aside><!-- End .col-lg-3 -->
                </div>
            </form>
        </div>
    </div><!-- End .checkout -->
</div>
{{--  Modal --}}
<div class="modal fade" id="signin-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="icon-close"></i></span>
                </button>

                <div class="form-box">
                    <div class="form-tab">
                        <ul class="nav nav-pills nav-fill" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="signin-tab" data-toggle="tab" href="#signin" role="tab" aria-controls="signin" aria-selected="true">Sign In</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="register-tab" data-toggle="tab" href="#register" role="tab" aria-controls="register" aria-selected="false">Register</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="tab-content-5">
                            <div class="tab-pane fade show active" id="signin" role="tabpanel" aria-labelledby="signin-tab">
                                <form action="{{ route('login') }}" method="POST">
                                        @csrf
                                    <div class="form-group">
                                        <label for="email">Username or email address *</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" id="singin-email" name="email" required>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="password">Password *</label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-footer">
                                        <button type="submit" class="btn btn-outline-primary-2">
                                            <span>LOG IN</span>
                                            <i class="icon-long-arrow-right"></i>
                                        </button>

                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="signin-remember">
                                            <label class="custom-control-label" for="signin-remember">Remember Me</label>
                                        </div><!-- End .custom-checkbox -->

                                        <a href="#" class="forgot-link">Forgot Your Password?</a>
                                    </div><!-- End .form-footer -->
                                </form>
                                <div class="form-choice">
                                    <p class="text-center">or sign in with</p>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <a href="#" class="btn btn-login btn-g">
                                                <i class="icon-google"></i>
                                                Login With Google
                                            </a>
                                        </div>
                                        <div class="col-sm-6">
                                            <a href="#" class="btn btn-login btn-f">
                                                <i class="icon-facebook-f"></i>
                                                Login With Facebook
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                                <form action="{{ route('register') }}" method="POST">
                                        @csrf
                                    <div class="form-group">
                                        <label for="name">Your name *</label>
                                        <input type="name" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Your email address *</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="password">Password *</label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="password">Confirm Password *</label>
                                        <input id="password-confirm" type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password_confirmation" required autocomplete="new-password">
                                        @error('password_confirmation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-footer">
                                        <button type="submit" class="btn btn-outline-primary-2">
                                            <span>SIGN UP</span>
                                            <i class="icon-long-arrow-right"></i>
                                        </button>

                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="register-policy" required>
                                            <label class="custom-control-label" for="register-policy">I agree to the <a href="#">privacy policy</a> *</label>
                                        </div><!-- End .custom-checkbox -->
                                    </div><!-- End .form-footer -->
                                </form>
                                <div class="form-choice">
                                    <p class="text-center">or sign in with</p>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <a href="#" class="btn btn-login btn-g">
                                                <i class="icon-google"></i>
                                                Login With Google
                                            </a>
                                        </div>
                                        <div class="col-sm-6">
                                            <a href="#" class="btn btn-login  btn-f">
                                                <i class="icon-facebook-f"></i>
                                                Login With Facebook
                                            </a>
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
@endsection