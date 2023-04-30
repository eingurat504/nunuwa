@extends('layouts.admin.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h6 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">
    <a href="{{ route('admin.dashboard') }}">Home</a> / <a href="{{ route('admin.products.index') }}">Products</a> /</span> Create </h6>

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
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror 
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
                @error('category')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror 
              </div>

              <div class="mb-3 col-md-12">
                <label for="category_type" class="form-label">Category Type</label>
                <select class="form-control" id="category_type"
                    name="category_type" value="{{ old('category_type') }}">
                      <option value="">Choose category_type</option>
                      @foreach($categories as $category_type) 
                          <option value="{{ $category_type->id }}">{{ $category_type->name }}</option>
                      @endforeach
                </select>
                @error('category_type')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror 
              </div>

              <div class="mb-3 col-md-12">
                <label for="organization" class="form-label">Brand</label>
                <select class="form-control" id="brand"
                    name="brand" value="{{ old('brand') }}">
                      <option value="">Choose brand</option>
                      @foreach($brands as $brand) 
                          <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                      @endforeach
                </select>
                @error('brand')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror 
              </div>

              <div class="mb-3 col-md-12">
                <label for="stock" class="form-label">Stock Available</label>
                <input class="form-control" type="integer" id="stock"
                  name="stock" value="{{ old('stock') }}" placeholder="stock" />
                @error('stock')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror 

              </div>
              <div class="mb-3 col-md-12">
                <label for="regular_price" class="form-label">Regular Price</label>
                <input class="form-control" type="integer" id="regular_price"
                  name="regular_price" value="{{ old('regular_price') }}" placeholder="regular_price" />
                @error('regular_price')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror 
              </div>
              <div class="mb-3 col-md-12">
                <label for="sale_price" class="form-label">Sale Price</label>
                <input class="form-control" type="integer" id="sale_price"
                  name="sale_price" value="{{ old('sale_price') }}" placeholder="sale_price" />
                @error('sale_price')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror 
              </div>
              <div class="mb-3 col-md-12">
                <label for="option" class="form-label">Product Option</label>
                <input class="form-control" type="integer" id="option"
                  name="stock" value="{{ old('option') }}" placeholder="option" />
                @error('option')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror 
              </div>
              <div class="mb-3 col-md-12">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" type="text" id="description" name="description" placeholder="description">
                  {{ old('description') }}
                </textarea>
                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror  
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