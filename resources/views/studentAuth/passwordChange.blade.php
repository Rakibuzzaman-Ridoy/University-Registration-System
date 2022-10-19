@extends('layouts.frontend.app')
@push('title')
    <title>Student Password Change!</title>
@endpush
{{-- 4 cdn for custom login --}}
<link rel="stylesheet" href="{{asset('frontendStudent')}}/fonts/material-icon/css/material-design-iconic-font.min.css">

<!-- Main css -->
<link rel="stylesheet" href="{{asset('frontendStudent')}}/css/style.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    
@section('main-section')
<div class="content-wrapper">
    <div class="main-class">
        @if(session()->has('error'))
            <div class="alert alert-success text-center col-md-4 offset-4">
                <h2>{{session()->get('error')}}</h2>
            </div>
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
                        <h2 class="form-title">Change Your Password</h2>
                        <form action="{{route('PasswordChangeFormSubmit')}}" method="POST" class="register-form" id="login-form">
                            @csrf
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="current_password" id="password" placeholder="Current Password"/>
                                <span class="text-danger fw-bold">
                                    @error('current_password')
                                        {{$message}}   
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="New Password"/>
                                <span class="text-danger fw-bold">
                                    @error('password')
                                        {{$message}}   
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password_confirmation" id="password" placeholder="Re-type New Password"/>
                                <span class="text-danger fw-bold">
                                    @error('password_confirmation')
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
</div>
@endsection