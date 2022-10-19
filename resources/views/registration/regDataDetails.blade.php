@extends('layouts.app')
@push('title')
        <title>Registration Details!</title>   
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
                              <a href="{{ route('regDataShow') }}">
                                
                                <button class="btn btn-primary">
                                    <i class="fa-solid fa-list"></i>
                               Registration List!</button>
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
                            <h5 class="text-success">Student Name: <b class="text-light">{{$dataupdate[1]['student']['name']}}</b></h5>
                        </div>
                        <!-- /.card-header -->
                        <!-- card-body -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                {{-- <thead>
                                    <tr>
                                    <th class="text-center">Serial</th>
                                    <th class="text-center">Courses</th>
                                    <th class="text-center">Course Code</th>
                                    <th class="text-center">Credit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $reg)
                                    <tr>
                                        <td class="text-center">{{$loop->iteration}}</td>
                                        <td class="text-center">{{$reg->course_name}}</td>
                                        <td class="text-center">{{$reg->course_code}}</td>
                                        <td class="text-center">{{ $reg->credit_point}}</td>

                                    </tr>
                                    @endforeach
                                </tbody> --}}
                                <thead >
                                    <tr>
                                        <th class="text-center">Serial</th>
                                        <th class="text-center">Course Name</th>
                                        <th class="text-center">Course Code</th>
                                        {{-- <th class="text-center">Credit</th> --}}
                                        <th class="text-center">Credit Point</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Change Status <b class="text-danger">(Choose One)</b></th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <form action="{{ route('regStatus')}}" method="post">
                                    @foreach($dataupdate as $reg)
                                    <tr>
                                        <td class="text-center">{{$loop->iteration}}</td>
                                        <td class="text-center">{{$reg['course']['course_name']}}</td>
                                        <td class="text-center">{{$reg['course']['course_code']}}</td>
                                        {{-- <td class="text-center">{{$reg['course']['credit_id']}}</td> --}}
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
                                      
                                        <td class="text-center">                                           
                                                @csrf
                                                <input type="hidden" name="registration_id[]" value="{{ $reg['registration_id']}}" >
                                                <input type="checkbox" name="status[]" value="1" {{$reg->status=='1' ? "checked":""}}>
                                                <label>Accept</label>
                                                <input type="checkbox" name="status[]" value="2" {{$reg->status=='2' ? "checked":""}}>
                                                <label>Reject</label>
                                                <input type="checkbox" name="status[]" value="0" {{$reg->status=='0' ? "checked":""}}>
                                                <label>Pending</label>     
                                        </td>
                                    </tr>
                                    @endforeach
                                    
                                </tbody>
                                
                            </table>
                            <div class="row text-center">
                                <div class="col-md-12 fw-bold " style="text-align: right">
                                    <button class="btn btn-primary m-2 p-2">Changes Registration Status</button>
                                </div>
                            </div>
                        </form>  
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