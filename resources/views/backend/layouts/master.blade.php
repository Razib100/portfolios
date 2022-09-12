
<!doctype html>
<html lang="en">

<head>
<title>Admin :: Dashboard</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="description" content="Lucid Bootstrap 4.1.1 Admin Template">
<meta name="author" content="WrapTheme, design by: ThemeMakker.com">

<link rel="icon" href="favicon.ico" type="image/x-icon">
<!-- VENDOR CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css">
<link rel="stylesheet" href="{{ asset('backend/assets/vendor/bootstrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{ asset('backend/assets/vendor/fontawesome-free/css/fontawesome-all.min.css')}}">
<link rel="stylesheet" href="{{ asset('backend/assets/vendor/jvectormap/jquery-jvectormap-2.0.3.min.css')}}">
<link rel="stylesheet" href="{{ asset('backend/assets/vendor/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')}}">
<link rel="stylesheet" href="{{ asset('backend/assets/vendor/morrisjs/morris.min.css')}}" />
<link rel="stylesheet" href="{{ asset('backend/assets/summernote/summernote.css')}}" />
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
<!-- MAIN CSS -->
<link rel="stylesheet" href="{{ asset('backend/assets/css/main.css')}}">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/custom.css')}}">
<link rel="stylesheet" href="{{ asset('backend/assets/css/color_skins.css')}}">
<style>
    .icon-menu:before{display:none !important};
</style>
</head>
<body class="theme-blue">

<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img src="{{ asset('backend/assets/images/logo.svg')}}" width="48" height="48" alt="Lucid"></div>
        <p>Please wait...</p>
    </div>
</div>
<!-- Overlay For Sidebars -->
<div id="wrapper">
    <nav class="navbar navbar-fixed-top">
        @include('backend.layouts.headermenu')
    </nav>
    <div id="left-sidebar" class="sidebar">
        <div class="sidebar-scroll">
            <div class="user-account">
                <img src="{{ asset('backend/assets/images/user.png')}}" class="rounded-circle user-photo" alt="User Profile Picture">
                <div class="dropdown">
                    <span>Welcome,</span>
                    <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown"><strong>{{Auth::user()->username}}</strong></a>
                    <ul class="dropdown-menu dropdown-menu-right account">
                        <li><a href="professors-profile.html"><i class="icon-user"></i>My Profile</a></li>
                        <li><a href="app-inbox.html"><i class="icon-envelope-open"></i>Messages</a></li>
                        <li class="divider"></li>
                        <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="icon-power"></i>Logout</a></li>
                        <form action="{{ route('logout') }}" method="POST" id="logout-form">
                            @csrf
                        </form>
                    </ul>
                </div>
            </div>
            @include('backend.layouts.sidebar')
        </div>
    </div>
    <div id="main-content">
        @yield('content')
    </div>
</div>
<!-- Javascript -->
<script src="{{ asset('backend/assets/bundles/libscripts.bundle.js')}}"></script>
<script src="{{ asset('backend/assets/bundles/vendorscripts.bundle.js')}}"></script>

<script src="{{ asset('backend/assets/bundles/jvectormap.bundle.js')}}"></script> <!-- JVectorMap Plugin Js -->
<script src="{{ asset('backend/assets/bundles/morrisscripts.bundle.js')}}"></script>
<script src="{{ asset('backend/assets/bundles/knob.bundle.js')}}"></script>

<script src="{{ asset('backend/assets/summernote/summernote.js')}}"></script>
<script src="{{ asset('backend/assets/bundles/mainscripts.bundle.js')}}"></script>
<script src="{{ asset('backend/assets/js/pages/ui/sortable-nestable.js')}}"></script>
<script src="{{ asset('backend/assets/js/index.js')}}"></script>
<script src="{{ asset('backend/assets/bundles/datatablescripts.bundle.js')}}"></script>
<script src="{{ asset('backend/assets/js/pages/tables/jquery-datatable.js')}}"></script>
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
@yield('scripts')
<script>
    setTimeout(function (){
        $('#alert').slideUp();
    }, 5000);
</script>
</body>
</html>
