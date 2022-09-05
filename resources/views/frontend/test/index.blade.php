@extends('layouts.app')

@section('content')


<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-9">

                <div class="category-heading">
                    <h4>{{ $courses->title }}</h4>
                </div>



            @forelse ($test as $item)
                <div class="card card-shadow mt-4">
                    <div class="card-body">
                        <a href="{{ url('course/'.$courses->title.'/'.$item->title) }}" class="text-decoration-none">
                            <h2 class="post-heading"> {{ $item->title }} </h2>
                        </a>
                        <h6>Posted On: {{ $item->created_at->format('d-m-Y') }}</h6>
                        <span class="ms-3">Posted By: {{ $item->user->name }}</span>
                        </h6>
                    </div>
                </div>
                
         
            @empty  
            <div class="col-md-3">
                <div class="border p-2">
                    <h4>Advertising Area</h4>

                </div>
            </div>
            @endforelse
            <div class="your-paginate">
                    {{ $test->links() }}
                </div>
        </div>
    </div>
</div>

@endsection