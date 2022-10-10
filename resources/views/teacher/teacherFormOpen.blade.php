
@extends('layouts.app')
@push('title')
         @if(isset($dataupdate))
            <title>Teacher Update Form!</title>   
        @else
            <title>Teacher Insert Form!</title>     
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
                            <h1>Teacher Data Update!</h1>
                        @else
                            <h1>Teacher Data Insert</h1>
                        @endif
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                              <a href="{{ route('teacherDataShow') }}">
                                
                                <button class="btn btn-success">
                                    <i class="fa-solid fa-list"></i>
                                Teacher's Data!</button>
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
                        <div class="card-header bg-success">
                            @if(isset($dataupdate))
                                <h5>Teacher Data Update!</h5>
                            @else
                                <h5>Teacher Data Insert</h5>
                            @endif
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" action="{{ (@$dataupdate)?route('teacherDataEdit',$dataupdate->teacher_id):route('teacherDataInsert') }}" method="Post">
                            @csrf
                            <div class="card-body col-md-8 offset-2">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Teacher's Name</label>
                                        <input type="text" name="teacher_name" class="form-control" value="{{ @$dataupdate->teacher_name}}" 
                                            id="exampleInputEmail1" placeholder="Enter Teacher Name">
                                        <span class="text-danger">
                                            @error('teacher_name')
                                                {{$message}}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email</label>
                                        <input type="email" name="email" class="form-control" value="{{ @$dataupdate->email}}" 
                                            id="exampleInputEmail1" placeholder="Enter Email">
                                        <span class="text-danger">
                                            @error('email')
                                                {{$message}}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Phone</label>
                                        <input type="number" name="phone" class="form-control" value="{{ @$dataupdate->phone}}" 
                                            id="exampleInputEmail1" placeholder="Enter Phone Number">
                                        <span class="text-danger">
                                            @error('phone')
                                                {{$message}}
                                            @enderror
                                        </span>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Teaching Area</label>
                                        <input type="textarea" name="area" class="form-control" value="{{ @$dataupdate->area}}" 
                                            id="exampleInputEmail1" placeholder="Enter Teaching Area">
                                        <span class="text-danger">
                                            @error('area')
                                                {{$message}}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="form-check fw-bold">
                                        <p class="fw-bold">Select Gender</p>
                                        <input type="radio" name="gender" value="M" {{ (@$dataupdate->gender=="M")? "checked" : "" }}/>
                                        <label>Male</label>
                                        <input type="radio" name="gender" value="F" {{ (@$dataupdate->gender=="F")? "checked" : "" }}/>
                                        <label>Female</label>
                                        <input type="radio" name="gender" value="O" {{ (@$dataupdate->gender=="O")? "checked" : "" }}/>
                                        <label>Others</label>
                                        <br>
                                        <span class="text-danger">
                                            @error('gender')
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