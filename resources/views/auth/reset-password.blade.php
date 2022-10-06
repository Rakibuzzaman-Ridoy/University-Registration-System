@extends('layouts.app')
@push('title')
    <title>Reset Password!</title>   
@endpush
@section('main-section')
    <div class="hold-transition register-page">
        <div class="register-box">
            <div class="card card-outline card-primary">
              <div class="card-header text-center">
                <h2 class="fw-bold">Reset Password!</h2>
              </div>
              <div class="card-body">
                <p class="login-box-msg block">Password Reset</p>
          
                <form action="{{ route('password.update') }}" method="post">
                    @csrf
                     <!-- Password Reset Token -->
                  <input type="hidden" name="token" value="{{ $request->route('token') }}">
                  <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Enter Email" value="{{old('email', $request->email)}}" required autofocus>
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
                    <input type="password" name="password" class="form-control" placeholder="Create new password"  required autocomplete="new-password">
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
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Re-type new password" required>
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
                      <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    </div>
                    <div class="col-8">
                        <p class="mb-0">
                            <a href="{{route('register')}}" class="text-center text-success fw-bold"><i>Register a new membership</i></a>
                        </p>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>    
    </div>   
@endsection

























{{-- 
<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />

                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus />

                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button>
                    {{ __('Reset Password') }}
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout> --}}
