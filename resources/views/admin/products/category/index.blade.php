@extends('layouts.admin.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h6 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Home /</span> Categories</h6>

    <div class="row">
        <div class="col-md-12">
            @include('flash::message')
        </div>
    </div>

    <!-- Striped Rows -->
    <div class="card">
    <div class="card-header d-flex align-items-center justify-content-between">
      <h5 class="card-title m-0 me-2">Categories</h5>
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
          <a class="dropdown-item" href="{{ route('categories.create') }}">Create</a>
        </div>
      </div>
    </div>
      <div class="card-body">
        <div class="table-responsive text-nowrap">
        <table id="tbl_categories" class="table table-striped">
          <thead>
            <tr>
              <th>Name</th>
              <th>Created At</th>
              <th>Updated At</th>
              <th class="text-center">Actions</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            @foreach($categories as $category)
            <tr>
              <td><a href="{{ route('categories.show', $category->id) }}">{{$category->name }}</a></td>
              <td>{{$category->created_at }}</td>
              <td>{{$category->updated_at }}</td>
              <td class="text-center">
                <div class="dropdown">
                  <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                    <i class="bx bx-dots-vertical-rounded"></i>
                  </button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ route('categories.attached', $category->id) }}"
                            ><i class="bx bx-edit-alt me-2"></i> Attach Images</a
                    >
                    <a class="dropdown-item" href="{{ route('categories.edit', $category->id) }}"
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
    <!--/ Striped Rows -->

  <div class="content-backdrop fade"></div>
</div>
@endsection