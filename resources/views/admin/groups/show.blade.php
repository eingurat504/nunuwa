@extends('layouts.admin.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h6 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"><a href="{{ route('admin.groups.index') }}">groups</a> /</span>{{$group->name }}</h6>

    <div class="row">
      <div class="col-md-6">

        <div class="card">
          <h5 class="card-header">Otion Group</h5>

            <div class="card-body">
              <div class="row">
                <label class="col-md-4">Name</label>
                <label class="col-md-4">{{ $group->name }}</label>
              </div>

              <div class="row">
                <label class="col-md-4">Price</label>
                <label class="col-md-4">${{$group->price }}</label>
              </div>

              <div class="row">
                <label class="col-md-4">Created Date</label>
                <label class="col-md-4">{{$group->created_at }}</label>
              </div>

              <div class="row">
                <label class="col-md-4">Updated Date</label>
                <label class="col-md-4">{{$group->updated_at }}</label>
              </div>

              <div class="mt-2">
                <a href="{{ route('admin.groups.edit', $group->id) }}" class="btn btn-primary me-2">Edit</button>
                <a href="{{ route('admin.groups.index') }}" class="btn btn-outline-secondary">Cancel</a>
              </div>

            </div>  
          
        </div>
    </div>

    </div>

  <div class="content-backdrop fade"></div>
</div>
@endsection