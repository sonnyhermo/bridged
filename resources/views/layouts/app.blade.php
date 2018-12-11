<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Bridged') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <link rel="stylesheet" href="https://unpkg.com/bs-stepper/dist/css/bs-stepper.min.css">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="#"><img src="{{ asset('images/logo.png') }}" class="logo"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Loan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Partners</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Promos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">News & Blogs</a>
                        </li>

                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                @if (Route::has('register'))
                                    <a class="nav-link loginModalTrigger" data-toggle="modal" data-target="#loginModal">
                                        <div style="font-size: 0.5rem;">
                                            <i class="far fa-user fa-2x"></i>
                                        </div>
                                    </a>
                                @endif
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    My Account <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>

        <footer class="container-fluid">
            <div class="container">
                <div class="row py-5">
                    <div class="col-md-3">
                        <ul>
                            <li>ABOUT US</li>
                            <li>Home</li>
                            <li>Who we are</li>
                            <li>Product & Services</li>
                            <li>Our Credit Partners</li>
                            <li>Contact Us</li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <ul>
                            <li>NEED HELP?</li>
                            <li>FAQs</li>
                            <li>Terms</li>
                            <li>Privacy Policy</li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <ul>
                            <li>NEWS</li>
                            <li>Financial Blogs</li>
                            <li>News and Updates</li>
                            <li>Process Flow</li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <ul>
                            <li>TOOLS</li>
                            <li>Account Setting</li>
                            <li>Loan Calculator</li>
                        </ul>
                    </div>
                </div>
                <div class="text-center col-md-12 pb-3">
                    <p>Copyright @ 2018</p>
                </div>
            </div>
        </footer>
    </div>

    <!-- Modal of login -->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="col-md-12 text-center">
                        <img src="{{asset('images/logo.png')}}" class="mt-5 mb-3 logo">
                        <div class="offset-md-1 col-md-10">
                            <form method="POST" action="{{ route('login') }}" id="loginForm" >
                                @csrf

                                <div class="form-group row">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input type="email" class="form-control" placeholder="Username or Email" name="email" id="loginEmail">
                                        <span class="invalid-feedback" role="alert" id="emailFeedback"></span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                     <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-unlock"></i></span>
                                        </div>
                                        <input type="password" class="form-control" placeholder="Password" name="password" id="loginPassword">
                                        <span class="invalid-feedback" role="alert" id="passwordFeedback"></span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-12 text-center">
                                        <button type="submit" class="btn btn-orange" id="login">
                                            LOGIN
                                        </button>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12 text-center">
                                        Don't have an account? <a href="/register">Sign Up</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="{{ asset('js/jquery.3.2.1.min.js') }}" type="text/javascript"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/utility.js') }}" defer></script>
    
    @stack('scripts')
    <script type="text/javascript">

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function(){

            //register and login modal
            $('.loginModalTrigger').click(function(){
                $('#loginModal').modal('show');
            });

            $('#loginForm').on('submit',function(e){
                e.preventDefault();
                $.ajax({
                    url: 'login',
                    method: 'post',
                    data: $(this).serialize(),
                    dataType: 'json',
                    success: function(res){
                        if(res.auth){
                            location.href = res.intended;
                        }else{
                            swal('Login Failed', 'Email or Password is not correct', 'error');
                        }
                    },
                    error: function(xhr){
                        console.log(JSON.parse(xhr.responseText));
                        let error = JSON.parse(xhr.responseText);
                        if(error.errors.hasOwnProperty('email')){
                            let msg = '';
                            $('#loginEmail').addClass('is-invalid');
                            $.each(error.errors.email, function(key, val){
                                msg += val;
                            });
                            $('#emailFeedback').html(msg);
                        }
                    }
                });
            });
        });
    </script>
</body>
</html>
