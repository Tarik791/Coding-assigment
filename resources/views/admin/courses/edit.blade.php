@extends('layouts.master')

@section('title', 'Edit Course')

@section('content')


<div class="container-fluid px-4">
    <h1 class="mt-4">Edit Courses</h1>
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
        <form action="{{ url('admin/update-courses/'.$courses['id']) }}" method="POST" enctype="multipart/form-data" >
            @csrf

            @method('PUT')

            <div class="mb-3">
                <label for="">Course Title</label>
                <input type="text" value="{{ $courses['title'] }}" name="title" class="form-control">
            </div>

            <div class="mb-3">
                <label for="">Course Description</label>
                <textarea name="description"rows="3" id="your_summernote"  class="form-control">{{ $courses['description'] }}</textarea>
            </div>

            <div class="mb-3">
                <label for="">Course Image</label>
                <input type="file" name="image" class="form-control">
                <br>
                <img style="width: 150px;" src="{{ asset('uploads/courses/'.$courses['image']) }}" alt="">
            </div>
            <hr>

            <div class="mb-3">
                <label for="">Ceated At</label>
                <br>
                <input type="text" value="{{ Carbon\Carbon::parse($courses['created_at'])->format('d/m/Y') }}" readonly="">
            </div>

            
            <h6>Status Mode</h6>
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label for="">Status</label>
                    <input type="checkbox" {{ $courses['status'] == '1' ? 'checked':'' }} name="status">
                </div>
            </div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-primary">Update Course</button>
            </div>

        </form>

    </div>
</div>
</div>


@endsection