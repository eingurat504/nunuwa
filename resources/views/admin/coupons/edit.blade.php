@extends('layouts.admin.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <h6 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Orders/ {{ $order->tracking_no }}</h6>

  <div class="row">
      <div class="col-md-12">
          @include('flash::message')
      </div>
  </div>
  <div class="col-md-6">
  <div class="card">
    <div class="card-header d-flex align-items-center justify-content-between">
      <h5 class="card-title m-0 me-2">Orders</h5>
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
          <a class="dropdown-item" href="{{ route('admin.coupons.update', $coupon->id) }}">Create Product</a>
        </div>
      </div>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.coupons.update', $coupon->id) }}">
                
              {{ method_field('PUT') }}

              {{ csrf_field() }}

              <div class="row">
                <div class="mb-3 col-md-12">
                  <label for="name" class="form-label">Tracking Number</label>
                  <input class="form-control" type="text" id="name" name="name" value="{{ old('name', $order->tracking_no) }}"/>
                </div>
              <div class="mt-2">
                <button type="submit" class="btn btn-primary me-2">Save</button>
                <a href="{{ route('admin.coupons.index') }}" class="btn btn-outline-secondary">Cancel</a>
              </div>
            </form>
          
        </div>
  </div>
  </div>

<div class="content-backdrop fade"></div>
</div>
@endsection