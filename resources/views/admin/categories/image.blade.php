@extends('layouts.admin.app')

@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">

    <h6 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"> <a href="{{ route('admin.categories.index') }}">Categories</a> /</span> {{$category->name }} <span class="text-muted fw-light"> / Attach</span> </h6>

  <div class="row">
    <div class="col-lg-12 mb-4 order-0">
                                      <!-- Striped Rows -->
      <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
          <h5 class="card-title m-0 me-2">{{ $category->name }}</h5>
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
              data-bs-target="#categoryfullscreenModal">Upload</a>
            </div>
          </div>
        </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="categoryfullscreenModal" tabindex="-1" aria-hidden="true">

    <form id="upload-product-images" action="{{ route('admin.categories.attach',$category->id )}}" method="POST">

        {{ csrf_field() }}
        {{ method_field('POST') }}

        <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="modalFullTitle">{{ $category->name }}</h5>
                <button
                  type="button"
                  class="btn-close"
                  data-bs-dismiss="modal"
                  aria-label="Close"
                ></button>
              </div>
              <div class="modal-body">
                <p>
                  <input type="hidden" name="category_id" value="{{ $category->id  }}">
                </p> 
                <p>
                  <label for="category_images">Category image</label><br/>
                  <input class="form-control" type="file" id="category_images" id="category_images"
                    name="category_images" value="{{ old('category_images') }}" placeholder="category_images" />
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