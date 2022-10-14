@extends('layouts.frontend.app')
@push('title')
        <title>Student Payable Amount Details!</title>   
@endpush
@section('main-section')
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                            <h1>Payable Amount Details</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                              <a href="{{ route('studentPaymentAmountDataShow') }}">
                                
                                <button class="btn btn-success">
                                    <i class="fa-solid fa-list"></i>
                               Payable Amount Details!</button>
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
                        <div class="card-header">
                         	<h5>{{$dataupdate['0']['paymentAmount']['paymentCategory_name']}}</h5>
                        </div>
                        <!-- /.card-header -->
                        <!-- card-body -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                    <th class="text-center">Serial</th>
                                    <th class="text-center">Department</th>
                                    <th class="text-center">Semester</th>
                                    <th class="text-center">Payment Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($dataupdate as $pay)
                                    <tr>
                                        <td class="text-center">{{$loop->iteration}}</td>
                                        <td class="text-center">{{$pay['department']['department_name']}}</td>
                                        <td class="text-center">{{$pay['semester']['semester_name']}}</td>
                                        <td class="text-center">{{$pay['amount']}}</td>
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