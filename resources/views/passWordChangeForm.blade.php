@extends('layouts.app')
@push('title')
    <title>Password Change!</title>   
@endpush
@section('main-section')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Password Change</h1>
                </div><!-- /.col -->
                {{-- <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Password Change</li>
                    </ol>
                </div><!-- /.col --> --}}
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Change Your Password</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" action="{{route('passwordChangeDone')}}" method="Post">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    @if(session()->has('success'))
                                        <strong class="text-success">
                                            {{session()->get('success')}}
                                        </strong>
                                    @else
                                        <strong class="text-danger">
                                            {{session()->get('error')}}
                                        </strong>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Current Password</label>
                                    <input type="password" name="current_password" class="form-control" 
                                           id="exampleInputEmail1" placeholder="Enter Current Password">
                                    <span class="text-danger">
                                        @error('currents_password')
                                            {{$message}}
                                        @enderror
                                    </span>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">New Password</label>
                                    <input type="password" name="password" class="form-control" 
                                           id="exampleInputEmail1" placeholder="Enter New Password">
                                    <span class="text-danger">
                                        @error('password')
                                            {{$message}}
                                        @enderror
                                    </span>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Re-type New Password</label>
                                    <input type="password" name="password_confirmation" class="form-control" 
                                           id="exampleInputEmail1" placeholder="Re-type New Password">
                                    <span class="text-danger">
                                        @error('password_confirmation')
                                            {{$message}}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Change Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection