@extends('layouts.admin.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h6 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">
    <a href="{{ route('admin.products.index') }}">Products</a> /</span> Create </h6>

  <div class="row">
    <div class="col-md-6">
      <div class="card mb-4">
        <h5 class="card-header">Default</h5>
        <div class="card-body">
          <form method="POST" action="{{ route('admin.products.store') }}">
            
              {{ csrf_field() }}

            <div class="row">
              <div class="mb-3 col-md-12">
                <label for="name" class="form-label">Name</label>
                <input class="form-control" type="text" id="name" name="name" value="{{ old('name') }}"/>
              </div>

              <div class="mb-3 col-md-12">
                <label for="organization" class="form-label">Category</label>
                <select class="form-control" id="category"
                    name="category" value="{{ old('category') }}">
                      <option value="">Choose category</option>
                      @foreach($categories as $category) 
                          <option value="{{ $category->id }}">{{ $category->name }}</option>
                      @endforeach
                </select>
              </div>
              <div class="mb-3 col-md-12">
                <label for="email" class="form-label">Price</label>
                <input class="form-control" type="integer" id="price"
                  name="price" value="{{ old('price') }}" placeholder="price" />

              </div>
              <div class="mb-3 col-md-12">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" type="text" id="description" name="description" placeholder="description">
                  {{ old('description') }}
                </textarea> 
              </div>
            </div>
            <div class="mt-2">
              <button type="submit" class="btn btn-primary me-2">Save</button>
              <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary">Cancel</a>
            </div>
          </form>
        </div>
      </div>
    </div>

  </div>

</div>
@endsection