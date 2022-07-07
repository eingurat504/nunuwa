@extends('layouts.admin.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h6 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><a href="{{ route('admin.dashboard') }}">Home</a> / <a href="{{ route('admin.products.index') }}">Products</a> /</span>{{ $option->name }}</h6>

    <div class="row">
      <div class="col-md-6">

        <div class="card">
          <h5 class="card-header">Product</h5>

            <div class="card-body">

              <div class="row">
                <label class="col-md-4">Name</label>
                <label class="col-md-4">{{ $option->name }}</label>
              </div>

              <div class="row">
                <label class="col-md-4">Group</label>
                <label class="col-md-4">${{ $option->i_option_group_id }}</label>
              </div>

              <div class="row">
                <label class="col-md-4">Created Date</label>
                <label class="col-md-4">{{$option->created_at }}</label>
              </div>

              <div class="row">
                <label class="col-md-4">Updated Date</label>
                <label class="col-md-4">{{$option->updated_at }}</label>
              </div>

              <div class="mt-2">
                <a href="{{ route('admin.product_options.edit', $option->id) }}" class="btn btn-primary me-2">Edit</button>
                <a href="{{ route('admin.product_options.index') }}" class="btn btn-outline-secondary">Cancel</a>
              </div>

            </div>  
          
        </div>
    </div>

    <div class="col-md-6">
                    <!-- Striped Rows -->
        <div class="card">
          <h5 class="card-header">Attachments</h5>
          <div class="card-body">
              <div class="row">

                <div class="col-sm-6 col-lg-2 col-md-4 col-6 mb-4">
                  <div class="card">
                    <img class="card-img-top" src="{{ asset('admin/assets/img/elements/4.jpg') }}" alt="Card image cap">
                  </div>
                </div>

                <div class="col-sm-6 col-lg-2 col-md-4 col-6 mb-4">
                  <div class="card">
                    <img class="card-img-top" src="{{ asset('admin/assets/img/elements/4.jpg') }}" alt="Card image cap">
                  </div>
                </div>

                <div class="col-sm-6 col-lg-2 col-md-4 col-6 mb-4">
                  <div class="card">
                    <img class="card-img-top" src="{{ asset('admin/assets/img/elements/4.jpg') }}" alt="Card image cap">
                  </div>
                </div>

                <div class="col-sm-6 col-lg-2 col-md-4 col-6 mb-4">
                  <div class="card">
                    <img class="card-img-top" src="{{ asset('admin/assets/img/elements/4.jpg') }}" alt="Card image cap">
                  </div>
                </div>

                <div class="col-sm-6 col-lg-2 col-md-4 col-6 mb-4">
                  <div class="card">
                    <img class="card-img-top" src="{{ asset('admin/assets/img/elements/4.jpg') }}" alt="Card image cap">
                  </div>
                </div>

                <div class="col-sm-6 col-lg-2 col-md-4 col-6 mb-4">
                  <div class="card">
                    <img class="card-img-top" src="{{ asset('admin/assets/img/elements/4.jpg') }}" alt="Card image cap">
                  </div>
                </div>

                <div class="col-sm-6 col-lg-2 col-md-4 col-6 mb-4">
                  <div class="card">
                    <img class="card-img-top" src="{{ asset('admin/assets/img/elements/4.jpg') }}" alt="Card image cap">
                  </div>
                </div>

                <div class="col-sm-6 col-lg-2 col-md-4 col-6 mb-4">
                  <div class="card">
                    <img class="card-img-top" src="{{ asset('admin/assets/img/elements/4.jpg') }}" alt="Card image cap">
                  </div>
                </div>

                <div class="col-sm-6 col-lg-2 col-md-4 col-6 mb-4">
                  <div class="card">
                    <img class="card-img-top" src="{{ asset('admin/assets/img/elements/4.jpg') }}" alt="Card image cap">
                  </div>
                </div>

                <div class="col-sm-6 col-lg-2 col-md-4 col-6 mb-4">
                  <div class="card">
                    <img class="card-img-top" src="{{ asset('admin/assets/img/elements/4.jpg') }}" alt="Card image cap">
                  </div>
                </div>

                <div class="col-sm-6 col-lg-2 col-md-4 col-6 mb-4">
                  <div class="card">
                    <img class="card-img-top" src="{{ asset('admin/assets/img/elements/4.jpg') }}" alt="Card image cap">
                  </div>
                </div>

                <div class="col-sm-6 col-lg-2 col-md-4 col-6 mb-4">
                  <div class="card">
                    <img class="card-img-top" src="{{ asset('admin/assets/img/elements/4.jpg') }}" alt="Card image cap">
                  </div>
                </div>

            </div>
          </div>
        </div>
    </div>

    </div>

  <div class="content-backdrop fade"></div>
</div>
@endsection