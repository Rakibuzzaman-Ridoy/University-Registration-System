@extends('layouts.app')
@push('title')
    <title>Payment Amount Data Show!</title>
@endpush
@section('main-section')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Payment Amount Table</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                          <a href="{{ route('paymentAmountFormOpen') }}">
                            <button class="btn btn-success">
                              <i class="fa fa-plus-circle"></i>
                              Add Payment Amount!</button>
                          </a>
                        </li>
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
                    <div class="row mb-2">
                        <div class="col-md-6">
                          <h4>This table show's all the payable Amount</h4>
                        </div>
                        <div class="col-md-6">
                          <form action="" method="GET">
                              <div class="row">
                                  <div class="form-group col-md-8">
                                      <input type="search" name="search" class="form-control" placeholder="Search by Payable Amount" value="{{$search}}"/>
                                  </div>
                                  <div class="col-md-4 float-end">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                    <a href="{{url('/paymentAmountDataShow')}}">
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
                        <th class="text-center">Department</th>
                        <th class="text-center">Semester</th>
                        <th class="text-center">Fee Category</th>
                        <th class="text-center">Payment Amount</th>
                        <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($paymentAmount as $payment)
                        <tr>
                            <td class="text-center">{{$loop->iteration}}</td>
                            <td class="text-center">{{$payment->department_id}}</td>
                            <td class="text-center">{{$payment->semester_id}}</td>
                            <td class="text-center">{{$payment->paymentCategory_id}}</td>
                            <td class="text-center">{{$payment->amount}}</td>
                            <td class="text-center">
                                <a href="{{ route('paymentAmountDataUpdate',Crypt::encryptString($payment->paymentAmount_id))}}" class="text-decoration-none">
                                    <button class="btn btn-primary">
                                      <i class="fa-solid fa-pen-to-square"></i>
                                    </button>
                                </a>
                                <a href="{{ route('paymentAmountDataDelete',Crypt::encryptString($payment->paymentAmount_id)) }}"   onclick="deleteId('$payment->paymentAmount_id')" class="text-decoration-none delete">
                              
                                    <button class="btn btn-danger">
                                      <i class="fa-solid fa-trash"></i>
                                    </button>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
                  <div class="row">
                    <div class="col-md-12 float-end">
                      {{$paymentAmount->links()}}
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