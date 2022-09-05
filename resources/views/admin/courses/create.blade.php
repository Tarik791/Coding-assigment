@extends('layouts.master')

@section('title', 'Add Course')

@section('content')


<div class="container-fluid px-4">
    <h1 class="mt-4">Add Courses</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Courses</li>
    </ol>


<div class="card mt-4">
    <div class="card-header">
        <h4>Add Courses</h4>
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
        <form action="{{ url('admin/add-courses') }}" method="POST" enctype="multipart/form-data" >
            @csrf

            <div class="mb-3">
                <label for="">Course Title</label>
                <input type="text" name="title" class="form-control">
            </div>

            <div class="mb-3">
                <label for="">Course Description</label>
                <textarea id="your_summernote" name="description"rows="3" class="form-control"></textarea>
            </div>


            <div class="mb-3">
                <label for="">Course Image</label>
                <input type="file" name="image" class="form-control">
            </div>

            <h6>Status Mode</h6>
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label for="">Status</label>
                    <input type="checkbox" name="status">
                </div>
            </div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-primary">Save Course</button>
            </div>

        </form>

    </div>
</div>
</div>


@endsection