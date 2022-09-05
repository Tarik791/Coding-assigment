@extends('layouts.app')

@section('content')


<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-9">

                <div class="category-heading">
                    <h4>{{ $test->title }}</h4>
                </div>

                <div class="mt-3">
                    <h6>{{ $test->courses->title . ' / ' . $test->title }}</h6>
                </div>

                <div class="card card-shadow mt-4">
                    <div class="card-body">
                    {{ $test->description }}
                    </div>
                </div>

            </div>


                <div class="col-md-3">
                    <div class="border p-2">
                        <h4>Advertising Area</h4>

                    </div>
    


                    <div class="border p-2">
                        <h4>Advertising Area</h4>

                    </div>
    


                    <div class="border p-2">
                        <h4>Advertising Area</h4>

                    </div>
                    <div class="card mt-3">
                        <div class="card-header">
                            <h4>Latest Tests</h4>
                        </div>
                        <div class="card-body">
                            @foreach($latest_test as $latest_test_item)
                            <a href="{{ url('course/'.$latest_test_item->courses->title.'/'.$latest_test_item->title) }}" class="text-decoration-none">
                                <h6> > {{ $latest_test_item->title }} / {{ $latest_test_item->courses->title }} </h6>
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>

          
            <div class="your-paginate">

            </div>
        </div>
    </div>
</div>

@endsection
