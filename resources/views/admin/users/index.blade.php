@extends('layouts.master')

@section('title', 'Users')

@section('content')


<div class="container-fluid px-4">
    <h1 class="mt-4">Users</h1>

    <div class="card mt-4">
        <div class="card-header">
            <h4>View Users 
                <a href="{{ url('admin/add-users') }}" class="btn btn-primary btn-sm float-end">Add Users</a>
            
        </h4>
        </div>
        <div class="card-body">


        @if(session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>

        @endif

        <table class="table table-bordered" id="myDataTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created at</th>
                    <th>Role</th>
                    <th>Edit</th>
                    <th>Delete</th>

                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user['id'] }}</td>
                    <td>{{ $user['name'] }}</td>
                    <td>{{ $user['email'] }}</td>
                    <td>{{Carbon\Carbon::parse($user['created_at'])->format('Y-m-d') }}</td>

                    <td>{{ $user['role_as'] == '1' ? 'Admin':'Learner' }}</td>
                    <td>
                        <a href="{{ url('admin/edit-users/'.$user['id']) }}" class="btn btn-success">Edit</a>
                    </td>

                    <td>
                        <a href="{{ url('admin/delete-users/'.$user['id']) }}" class="btn btn-danger">Delete</a>
                    </td>


                </tr>
                @endforeach
            </tbody>
        </table>
        </div>

    </div>

</div>


@endsection