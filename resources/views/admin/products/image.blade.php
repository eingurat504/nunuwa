@extends('layouts.admin.app')

@section('extra-css')
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet" />
    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/fonts/boxicons.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/demo.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
@endsection


@push('extra-js')
    <script src="{{ asset('admin/assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/js/menu.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
    <script src="{{ asset('admin/assets/js/main.js') }}"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="{{ asset('admin/assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script type="text/javascript">
    $(document).ready(function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('form#upload-product-images').on('submit', function (event) {

            event.preventDefault();

            var form = $(this);

            var product_id = form.find('input[name=product_id]').val();

            var fd = new FormData();
            var files = $('#product_images')[0].files;

            // https://makitweb.com/how-to-upload-image-file-using-ajax-and-jquery/
            // https://fellowtuts.com/php/ajax-image-upload-using-php-and-jquery/
      
            // Check file selected or not
            if(files.length > 0 ){

              fd.append('product_images',files[0]);

                var app = '{{ config('app.url') }}';

                console.log(app);

                $.ajax({
                    type: 'PUT',
                    url: app + '/admin/admin/product/' + product_id + '/attach',
                    data: fd,
                    contentType: false,
                    processData: false,   
                    success: function (response) {

                        // console.log(response);
                        // check if response has not errors; first then redirect...

                        window.location = app + '/admin/admin/product/'+ product_id +'/attached_images';
                        // else show error msg on modal
                    },
                    error: function (xhr) {
                        var errors = xhr.responseJSON;
                        $.each(errors, function (param, error) {
                            var form_group = form.find('input[name=' + param + '],select[name=' + param + ']').closest('div.form-group');
                            form_group.addClass('has-error');
                            var error_msg = '<span class="help-block">' + error[0] + '</span>';
                            if (form_group.find('.help-block')[0]) {
                                form.find('.help-block').remove();
                            }

                            form_group.find('.col-md-8').append(error_msg);
                        });
                    }
                });

            }

        });
    });
</script> 
@endpush

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    <h6 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"> <a href="{{ route('admin.categories.index') }}">Categories</a> /</span> {{$product->name }} <span class="text-muted fw-light"> / Attach</span> </h6>

  <div class="row">
    <div class="col-lg-12 mb-4 order-0">
                                      <!-- Striped Rows -->
      <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
          <h5 class="card-title m-0 me-2">{{ $product->name }}</h5>
          <div class="dropdown">
            <button
              class="btn p-0"
              type="button"
              id="transactionID"
              data-bs-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
            >
              <i class="bx bx-dots-vertical-rounded"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="transactionID">
              <a class="dropdown-item" href="{{ route('admin.products.create') }}" id="upload-product-images"   data-bs-toggle="modal"
              data-bs-target="#productfullscreenModal">Upload</a>
            </div>
          </div>
        </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="productfullscreenModal" tabindex="-1" aria-hidden="true">

    <form id="upload-product-images" method="POST" enctype="multipart/form-data">

          @method('PUT')
          @csrf

          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="modalFullTitle">{{ $product->name }}</h5>
                <button
                  type="button"
                  class="btn-close"
                  data-bs-dismiss="modal"
                  aria-label="Close"
                ></button>
              </div>
              <div class="modal-body">
                <p>
                  <input type="hidden" name="product_id" value="{{ $product->id  }}">
                </p> 
                <p>
                  <label for="product_images">Product image</label><br/>
                  <input class="form-control" type="file" id="product_images" id="product_images"
                    name="product_images" value="{{ old('product_images') }}" placeholder="product_images" />
                </p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                  Close
                </button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>

    </form>

  </div>    

  <div class="row">

    <div class="col-sm-6 col-lg-2 col-md-4 col-6 mb-4">
      <div class="card">
        <img class="card-img-top" src="{{ asset('admin/assets/img/elements/4.jpg') }}" alt="Card image cap">
      </div>
    </div>
    
  </div>

</div>

@endsection