@extends('layouts.app')
@push('title')
        <title>Course Update Form!</title>     
@endpush
@section('main-section')
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                            <h1>Course Data Update!</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                              <a href="{{ route('courseDataShow') }}">
                                
                                <button class="btn btn-success">
                                    <i class="fa-solid fa-list"></i>
                                Courses Data!</button>
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
                    <div class="card card-primary ">
                        <div class="card-header bg-success">
                            @if(isset($dataupdate))
                                <h5 >Course Data Update!</h5>
                            @else
                                <h5 >Course Data Insert</h5>
                            @endif
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" action="{{ route('courseDataEdit',$dataupdate->course_id) }}" method="POST">
                            @csrf
                            <div class="card-body">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="exampleInputEmail1">Course Name</label>
                                            <input type="text" name="course_name" class="form-control" value="{{$dataupdate->course_name}}" 
                                                id="exampleInputEmail1" placeholder="Enter Course Name">
                                            <span class="text-danger font-weight-bold">
                                                @error('course_name')
                                                    {{$message}}
                                                @enderror
                                            </span>
                                        </div>
    
                                        <div class="form-group col-md-6">
                                            <label for="exampleInputEmail1">Course Code</label>
                                            <input type="text" name="course_code" class="form-control" value="{{ $dataupdate->course_code }}" 
                                                id="exampleInputEmail1" placeholder="Enter Course Code">
                                            <span class="text-danger font-weight-bold">
                                                @error('course_code')
                                                    {{$message}}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="exampleInputEmail1">Credit Point</label>
                                            <select name="credit_id" id="credit_id" class="form-control" >
                                                <option value="" >Credit Point</option>
                                                    @foreach($credit as $cre)
                                                        <option value="{{ $cre->credit_id }}" {{$dataupdate->credit_id==$cre->credit_id?"selected":""}}>                                                           
                                                            {{ $cre->credit_point }}
                                                        </option>
                                                    @endforeach
                                            </select>
                                            <span class="text-danger font-weight-bold">
                                                @error('credit_id')
                                                    {{"This field is Required!"}}
                                                @enderror
                                           </span>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="exampleInputEmail1">Teacher Name</label>
                                            <select name="teacher_id" id="teacher_id" class="form-control" >
                                                <option value="">Select Teacher</option>
                                                @foreach ($teacher as $teachers)
                                                    <option value="{{ $teachers->teacher_id }}" {{$dataupdate->teacher_id==$teachers->teacher_id?"selected":""}}>{{ $teachers->teacher_name }}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger font-weight-bold">
                                                @error('teacher_id')
                                                    {{"This field is Required!"}}
                                                @enderror
                                           </span>
                                        </div>
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