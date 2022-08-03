<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css') }}">
    <!-- Tempusdominus Bootstrap 4 -->
    {{-- <link rel="stylesheet"
        href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}"> --}}
    <link type="text/css" rel="stylesheet" href="{{asset('admin/css/style.css')}}">
    <link type="text/css" href="{{asset("admin/css/sb-admin-2.min.css")}}" rel="stylesheet">
    <link type="text/css" href="{{asset("admin/vendor/fontawesome-free/css/all.min.css")}}" rel="stylesheet">
    <link type="text/css" href="{{asset("admin/vendor/datatables/dataTables.bootstrap4.min.css")}}" rel="stylesheet">
    <!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- CSS only -->
{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous"> --}}

<!-- CSS only -->
    <!-- CSS -->
    @yield('custom-css')
</head>

<body>
    {{-- Preloader --}}
    <div id="preloader" class="hidden"></div>

    <div id="wrapper">
        {{-- Sidebar --}}
        @include('layouts.includes.sidebar')
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                @include('layouts.includes.adminNavbar')
        {{-- @include('layouts.includes.adminContent') --}}
            <div class="container-fluid">
                    @yield('content')
            </div>
            </div>
        </div>
    </div>
    {{-- Sweet alert --}}
    <!-- JavaScript Bundle with Popper -->
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script> --}}
    
    <script src="{{asset("admin/vendor/jquery/jquery.min.js")}}"></script>
    <script src="{{asset("admin/vendor/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
    <script src="{{asset("admin/js/sb-admin-2.min.js")}}"></script>
    <script src="{{asset("admin/vendor/datatables/jquery.dataTables.min.js")}}"></script>
    <script src="{{asset("admin/vendor/datatables/dataTables.bootstrap4.min.js")}}"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        @if(session('status'))
            swal("{{session('status')}}");
        @endif
    </script>
    @yield('scripts')

    <script>
        var loader = document.getElementById("preloader");
        window.addEventListener("load", function() {
            loader.style.display = "none";

        })
    </script>
</body>

</html>