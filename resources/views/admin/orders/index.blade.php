@extends('layouts.admin.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <h6 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Orders</h6>

  <div class="row">
      <div class="col-md-12">
          @include('flash::message')
      </div>
  </div>

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
      </div>
    </div>
    <div class="card-body">
        <div class="table-responsive text-nowrap">
            <table id="tbl_products" class="table table-striped">
              <thead>
                <tr>
                  <td>Tracking No</td>
                  <th>Order Date</th>
                  <td>Promo code</td>
                  <td>User</td>
                  <th>Email Address</th>
                  <th>Billing Address</th>
                  <th>Status</th>
                  <th>Total</th>
                  <th class="text-center">Actions</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0">
                @foreach($orders as $order)
                <tr>
                  <td><a href="{{ route('admin.orders.show', $order->id) }}">{{ $order->tracking_no }}</a></td>
                  <td>{{ $order->order_date }}</td>
                  <td>{{ $order->promo_code }}</td>
                  <td>{{ $order->user->name }}</td>
                  <td>{{ $order->email }}</td>
                  <td>{{ $order->billing_address_1 }}</td>
                  <td>{{ $order->status }}</td>
                  <td>{{ $order->total }}</td>
                  <td class="text-center">
                    <div class="dropdown">
                      <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                        <i class="bx bx-dots-vertical-rounded"></i>
                      </button>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('admin.orders.edit', $order->id) }}"
                          ><i class="bx bx-edit-alt me-2"></i> Edit</a
                        >
                        <a class="dropdown-item" href="javascript:void(0);"
                          ><i class="bx bx-trash me-2"></i> Delete</a
                        >
                      </div>
                    </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
        </div>
    </div>
  </div>

<div class="content-backdrop fade"></div>
</div>
@endsection