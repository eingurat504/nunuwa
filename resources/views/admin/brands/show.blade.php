@extends('layouts.admin.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
   <h6 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><a href="{{ route('admin.dashboard') }}">Home</a> / <a href="{{ route('admin.brands.index') }}">Brands</a> /</span>{{ $brand->name }}</h6>

    <div class="row">
      <div class="col-md-6">
        <div class="card">
          <h5 class="card-header">brand</h5>
          <div class="card-body">
              <div class="row">
                <label class="col-md-4">Name</label>
                <label class="col-md-8">{{ $brand->name }}</label>
              </div>
              <div class="row">
                <label class="col-md-4">Description</label>
                <label class="col-md-8">{{ $brand->description }}</label>
              </div>
              <div class="row">
                <label class="col-md-4">Date created</label>
                <label class="col-md-8">{{ $brand->created_at }}</label>
              </div>
              <div class="row">
                <label class="col-md-4">Date Updated</label>
                <label class="col-md-8">{{ $brand->updated_at }}</label>
              </div>

              <div class="mt-2">
                <a href="{{ route('admin.brands.edit',  $brand->id) }}" class="btn btn-primary me-2">Edit</a>
                <a href="{{ route('admin.brands.index') }}" class="btn btn-outline-secondary">Cancel</a>
              </div>
        </div>  
      </div>
    
      </div>

    </div>
</div>
@endsection