@extends('layouts.admin.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
   <h6 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><a href="{{ route('admin.dashboard') }}">Home</a> / <a href="{{ route('admin.category_types.index') }}">Category Type</a> /</span>{{$category_type->name }}</h6>

    <div class="row">
      <div class="col-md-6">
        <div class="card">
          <h5 class="card-header">Category Type</h5>
          <div class="card-body">
              <div class="row">
                <label class="col-md-4">Name</label>
                <label class="col-md-8">{{$category_type->name }}</label>
              </div>
              <div class="row">
                <label class="col-md-4">Description</label>
                <label class="col-md-8">{{$category_type->description }}</label>
              </div>
              <div class="row">
                <label class="col-md-4">Date created</label>
                <label class="col-md-8">{{$category_type->created_at }}</label>
              </div>
              <div class="row">
                <label class="col-md-4">Date Updated</label>
                <label class="col-md-8">{{$category_type->updated_at }}</label>
              </div>

              <div class="mt-2">
                <a href="{{ route('admin.category_types.edit', $category_type->id) }}" class="btn btn-primary me-2">Edit</a>
                <a href="{{ route('admin.category_types.index') }}" class="btn btn-outline-secondary">Cancel</a>
              </div>
        </div>  
      </div>
      </div>
    </div>
</div>
@endsection