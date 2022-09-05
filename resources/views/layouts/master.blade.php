<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/jquery.dataTables.min.css') }}">
    <!-- Scripts -->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

        <!-- Customized Bootstrap Stylesheet -->
        <link href="{{ asset('assets/css/style.css')}}" rel="stylesheet">
</head>
<body>

    @include('layouts.inc.admin-navbar')

<div id="layoutSidenav">

    @include('layouts.inc.admin-sidebar')

    <div id="layoutSidenav_content">
        <main>

            @yield('content')
        
        </main>

        @include('layouts.inc.admin-footer')
    </div>
</div>


<script src="{{ asset('assets/js/script.js') }}" ></script>



<!-- Summernote JS - CDN Link -->
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}" ></script>
<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}" ></script>
<script src="{{ asset('assets/js/summernote-lite.min.js') }}" ></script>
    <script>
        $(document).ready(function() {
            $("#your_summernote").summernote({
                height: 150,
            });
            $('.dropdown-toggle').dropdown();
        });
    </script>
    <!-- //Summernote JS - CDN Link -->


    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}" ></script>


    <script>
    $(document).ready( function () {
        $('#myDataTable').DataTable();
        } );
    </script>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>


</body>
</html>
