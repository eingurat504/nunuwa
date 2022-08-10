@extends('layouts.admin.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <h6 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Create</h6>

  <div class="row">
      <div class="col-md-12">
          @include('flash::message')
      </div>
  </div>
  <div class="col-md-6">
    <div class="card">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="card-title m-0 me-2">Coupon Code</h5>
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
        </div>
      </div>
      <div class="card-body">
          <form method="POST" action="{{ route('admin.coupon_codes.store') }}">
                  
                {{ csrf_field() }}

                <div class="row">
                  <div class="mb-3 col-md-12">
                    <label for="code" class="form-label">Coupon Code</label>
                    <input class="form-control" type="text" id="code" name="code" value="{{ old('code') }}"/>
                  </div>
                  <div class="mb-3 col-md-12">
                    <label for="type" class="form-label">Type</label>
                    <input class="form-control" type="text" id="type" name="type" value="{{ old('type') }}"/>
                  </div>
                  <div class="mb-3 col-md-12">
                    <label for="value" class="form-label">Value</label>
                    <input class="form-control" type="text" id="value" name="value" value="{{ old('value') }}"/>
                  </div>
                  <div class="mt-2">
                    <button type="submit" class="btn btn-primary me-2">Save</button>
                    <a href="{{ route('admin.coupon_codes.index') }}" class="btn btn-outline-secondary">Cancel</a>
                  </div>
                </div>
            </form>
            
      </div>
    </div>
  </div>

  <div class="content-backdrop fade"></div>
</div>
@endsection