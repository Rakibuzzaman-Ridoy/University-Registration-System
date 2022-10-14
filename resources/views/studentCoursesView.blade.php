@extends('layouts.frontend.app')
@push('title')
    <title>Course Data Show!</title> 
@endpush
@section('main-section')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Course Data Table</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  {{-- Search --}}
                    <div class="row mb-2 bg-success" style="padding-top: 20px;">
                        <div class="col-md-6">
                          <h4>This table show's all the available Courses</h4>
                        </div>
                        <div class="col-md-6">
                          <form action="" method="GET">
                              <div class="row">
                                  <div class="form-group col-md-8">
                                      <input type="search" name="search" class="form-control" placeholder="Search by Course Name" value="{{$search}}"/>
                                  </div>
                                  <div class="col-md-4 float-end">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                    <a href="{{route('studentCourseDataShow')}}">
                                      <button type="button" class="btn btn-danger">Reset</button>
                                    </a>
                                  </div>
                              </div>
                          </form>
                        </div>
                    </div>
                {{-- search end --}}
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                        <th class="text-center">Serial</th>
                        <th class="text-center">Course Name</th>
                        <th class="text-center">Course Code</th>
                        <th class="text-center">Credit</th>
                        <th class="text-center">Cost</th>
                        <th class="text-center">Teacher</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($course as $cor)
                        <tr>
                            <td class="text-center">{{$loop->iteration}}</td>
                            <td class="text-center">{{$cor->course_name}}</td>
                            <td class="text-center">{{$cor->course_code}}</td>
                            <td class="text-center">{{$cor['credit_info']['credit_point']}}</td>
                            <td class="text-center">{{$cor['credit_info']['credit_cost']}}</td>   
                            <td class="text-center">{{$cor->teacher_info->teacher_name}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
                  <div class="row">
                    <div class="col-md-12 float-end">
                      {{$course->links()}}
                    </div>
                </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<footer class="main-footer">
    <strong>Copyright &copy;  <a href="#"><b>Rakibuzzaman Rid</b></a>.</strong> All rights reserved.
</footer>
 
@endsection