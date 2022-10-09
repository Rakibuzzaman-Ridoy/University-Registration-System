@extends('layouts.app')
@push('title')
    @if(isset($dataupdate))
        <title>Department Update Form!</title>  
    @else
        <title>Department Insert Form!</title>  
    @endif
     
@endpush
@section('main-section')
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        @if(isset($dataupdate))
                            <h1>Department Data Update!</h1>
                        @else
                            <h1>Department Data Insert</h1>
                        @endif
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                              <a href="{{ route('departmentDataShow') }}">
                                
                                <button class="btn btn-success">
                                    <i class="fa-solid fa-list"></i>
                                Department's Data!</button>
                              </a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            @if(isset($dataupdate))
                                <h5>Department Data Update!</h5>
                            @else
                                <h5>Department Data Insert</h5>
                            @endif
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" action="{{ (@$dataupdate)?route('departmentDataEdit',$dataupdate->department_id):route('departmentDataInsert') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Department Name</label>
                                        <input type="text" name="department" class="form-control" value="{{ @$dataupdate->department_name}}" 
                                            id="exampleInputEmail1" placeholder="Enter Department Name">
                                        <span class="text-danger">
                                            @error('department')
                                                {{$message}}
                                            @enderror
                                        </span>
                                    </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">{{ (@$dataupdate)?'Update':'Submit'}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
<footer class="main-footer">
    <strong>Copyright &copy;  <a href="#"><b>Rakibuzzaman Rid</b></a>.</strong> All rights reserved.
</footer>
@endsection