@extends('layouts.app')
@push('title')
    <title>Forget Password!</title>
@endpush
@section('main-section')
<div class="hold-transition login-page">
    <div class="login-box">
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
        <a href="#" class="h1"><b>Password</b>Reset</a>
        </div>
        <div class="card-body">
        <p class="login-box-msg">Forgot your password? No problem. Just let us know
             your email address and we will email you a password reset link that will allow you to choose a new one.</p>
        <form action="{{ route('password.email') }}" method="post">
            @csrf
            <div class="form-group">
                @if(session()->has('status'))
                    <strong class="text-success">
                        {{session()->get('status')}}
                    </strong>
                @endif
            </div>
            <div class="input-group mb-3">
            <input type="email" name="email" class="form-control" value="{{ old('email') }}"placeholder="Enter email" required>
            <div class="input-group-append">
                <div class="input-group-text">
                <span class="fas fa-envelope"></span>
                </div>
                <span class="text-danger">
                    @error('email')
                        {{ $message}}
                    @enderror
                </span>
            </div>
            </div>
            <div class="row">
            <div class="col-12">
                <button type="submit" class="btn btn-success btn-block">Request new password</button>
            </div>
            <!-- /.col -->
            </div>
        </form>
        <p class="mt-3 mb-1">
            <a href="{{route('login')}}">
                <button class="btn btn-primary btn-block">
                    Go to Login Page!
                </button>
            </a>
        </p>
        </div>
        <!-- /.login-card-body -->
    </div>
    </div>
</div>
@endsection



