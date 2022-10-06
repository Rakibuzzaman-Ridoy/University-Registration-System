@extends('layouts.app')
@push('title')
    <title>Registration</title>   
@endpush
@section('main-section')
    <div class="hold-transition register-page">
        <div class="register-box">
            <div class="card card-outline card-primary">
              <div class="card-header text-center">
                <h1>Registration Page!</h1>
              </div>
              <div class="card-body">
                <p class="login-box-msg">Register a new membership</p>
          
                <form action="{{ route('register') }}" method="post">
                    @csrf
                  <div class="input-group mb-3">
                    <input type="text" name="name" class="form-control" placeholder="Full name" value="{{old('name')}}" required>
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-user"></span>
                      </div>
                    </div>
                    <span class="text-danger">
                        @error('name')
                            {{$message}}   
                        @enderror
                      </span>
                  </div>
                  <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email" value="{{old('email')}}" required>
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                      </div>
                    </div>
                    <span class="text-danger">
                        @error('email')
                            {{$message}}   
                        @enderror
                      </span>
                  </div>
                  <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password"  required autocomplete="new-password">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                      </div>                    
                    </div>
                    <span class="text-danger">
                        @error('password')
                            {{$message}}   
                        @enderror
                      </span>
                  </div>
                  <div class="input-group mb-3">
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Retype password" required>
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                      </div>
                    </div>
                    <span class="text-danger">
                        @error('password_confirmation')
                            {{$message}}   
                        @enderror
                      </span>
                  </div>
                  <div class="row">
                    <div class="col-8">
                      <div class="icheck-primary">
                        <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                        <label for="agreeTerms">
                         I agree to the <a href="#">terms</a>
                        </label>
                      </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                      <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </div>
                    <!-- /.col -->
                  </div>
                </form>
          
                <div class="social-auth-links text-center">
                  <a href="#" class="btn btn-block btn-primary">
                    <i class="fab fa-facebook mr-2"></i>
                    Sign up using Facebook
                  </a>
                  <a href="#" class="btn btn-block btn-danger">
                    <i class="fab fa-google-plus mr-2"></i>
                    Sign up using Google+
                  </a>
                </div>
          
                <a href="{{route('login')}}" class="text-center">I already have a membership</a>
              </div>
              <!-- /.form-box -->
            </div><!-- /.card -->
          </div>    
    </div>   
@endsection