@extends('layouts.admin.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h6 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><a href="{{ route('admin.dashboard') }}">Home</a> / <a href="{{ route('admin.coupon_codes.index') }}">coupons</a> /</span>{{$coupon->code }}</h6>

    <div class="row">
      <div class="col-md-6">

        <div class="card">
          <h5 class="card-header">Coupon</h5>

            <div class="card-body">
              <div class="row">
                  <label class="col-md-4">Code</label>
                  <label class="col-md-4">{{ $coupon->code }}</label>
              </div>
                
              <div class="row">
                <label class="col-md-4">Value</label>
                <label class="col-md-4">{{$coupon->value }}</label>
              </div>

              <div class="row">
                <label class="col-md-4">Percent Off</label>
                <label class="col-md-4">{{$coupon->percent_off }}</label>
              </div>

              <div class="row">
                <label class="col-md-4">Usable Times</label>
                <label class="col-md-4">{{$coupon->usable_times }}</label>
              </div>


              <div class="row">
                <label class="col-md-4">Expiry Date</label>
                <label class="col-md-4">{{$coupon->expires_at }}</label>
              </div>

              <div class="row">
                <label class="col-md-4">Created Date</label>
                <label class="col-md-4">{{$coupon->created_at }}</label>
              </div>

              <div class="row">
                <label class="col-md-4">Updated Date</label>
                <label class="col-md-4">{{$coupon->updated_at }}</label>
              </div>

              <div class="mt-2">
                <a href="{{ route('admin.coupon_codes.edit', $coupon->id) }}" class="btn btn-primary me-2">Edit</button>
                <a href="{{ route('admin.coupon_codes.index') }}" class="btn btn-outline-secondary">Cancel</a>
              </div>

            </div>  
          
        </div>
    </div>

    </div>

  <div class="content-backdrop fade"></div>
</div>
@endsection