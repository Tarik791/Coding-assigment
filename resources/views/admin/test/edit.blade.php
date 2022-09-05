@extends('layouts.master')

@section('title', 'Edit Test')

@section('content')
<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>Edit Tests
                <a href="{{ url('admin/tests') }}" class="btn btn-primary">BACK</a>
            </h4>
                
        </div>
        <div class="card-body">

            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif


        <form action="{{ url('admin/update-test/'.$test['id']) }}" method="POST" enctype="multipart/form-data" >
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="">Courses</label>
                <select name="courses_id" required class="form-control">
                    <option value="">-- Select Course --</option>
                    @foreach($courses as $course)
                    <option value="{{ $course['id'] }}" {{ $test['courses_id'] == $course['id'] ? 'selected' : '' }}>{{ $course['title'] }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="">Test Title</label>
                <input type="text" name="title" value="{{ $test['title']}}" class="form-control">
            </div>

            <div class="mb-3">
                <label for="">Test Description</label>
                <textarea name="description"rows="3" id="your_summernote"  class="form-control">{{ $test['description'] }}</textarea>
            </div>


            <div class="mb-3">
                <label for="">Test Image</label>
                <input type="file" name="image" class="form-control">
                <br>
                <img style="width: 100px;" src="{{ asset('uploads/tests/'.$test['image']) }}" alt="">
            </div>
    <hr>

    <div class="mb-3">
                <label for="">Ceated At</label>
                <br>
                <input type="text" value="{{ Carbon\Carbon::parse($test['created_at'])->format('d/m/Y') }}" readonly="">
            </div>

            
            <h6>Status Mode</h6>
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label for="">Status</label>
                    <input type="checkbox" {{ $test['status'] == '1' ? 'checked' : '' }} name="status">
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