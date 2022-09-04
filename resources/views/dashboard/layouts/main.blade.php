<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset("assets/css/bootstrap.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/vendors/simple-datatables/style.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/vendors/perfect-scrollbar/perfect-scrollbar.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/css/app.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/css/sb-admin-2-min.css") }}">
    <link rel="stylesheet" href="{{ url("https://use.fontawesome.com/releases/v5.5.0/css/all.css") }}">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link rel="shortcut icon" href="{{ asset("images/LOGO.png") }}" type="image/x-icon" width="100%"/>
    @yield('alert-css')
</head>
<body>
    @include('sweetalert::alert') 
    <div id="app">
        @include('dashboard.layouts.sidebar')
        <div id="main">
            @include('dashboard.layouts.navbar')
            <div class="main-content container-fluid">
                @yield('container')
            </div> 
            @include('dashboard.layouts.footer')
        </div>
    </div>
    <script src="{{ asset("assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js") }}"></script>
    <script src="{{ asset("assets/js/app.js") }}"></script>
    <script src="{{ asset("assets/vendors/simple-datatables/simple-datatables.js") }}"></script>
    <script src="{{ asset("assets/js/vendors.js") }}"></script>
    <script src="{{ asset("assets/js/main.js") }}"></script>
    <script src="{{ asset("assets/js/pages/dashboard.js") }}"></script> 
    @yield('alert') 
</body>
</html>