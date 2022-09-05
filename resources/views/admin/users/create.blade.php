@extends('layouts.master')

@section('title', 'Add User')

@section('content')


<div class="container-fluid px-4">
    <h1 class="mt-4">Add User</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Users</li>
    </ol>


<div class="card mt-4">
    <div class="card-header">
        <h4>Add User</h4>
    </div>

    <div class="card-body">
        @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
            <div>{{ $error }}</div>
            @endforeach
        </div>
        @endif

    </div>

    <div class="card-header">
        <form action="{{ url('admin/add-users') }}" method="POST" enctype="multipart/form-data" >
            @csrf

            <div class="mb-3">
                <label for="">User Name</label>
                <input type="text" name="name" class="form-control">
            </div>

            <div class="mb-3">
                <label for="">User Email</label>
                <input type="email" name="email" class="form-control">
            </div>


            <div class="mb-3">
                <label for="">User Image</label>
                <input type="file" name="image" class="form-control">
            </div>


            <div class="mb-3">
                <label for="">User Password</label>
                <input type="password" name="password" class="form-control">
            </div>

            <!-- <h6>Status Mode</h6>
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label for="">Role</label>
                    <input type="checkbox" name="status">
                </div>
            </div> -->
            <div class="col-md-6">
                <button type="submit" class="btn btn-primary">Save User</button>
            </div>

        </form>

    </div>
</div>
</div>


@endsection