<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Login!</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="{{asset('frontendStudent')}}/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="{{asset('frontendStudent')}}/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
     integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.37/sweetalert2.css">
     <link rel="stylesheet" type="text/css" href="{{asset('backend/plugins/toastr/toastr.css')}}">
</head>
<body>

    <div class="main-container">
        @if(session()->has('error'))
            <div class="alert alert-success text-center col-md-4 offset-4">
                <h2>{{session()->get('error')}}</h2>
            </div>
        @else
        @endif
        <!-- Sing in  Form -->
        <section class="sign-in">

            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="{{asset('frontendStudent')}}/images/signin-image.jpg" alt="sing up image"></figure>
                        <a href="{{route('studentRegisterFormOpen')}}" class="signup-image-link">Create an account</a>
                    </div>
                    
                    <div class="signin-form">
                        <h2 class="form-title">Sign In</h2>
                        <form action="{{route('studentLoginFormSubmit')}}" method="POST" class="register-form" id="login-form">
                            @csrf
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email" value="{{old('email')}}">
                                <span class="text-danger fw-bold">
                                    @error('email')
                                        {{$message}}   
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="Password"/>
                                <span class="text-danger fw-bold">
                                    @error('password')
                                        {{$message}}   
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
                            </div>
                        </form>

                        <div class="social-login">
                            <span class="social-label">Or login with</span>
                            <ul class="socials">
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
     integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="{{asset('frontendStudent')}}/vendor/jquery/jquery.min.js"></script>
    <script src="{{asset('frontendStudent')}}/js/main.js"></script>
    <script src="{{asset('backend')}}/dist/js/pages/dashboard.js"></script>
    <script type="text/javascript" src="{{ asset('backend/plugins/toastr/toastr.min.js')}}"></script>
    {{-- Sweet Alert Cdn --}}
    <script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
    integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="{{asset('frontendStudent')}}/vendor/jquery/jquery.min.js"></script>
    <script src="{{asset('frontendStudent')}}/js/main.js"></script>
    {{-- jQuery Validation CDN --}}
    <script>
        @if(Session::has('message'))
            var type = "{{Session::get('alert-type','info')}}"
            switch (type) {
                case 'info':
                    toastr.info("{{ Session::get('message') }}");
                    break;
                case 'success':
                    toastr.success("{{ Session::get('message') }}");
                    break;
                case 'warning':
                    toastr.warning("{{ Session::get('message') }}");
                    break;
                case 'error':
                    toastr.error("{{ Session::get('message') }}");
                    break;
            }
        @endif
        </script>
</body>
</html> 