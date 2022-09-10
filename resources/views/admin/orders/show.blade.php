@extends('layouts.admin.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
   <h6 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><a href="{{ route('admin.dashboard') }}">Home</a> / <a href="{{ route('admin.categories.index') }}">Categories</a> /</span>{{$category->name }}</h6>

    <div class="row">
      <div class="col-md-6">
        <div class="card">
          <h5 class="card-header">Category</h5>
          <div class="card-body">
              <div class="row">
                <label class="col-md-4">Name</label>
                <label class="col-md-8">{{$category->name }}</label>
              </div>
              <div class="row">
                <label class="col-md-4">Description</label>
                <label class="col-md-8">{{$category->description }}</label>
              </div>
              <div class="row">
                <label class="col-md-4">Date created</label>
                <label class="col-md-8">{{$category->created_at }}</label>
              </div>
              <div class="row">
                <label class="col-md-4">Date Updated</label>
                <label class="col-md-8">{{$category->updated_at }}</label>
              </div>

              <div class="mt-2">
                <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-primary me-2">Edit</a>
                <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-secondary">Cancel</a>
              </div>
        </div>  
      </div>
    
      </div>

      <div class="col-md-6">
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
</div>
@endsection