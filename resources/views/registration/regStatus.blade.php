@extends('layouts.frontend.app')
@push('title')
        <title>Registration Status!</title>   
@endpush
@section('main-section')
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                            <h1>Registration Info Details</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                              <a href="{{ route('regFormOpen') }}">
                                
                                <button class="btn btn-danger">
                                    <i class="fa-solid fa-plus-circle"></i>
                               Registration Form!</button>
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
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header bg-dark">
                         	{{-- <h5 class="text-dark">Student Name: <b class="text-light">{{Auth::guard('student')->user()->name}}</b></h5> --}}
                            <h5 class="text-success">
                                Student Name: <b class="text-light">{{Auth::guard('student')->user()->name}}</b>
                                Department: <b class="text-light">{{$registration['0']['department']->department_name}}</b>
                                Semester: <b class="text-light">{{$registration['0']['semester']->semester_name}}</b>
                                Semester Fee: <b class="text-light"><?php  $sum=0;?>
                                                @foreach($registration as $reg)
                                                <?php  $sum +=  $reg['course']['credit_info']['credit_cost'];?>
                                                @endforeach
                                            <?php echo $sum;?>
                                </b>
                            </h5>

                            
                        </div>
                        <!-- /.card-header -->
                        <!-- card-body -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead >
                                    <tr>
                                        <th class="text-center">Serial</th>
                                        <th class="text-center">Course Name</th>
                                        <th class="text-center">Course Code</th>
                                        <th class="text-center">Credit Point</th>
                                        <th class="text-center">Registration Status</th>
                                        <th class="text-center">Amount</th>  
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- {{dd($registration->toArray())}} --}}
                                    @foreach($registration as $reg)
                                    <tr>
                                        <td class="text-center">{{$loop->iteration}}</td>
                                        <td class="text-center">{{$reg['course']['course_name']}}</td>
                                        <td class="text-center">{{$reg['course']['course_code']}}</td>
                                        <td class="text-center">{{$reg['course']['credit_info']['credit_point']}}</td>
                                        <td class="text-center">
                                            @if($reg->status==0)
                                                <button type="button" class="btn btn-primary btn-sm active">
                                                    Pending
                                                </button>
                                            @elseif($reg->status==1)
                                                <button type="button" class="btn btn-success btn-sm">
                                                    Accepted
                                                </button>
                                            @else
                                                <button type="button" class="btn btn-danger btn-sm">
                                                    Rejected
                                                </button>
                                            @endif
                                        </td>
                                        <td class="text-center">{{$reg['course']['credit_info']['credit_cost']}}</td>  
                                    </tr>
                                    @endforeach
                                </tbody>                              
                            </table> 
                        </div> <!-- /.card-body -->   
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