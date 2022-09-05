@extends('layouts.master')

@section('title', 'Add Test')

@section('content')
<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>Add Tests
                <a href="{{ url('admin/add-test') }}" class="btn btn-primary">Add Test</a>
            </h4>
                
        </div>
        <div class="card-body">

        <div class="card-body">
            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

        </div>

        <form action="{{ url('admin/add-test') }}" method="POST" enctype="multipart/form-data" >
            @csrf

            <div class="mb-3">
                    <label for="">Course</label>
                    <select name="courses_id" class="form-control">
                        @foreach($courses as $course)
                            <option value="{{ $course['id'] }}">{{ $course['title'] }}</option>
                        @endforeach
                    </select>
            </div>

            <div class="mb-3">
                <label for="">Test Title</label>
                <input type="text" name="title" class="form-control">
            </div>

            <div class="mb-3">
                <label for="">Test Description</label>
                <textarea name="description"rows="3" id="your_summernote"  class="form-control"></textarea>
            </div>


            <div class="mb-3">
                <label for="">Test Image</label>
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
                <button type="submit" class="btn btn-primary">Save Test</button>
            </div>

        </form>

        </div>
    </div>    

</div>


@endsection