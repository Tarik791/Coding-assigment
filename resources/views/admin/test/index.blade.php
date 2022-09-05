@extends('layouts.master')

@section('title', 'View Test')

@section('content')
<div class="container-fluid px-4">
    <div class="card mt-4">

      

        <div class="card-header">
            <h4>View Test
                <a href="{{ url('admin/add-test') }}" class="btn btn-primary">Add Test</a>
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
                        <th>Courses</th>
                        <th>Test Title</th>
                        <th>Test Description</th>
                        <th>Test Image</th>
                        <th>Test Status</th>
                        <th>Test Created at</th>
                        <th>Edit</th>
                        <th>Delete</th>


                    </tr>
                </thead>
                <tbody>
                     @foreach($tests as $test)
                     <?php $product_image_path = 'uploads/tests/'.$test['image']; ?>

                    <tr>
                     <td>{{ $test['id'] }}</td>
                     <td>{{ $test->courses->title }}</td>
                     <td>{{ $test['title'] }}</td>
                     <td>{{ $test['description'] }}</td>
                     @if(!empty($test['image']) && file_exists($product_image_path))
                     <td><img style="width: 100px;" src="{{ asset('uploads/tests/'.$test['image']) }}" alt=""></td>

                     @else

                     <td><img style="width: 100px;" src="{{ asset('uploads/tests/no-image.jpg') }}"></td>

                     @endif
                     <td>{{ $test['status'] == '1' ? 'Hidden' : 'Visible' }}</td>
                     <td>{{Carbon\Carbon::parse($test['created_at'])->format('Y-m-d') }}</td>
                     
                     <td>
                        <a href="{{ url('admin/test/'.$test['id']) }}" class="btn btn-success">Edit</a>
                     </td>

                     <td>
                        <a href="{{ url('admin/delete-test/'.$test['id']) }}" class="btn btn-danger">Delete</a>
                     </td>
                     
                     </tr>

                     @endforeach
                     <div id="your-paginate">
{{$tests->links()}}
</div>

                </tbody>
            </table>
        </div>
    </div>    

</div>



@endsection

