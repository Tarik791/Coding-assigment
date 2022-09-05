@extends('layouts.app')

@section('content')



    <!-- Carousel Start -->
    <div class="container-fluid p-0 pb-5 mb-5">
        <div id="header-carousel" class="carousel slide carousel-fade" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#header-carousel" data-slide-to="0" class="active"></li>
                <li data-target="#header-carousel" data-slide-to="1"></li>
                <li data-target="#header-carousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active" style="min-height: 300px;">
                    <img class="position-relative w-100" src="{{ asset('assets/img/carousel-1.jpg')}}" style="min-height: 300px; object-fit: cover;">
                    <div class="carousel-caption d-flex align-items-center justify-content-center">
                        <div class="p-5" style="width: 100%; max-width: 900px;">
                            <h5 class="text-white text-uppercase mb-md-3">Best Online Courses</h5>
                            <h1 class="display-3 text-white mb-md-4">Best Education From Your Home</h1>
                            <a href="" class="btn btn-primary py-md-2 px-md-4 font-weight-semi-bold mt-2">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item" style="min-height: 300px;">
                    <img class="position-relative w-100" src="{{ asset('assets/img/carousel-2.jpg')}}" style="min-height: 300px; object-fit: cover;">
                    <div class="carousel-caption d-flex align-items-center justify-content-center">
                        <div class="p-5" style="width: 100%; max-width: 900px;">
                            <h5 class="text-white text-uppercase mb-md-3">Best Online Courses</h5>
                            <h1 class="display-3 text-white mb-md-4">Best Online Learning Platform</h1>
                            <a href="" class="btn btn-primary py-md-2 px-md-4 font-weight-semi-bold mt-2">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item" style="min-height: 300px;">
                    <img class="position-relative w-100" src="{{ asset('assets/img/carousel-3.jpg')}}" style="min-height: 300px; object-fit: cover;">
                    <div class="carousel-caption d-flex align-items-center justify-content-center">
                        <div class="p-5" style="width: 100%; max-width: 900px;">
                            <h5 class="text-white text-uppercase mb-md-3">Best Online Courses</h5>
                            <h1 class="display-3 text-white mb-md-4">New Way To Learn From Home</h1>
                            <a href="" class="btn btn-primary py-md-2 px-md-4 font-weight-semi-bold mt-2">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->

    <!-- Courses Start -->
    <div class="container-fluid py-4 ">
        <div class="container py-4">
            <div class="text-center mb-5">
                <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">Courses</h5>
                <h1>Our Popular Courses</h1>
            </div>


            <div class="row " style="display: flex; justify-content:center;">
                <div class="col-lg-4 col-md-6 mb-4 grid grid-cols-3 gap-3">
             
            @foreach($all_courses as $course)
                    <div class="rounded overflow-hidden mb-2">
                    <a class="h5 text-dark text-decoration-none" href="{{ url('course/'.$course['title']) }}">
                        <img class="img-fluid" src="{{ asset('uploads/courses/'.$course['image'])}}" alt="">
                        <div class="bg-secondary p-4">
                            <div class="d-flex justify-content-between mb-3">
                                <small class="m-0"><i class="fa fa-users text-primary mr-2"></i>{{ $course->created_at->format('d-m-Y') }}</small>
                                <small class="m-0"><i class="far fa-clock text-primary mr-2"></i>{{ $course->title }}</small>
                            </div>
                            
                            <div class="border-top mt-4 pt-4">
                                <div class="d-flex justify-content-between">
                                    <h5 class="m-0">Tests in this section: {{ $course->tests->count() }}</h5>
                                </div>
                            </div>
    
                        </div>
                    
                    </div>
                    </a>

                    @endforeach

                </div> 
            </div>
 
            <div class="your-pagination" style="display: flex; justify-content:center;">
                {{ $all_courses->links() }}
            </div>
        </div>
    </div>

    <div class="py-1 bg-gray">
        <div class="container">
            <div class="border p-3 text-center p-3">
                <h3>Advertise here</h3>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus consequatur labore optio vel ut! Cum laboriosam animi unde dignissimos sequi aperiam eius magnam in ea commodi. Dignissimos nisi esse quibusdam.
            </div>
        </div>

    </div>
    <div class="py-5 bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>All Courses List</h4>
                    <div class="underline">
                      
                    </div>
                    @foreach($all_courses_list as $course_list)
                        <div class="card card-body mb-3">
                                <a href="{{ url('course/'. $course_list->title) }}" class="text-decoration-none">
                            <h4 class="text-dark">{{ $course_list->title }}</h4>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Courses End -->



    <div class="py-5 bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>Latest Tests List</h4>
                    <div class="underline">
                      
                    </div>
                    <div class="col-md-8">
                    @foreach($latest_tests as $latest_test)
                        <div class="card card-body bg-gray shadow mb-3">
                                <a href="{{ url('course/'.$latest_test->courses->title.'/'. $latest_test->title) }}" class="text-decoration-none">
                            <h4 class="text-dark">{{ $latest_test->title }}</h4>
                           
                            <p>Course: {{ $latest_test->courses->title }}</p>
                            </a>
                            <h6>Poted On:  {{ $latest_test->created_at->format('d-m-Y') }}</h6>
                        </div>
                    @endforeach
                    </div>
            
                  
                </div>
            </div>
        </div>
    </div>
    <!-- Courses End -->

@endsection