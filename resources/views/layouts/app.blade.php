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
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="#"><img src="{{ asset('images/logo.png') }}"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
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
                            <a class="nav-link" href="#">My Accounts</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">News & Blogs</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" >My Account</a>
                            </li>
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
                                    {{ Auth::user()->name }} <span class="caret"></span>
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

    <!-- Modal of register -->
    <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="col-md-12 text-center">
                        <img src="{{asset('images/logo.png')}}" class="pt-5">
                        <p class="modaltitle">ACCOUNT CREATION</p>
                        <form method="POST" action="{{ route('register') }}" id="registerForm" >
                            @csrf

                            <div class="form-group row">
                                <label for="firstName" class="col-md-4 col-form-label text-md-right">First Name</label>

                                <div class="col-md-7">
                                    <input id="firstName" type="text" class="form-control{{ $errors->has('firstName') ? ' is-invalid' : '' }}" name="firstName" value="{{ old('firstName') }}" required autofocus>

                                    @if ($errors->has('firstName'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('firstName') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="middleName" class="col-md-4 col-form-label text-md-right">Middle Name</label>

                                <div class="col-md-7">
                                    <input id="middleName" type="text" class="form-control{{ $errors->has('middleName') ? ' is-invalid' : '' }}" name="middleName" value="{{ old('middleName') }}" required autofocus>

                                    @if ($errors->has('middleName'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('middleName') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="lastName" class="col-md-4 col-form-label text-md-right">Last Name</label>

                                <div class="col-md-7">
                                    <input id="lastName" type="text" class="form-control{{ $errors->has('lastName') ? ' is-invalid' : '' }}" name="lastName" value="{{ old('lastName') }}" required autofocus>

                                    @if ($errors->has('lastName'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('lastName') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-7">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-7">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-7">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="referralCode" class="col-md-4 col-form-label text-md-right">Referral Code</label>

                                <div class="col-md-7">
                                    <input id="referralCode" type="text" class="form-control{{ $errors->has('referralCode') ? ' is-invalid' : '' }}" name="referralCode" value="{{ old('referralCode') }}" required autofocus>

                                    @if ($errors->has('referralCode'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('referralCode') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-orange" id="signup">
                                        SIGN UP
                                    </button>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12 text-center">
                                    Already have Account? Click here to <a href="#" class="loginModalTrigger" data-toggle="modal" data-target="#loginModal">Login</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal of login -->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="col-md-12 text-center">
                        <img src="{{asset('images/logo.png')}}" class="pt-5 pb-3">
                        <div class="offset-md-1 col-md-10">
                            <form method="POST" action="{{ route('login') }}" id="loginForm" >
                                @csrf

                                <div class="form-group row">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Username or Email" name="username">
                                    </div>
                                </div>

                                <div class="form-group row">
                                     <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-unlock"></i></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Password" name="password">
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
                                        Don't have an account? <a href="#" class="registerModalTrigger" data-toggle="modal" data-target="#registerModal">Sign Up</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" 
    crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
    <script type="text/javascript">
        $(document).ready(function(){
            
            //setting up ajax
            /*$.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });*/

            //register and login modal
            $('.loginModalTrigger').click(function(){
                $('#registerModal').modal('hide');
                $('#loginModal').modal('show');
            });

             $('.registerModalTrigger').click(function(){
                $('#registerModal').modal('show');
                $('#loginModal').modal('hide');
            });

            $('#registerForm').on('submit', function(e){
                e.preventDefault();
                $.ajax({
                    url:'register',
                    method:'post',
                    data: $(this).serialize(),
                    dataType: 'json',
                    success:function(res){
                        console.log(res);
                        switch(res.status){
                            case 0:
                                swal('Failed',res.message,'error');
                                break;
                            case 1:
                                swal({
                                    title: 'Success',
                                    text: res.message,
                                    icon: 'success'
                                }).then((value) => {
                                    $('#registerModal').modal('hide');
                                });
                                break;
                        }
                    },
                    error:function(xhr){
                        console.log(xhr);
                    }
                });
            });
        });
    </script>

    @stack('scripts')
</body>
</html>
