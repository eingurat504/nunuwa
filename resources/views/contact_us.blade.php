@extends('layouts.app')

@section('content')
<div class="page-header text-center" style="background-image: url(' {{ asset('images/page-header-bg.jpg') }}') }}">
    <div class="container">
        <h1 class="page-title">Contact Us<span>Pages</span></h1>
    </div>
</div><!-- End .page-header -->
<nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Pages</a></li>
            <li class="breadcrumb-item active" aria-current="page">Contact us 2</li>
        </ol>
    </div>
</nav><!-- End .breadcrumb-nav -->

<div class="page-content">
    <div id="map" class="mb-5"></div><!-- End #map -->
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="contact-box text-center">
                    <h3>Office</h3>

                    <address>1 New York Plaza, New York, <br>NY 10004, USA</address>
                </div><!-- End .contact-box -->
            </div><!-- End .col-md-4 -->

            <div class="col-md-4">
                <div class="contact-box text-center">
                    <h3>Start a Conversation</h3>

                    <div><a href="mailto:#">info@Molla.com</a></div>
                    <div><a href="tel:#">+1 987-876-6543</a>, <a href="tel:#">+1 987-976-1234</a></div>
                </div><!-- End .contact-box -->
            </div><!-- End .col-md-4 -->

            <div class="col-md-4">
                <div class="contact-box text-center">
                    <h3>Social</h3>

                    <div class="social-icons social-icons-color justify-content-center">
                        <a href="#" class="social-icon social-facebook" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                        <a href="#" class="social-icon social-twitter" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                        <a href="#" class="social-icon social-instagram" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                        <a href="#" class="social-icon social-youtube" title="Youtube" target="_blank"><i class="icon-youtube"></i></a>
                        <a href="#" class="social-icon social-pinterest" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                    </div><!-- End .soial-icons -->
                </div><!-- End .contact-box -->
            </div><!-- End .col-md-4 -->
        </div>

        <hr class="mt-3 mb-5 mt-md-1">
        <div class="touch-container row justify-content-center">
            <div class="col-md-9 col-lg-7">
                <div class="text-center">
                <h2 class="title mb-1">Get In Touch</h2><!-- End .title mb-2 -->
                <p class="lead text-primary">
                    We collaborate with ambitious brands and people; we’d love to build something great together.
                </p><!-- End .lead text-primary -->
                <p class="mb-3">Vestibulum volutpat, lacus a ultrices sagittis, mi neque euismod dui, eu pulvinar nunc sapien ornare nisl. Phasellus pede arcu, dapibus eu, fermentum et, dapibus sed, urna.</p>
                </div>

                <form action="#" class="contact-form mb-2">
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="name" class="sr-only">Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Name *" required>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror  
                        </div><!-- End .col-sm-4 -->

                        <div class="col-sm-4">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Email *" required>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror  
                        </div><!-- End .col-sm-4 -->

                        <div class="col-sm-4">
                            <label for="phone" class="sr-only">Phone</label>
                            <input type="tel" name="phone" class="form-control @error('phone') is-invalid @enderror" id="phone" placeholder="Phone">
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror  
                        </div><!-- End .col-sm-4 -->
                    </div>

                    <div class="row">
                        <label for="subject" class="sr-only">Subject</label>
                        <input type="text" name="subject" class="form-control @error('subject') is-invalid @enderror" id="subject" placeholder="Subject">
                        @error('subject')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror  
                    </div>

                    <div class="row">
                        <label for="message" class="sr-only">Message</label>
                        <textarea class="form-control @error('message') is-invalid @enderror" name="message" cols="30" rows="4" id="message" required placeholder="Message *"></textarea>
                        @error('message')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror  
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-outline-primary-2 btn-minwidth-sm">
                            <span>SUBMIT</span>
                            <i class="icon-long-arrow-right"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection