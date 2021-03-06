@extends('layouts.admin.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h6 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">
    <a href="{{ route('admin.category_types.index') }}">Category Types</a> /</span>{{ $type->name }} <span class="text-muted fw-light"> / Edit</span></h6>

  <div class="row">

    <div class="col-md-6">
      <div class="card mb-4">
        <h5 class="card-header">Default</h5>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.category_types.update' , $type->id) }}">

            {{ method_field('PUT') }}

            {{ csrf_field() }}

            <div class="row">
              <div class="mb-3 col-md-12">
                <label for="name" class="form-label">Name</label>
                <input class="form-control @error('name') is-invalid @enderror" type="text" id="name" name="name" value="{{ old('name', $type->name) }}"/>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror 
              </div>

              <div class="mb-3 col-md-12">
                <label for="category_id" class="form-label">Category</label>
                <select class="form-control @error('category_id') is-invalid @enderror" name="category_id">
                      <option value="">Choose category</option>
                      @foreach($categories as $category) 
                          <option value="{{ $category->id }}" {{ old('category_id', $type->category_id) == $category->id ? 'selected' : ''}}>{{ $category->name }}</option>
                      @endforeach
                </select>
                @error('category_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror 
              </div>

              <div class="mb-3 col-md-12">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" type="text" id="description" name="description" placeholder="description">{{ old('description', $type->description) }}</textarea>
                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror  
              </div>
            </div>
            <div class="mt-2">
              <button type="submit" class="btn btn-primary me-2">Save</button>
              <a href="{{ route('admin.category_types.index') }}" class="btn btn-outline-secondary">Cancel</a>
            </div>
          </form>
        </div>
      </div>
    </div>

  </div>

</div>
@endsection