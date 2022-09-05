@extends('layouts.master')

@section('title', 'Courses')

@section('content')


<div class="container-fluid px-4">
    <h1 class="mt-4">Courses</h1>

    <div class="card mt-4">
        <div class="card-header">
            <h4>View Courses 
                <a href="{{ url('admin/add-courses') }}" class="btn btn-primary btn-sm float-end">Add Courses</a>
            
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
                    <th>Course Title</th>
                    <th>Description</th>
                    <th>Created</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($courses as $course)
                <tr>
                    <td>{{ $course['id'] }}</td>
                    <td>{{ $course['title'] }}</td>
                    <td>{{ $course['description'] }}</td>
                    <td>{{Carbon\Carbon::parse($course['created_at'])->format('Y-m-d') }}</td>

                    <td><img style="width: 200px;" src="{{ asset('uploads/courses/'.$course['image']) }}" alt=""></td>
                    <td>{{ $course['status'] == '1' ? 'Hidden':'Showen' }}</td>
                    <td>
                        <a href="{{ url('admin/edit-courses/'.$course['id']) }}" class="btn btn-success">Edit</a>
                    </td>

                    <td>
                        <a href="{{ url('admin/delete-courses/'.$course['id']) }}" class="btn btn-danger">Delete</a>
                    </td>


                </tr>
                @endforeach
            </tbody>
        </table>
        </div>

    </div>

</div>


@endsection