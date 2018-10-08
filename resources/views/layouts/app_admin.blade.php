<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Bridged') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin/now-ui-dashboard.css?v=1.1.0') }}" rel="stylesheet" />

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>
<body>
   <div class="wrapper ">
        <div class="sidebar" data-color="red">
            <!--
            Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
            -->
            <div class="logo text-center">
                
                <a href="/home" class="simple-text logo-normal">
                    <img src="{{ asset('images/logo.png') }}">
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="active ">
                        <a href="./dashboard.html">
                            <i class="now-ui-icons design_app"></i><p>Dashboard</p>
                        </a>
                    </li>
                    <li>
                        <a href="./icons.html">
                            <i class="now-ui-icons education_atom"></i><p>Icons</p>
                        </a>
                    </li>
                    <li>
                        <a href="./map.html">
                            <i class="now-ui-icons location_map-big"></i><p>Maps</p>
                        </a>
                    </li>
                    <li>
                        <a href="./notifications.html">
                            <i class="now-ui-icons ui-1_bell-53"></i><p>Notifications</p>
                        </a>
                    </li>
                    <li>
                        <a href="./user.html">
                            <i class="now-ui-icons users_single-02"></i><p>User Profile</p>
                        </a>
                    </li>
                    <li>
                        <a href="./tables.html">
                            <i class="now-ui-icons design_bullet-list-67"></i><p>Table List</p>
                        </a>
                    </li>
                    <li>
                        <a href="./typography.html">
                            <i class="now-ui-icons text_caps-small"></i><p>Typography</p>
                        </a>
                    </li>
                    <li class="active-pro">
                        <a href="./upgrade.html">
                            <i class="now-ui-icons arrows-1_cloud-download-93"></i><p>Upgrade to PRO</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-transparent  navbar-absolute bg-primary fixed-top">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-toggle">
                            <button type="button" class="navbar-toggler">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </button>
                        </div>
                        <a class="navbar-brand" href="#pablo">Dashboard</a>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            
            <div class="panel-header panel-header-lg">
                
            </div>
        </div>
    </div>
    <!--   Core JS Files   -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" 
    crossorigin="anonymous"></script>
    <script src="{{ asset('js/admin/popper.min.js') }}"></script>
    <script src="{{ asset('js/admin/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('js/admin/now-ui-dashboard.min.js?v=1.1.0') }}" type="text/javascript"></script>

</body>
</html>
