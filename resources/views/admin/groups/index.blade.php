@extends('layouts.admin.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <h6 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"> <a href="{{ route('admin.dashboard') }}">Home</a> /</span> Option Groups</h6>

  <div class="row">
      <div class="col-md-12">
          @include('flash::message')
      </div>
  </div>

  <div class="card">
    <div class="card-header d-flex align-items-center justify-content-between">
      <h5 class="card-title m-0 me-2">option_groups</h5>
      <div class="dropdown">
        <button class="btn p-0" type="button" id="transactionID" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="bx bx-dots-vertical-rounded"></i>
        </button>
        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="transactionID">
          <a class="dropdown-item" href="{{ route('admin.option_groups.create') }}">Create Group</a>
        </div>
      </div>
    </div>
    <div class="card-body">
        <div class="table-responsive text-nowrap">
            <table id="tbl_products" class="table table-striped">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Created At</th>
                  <th>Updated At</th>
                  <th class="text-center">Actions</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0">
                @foreach($option_groups as $option_group)
                <tr>
                  <td><a href="{{ route('admin.option_groups.show', $option_group->id) }}">{{$option_group->name }}</a></td>
                  <td>{{ $option_group->created_at }}</td>
                  <td>{{ $option_group->updated_at }}</td>
                  <td class="text-center">
                    <div class="dropdown">
                      <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                        <i class="bx bx-dots-vertical-rounded"></i>
                      </button>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('admin.option_groups.edit', $option_group->id) }}"
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