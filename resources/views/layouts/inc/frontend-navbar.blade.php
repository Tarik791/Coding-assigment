<div class="global-navbar">


    <nav class="navbar navbar-expand-lg navbar-dark bg-green">
  <div class="container">
    @if(!empty(Auth::user()->name))
        <a class="nav-link" href="{{ url('profile/'.Auth::user()->id)}}"> <span style="color:black;">Click here to see your profile: </span> <br> <span style="color: #fff;"> {{ Auth::user()->name }} </span> <span style="color:#fff;">{{ Auth::user()->email }}</span>        
        <span style="color: #fff;">{{ Auth::user()->role_as == '1' ? 'Admin' : 'Learner' }}</span>
  </a>
    @endif
  <img style="width: 100px; height:100px; float:left;" src="{{ asset('assets/images/logo.svg') }}" class="w-100" alt="Logo">

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>


    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Home</a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li> -->
        <!-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul> 
        </li> -->
        @php
            $courses = App\Models\Courses::where('status', '0')->get()->toArray();

        @endphp
        @foreach($courses as $course)
        <li class="nav-item"> 
            <a href="{{ url('course/'.$course['title']) }}" class="nav-link">{{ $course['title'] }}</a>
        </li>

        @endforeach


        @if(!empty(Auth::user()->name))

        <li class="nav-item">
            <a class="nav-link"  href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
            </form>
        </li>    

        @else
        
        <li class="nav-item">
          <a href="{{ url('login') }}" class="nav-link">Login</a>
        </li>
        @endif

        

    

      </ul>

    </div>
  </div>
</nav>
</div>