@extends('layouts.admin.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <h6 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Coupon Codes/ {{ $coupon->code }} /Update</h6>

  <div class="row">
      <div class="col-md-12">
          @include('flash::message')
      </div>
  </div>
  <div class="col-md-6">
  <div class="card">
    <div class="card-header d-flex align-items-center justify-content-between">
      <h5 class="card-title m-0 me-2">Coupon Codes</h5>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.coupon_codes.update', $coupon->id) }}">
                
              {{ method_field('PUT') }}

              {{ csrf_field() }}

              <div class="row">
                  <div class="mb-3 col-md-12">
                    <label for="code" class="form-label">Coupon Code</label>
                    <input class="form-control" type="text" id="code" name="code" value="{{ old('code', $coupon->code) }}"/>
                  </div>
                  <div class="mb-3 col-md-12">
                    <label for="type" class="form-label">Type</label>
                    <input class="form-control" type="text" id="type" name="type" value="{{ old('type',  $coupon->type) }}"/>
                  </div>
                  <div class="mb-3 col-md-12">
                    <label for="value" class="form-label">Value</label>
                    <input class="form-control" type="text" id="value" name="value" value="{{ old('value',  $coupon->value) }}"/>
                  </div>
                  <div class="mb-3 col-md-12">
                    <label for="percent_off" class="form-label">Percent Off</label>
                    <input class="form-control" type="text" id="percent_off" name="percent_off" value="{{ old('percent_off',  $coupon->percent_off) }}"/>
                  </div>
                  <div class="mb-3 col-md-12">
                    <label for="expires_at" class="form-label">Expiry Date</label>
                    <input class="form-control" type="date" id="expires_at" name="expires_at" value="{{ old('expires_at', $coupon->expires_at) }}"/>
                  </div>
                  <div class="mb-3 col-md-12">
                    <label for="usable_times" class="form-label">Usable times</label>
                    <input class="form-control" type="number" id="usable_times" name="usable_times" value="{{ old('usable_times', $coupon->usable_times) }}"/>
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