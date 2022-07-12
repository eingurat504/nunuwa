@extends('layouts.admin.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h6 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">
    <a href="{{ route('admin.dashboard') }}">Home</a> / <a href="{{ route('admin.product_options.index') }}">Options</a> /</span>{{ $product_option->name }} 
    <span class="text-muted fw-light"> / Edit</span></h6>

  <div class="row">
    <div class="col-md-6">
      <div class="card mb-4">
        <h5 class="card-header">Default</h5>
        <div class="card-body">
          <form method="POST" action="{{ route('admin.product_options.update',  $product_option->id) }}">

            {{ method_field('PUT') }}

            {{ csrf_field() }}

            <div class="row">
              <div class="mb-3 col-md-12">
                <label for="name" class="form-label">Name</label>
                <input class="form-control @error('name') is-invalid @enderror" type="text" id="name" name="name" value="{{ old('name',  $product_option->name) }}"/>
                @error('name')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror
              </div>

              <div class="mb-3 col-md-12">
                <label for="option_group" class="form-label">Group</label>
                <select class="form-control @error('option_group') is-invalid @enderror" id="option_group"
                    name="option_group" value="{{ old('option_group') }}">
                      <option value="">Choose option group</option>
                      @foreach($groups as $group) 
                          <option value="{{ $group->id }}">{{ $group->name }}</option>
                      @endforeach
                </select>
                @error('option_group')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror
              </div>
              <div class="mb-3 col-md-12">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" type="text" id="description" name="description" placeholder="description">
                  {{ old('description', $product_option->description) }}
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

