@extends('layouts.admin.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h6 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">
    <a href="{{ route('admin.dashboard') }}">Home</a> / <a href="{{ route('admin.products.index') }}">Products</a> /</span>{{$product->name }} <span class="text-muted fw-light"> / Edit</span></h6>

  <div class="row">
    <div class="col-md-6">
      <div class="card mb-4">
        <h5 class="card-header">Default</h5>
        <div class="card-body">
          <form method="POST" action="{{ route('admin.products.update', $product->id) }}">

            {{ method_field('PUT') }}

            {{ csrf_field() }}

            <div class="row">
              <div class="mb-3 col-md-12">
                <label for="name" class="form-label">Name</label>
                <input class="form-control" type="text" id="name" name="name" value="{{ old('name', $product->name) }}"/>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror 
              </div>

              <div class="mb-3 col-md-12">
                <label for="organization" class="form-label">Brand</label>
                <select class="form-control" id="brand" name="brand">
                      <option value="">Choose brand</option>
                      @foreach($categories as $brand) 
                          <option value="{{ $brand->id }}" {{ old('brand', $product->brand_id) == $brand->id  ? 'selected' : ''}}>{{ $brand->name }}</option>
                      @endforeach
                </select>
                @error('brand')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror 
              </div>

              <div class="mb-3 col-md-12">
                <label for="organization" class="form-label">Category</label>
                <select class="form-control" id="category" name="category">
                      <option value="">Choose category</option>
                      @foreach($categories as $category) 
                          <option value="{{ $category->id }}" {{ old('category', $product->category_id) == $category->id  ? 'selected' : ''}}>{{ $category->name }}</option>
                      @endforeach
                </select>
                @error('category')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror 
              </div>

              <div class="mb-3 col-md-12">
                <label for="email" class="form-label">Price</label>
                <input class="form-control" type="integer" id="price"
                  name="price" value="{{ old('price', $product->price) }}" placeholder="price" />
                @error('price')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror 

              </div>
              <div class="mb-3 col-md-12">
                <label for="state" class="form-label">Description</label>
                <textarea class="form-control" type="text" id="description" name="description" placeholder="description" required="true">{{ old('description', $product->description) }}</textarea>
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

