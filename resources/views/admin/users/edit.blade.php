@extends('layouts.master')

@section('title', 'Edit User')

@section('content')


<div class="container-fluid px-4">
    <h1 class="mt-4">Edit User</h1>
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
        <form action="{{ url('admin/update-users/'.$users['id']) }}" method="POST" enctype="multipart/form-data" >
            @csrf

            @method('PUT')

            <div class="mb-3">
                <label for="">User Name</label>
                <input type="text" value="{{ $users['name'] }}" name="name" class="form-control">
            </div>

            <div class="mb-3">
                <label for="">User Email</label>
                <input type="email" value="{{ $users['email'] }}" name="email" class="form-control">
            </div>

            
            <div class="mb-3">
                <label for="">User Image</label>
                <input type="file" name="image" class="form-control">
                <br>
                <img style="width: 150px;" src="{{ asset('uploads/users/'.$users['image']) }}" alt="">
            </div>
            <div class="mb-3">
                <label for="">Ceated At</label>
                <br>
                <input type="text" value="{{ Carbon\Carbon::parse($users['created_at'])->format('d/m/Y') }}" readonly="">
            </div>
            <hr>

            <div class="mb-3">
                <label for="">Role as</label>
                <select name="role_as" class="form-control">
                    <option value="1"  {{ $users['role_as'] == '1' ? 'selected':'' }} >Admin</option>
                    <option value="0" {{ $users['role_as'] == '0' ? 'selected':'' }}>Learner</option>
                </select>
            </div>
            <!-- <h6>Status Mode</h6>
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label for="">Status</label>
                </div>
            </div> -->
            <div class="col-md-6">
                <button type="submit" class="btn btn-primary">Update Course</button>
            </div>

        </form>

    </div>
</div>
</div>


@endsection