@extends('layouts.app')

@section('content')

<div class="container mt-4 mb-4 p-3 d-flex justify-content-center"> 
    <div class="card p-4"> 
        <div class=" image d-flex flex-column justify-content-center align-items-center"> 
            <button class="btn btn-secondary"> 
                @if(!empty(Auth::user()->image))
                <img src="{{ url('uploads/users/'.Auth::user()->image) }}" height="100" width="100" />
                @else
                <img style="width: 100px;" src="{{ url('uploads/tests/no-image.jpg') }}" alt="">
                @endif
            </button> 
                <span class="name mt-3">Username: {{ Auth::user()->name }}</span> 
                <span class="idd">Email: {{ Auth::user()->email }}</span> 
                <div class="d-flex flex-row justify-content-center align-items-center gap-2"> 
                    <span class="idd1">Role: {{ Auth::user()->role_as == '1' ? 'Admin' : 'Learner' }}</span> 
                    <span><i class="fa fa-copy"></i></span> 
                </div> 
    
            @if(Auth::user()->role_as == "1")
            <div class=" d-flex mt-2"> 
                <button class="btn1 btn-dark">
                    <a style="text-decoration: none;" href="{{ url('admin/users') }}">
                     <span >Edit Profile</span> 
                    </a>
                </button> 
            </div> 
            @endif

            <div class="gap-3 mt-3 icons d-flex flex-row justify-content-center align-items-center"> 
                <span><i class="fa fa-twitter"></i></span> 
                <span><i class="fa fa-facebook-f"></i></span> 
                <span><i class="fa fa-instagram"></i></span> 
                <span><i class="fa fa-linkedin"></i></span> 
            </div> 
            <div class=" px-2 rounded mt-4 date "> 
                <span class="join">{{ Auth::user()->created_at }}</span> 
            </div> 
        </div> 
    </div>
</div>
@endsection