@extends('layouts.app')
@push('title')
    <title>Credit Data Show!</title>
@endpush
@section('main-section')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Credit Data Table</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                          <a href="{{ route('creditFormOpen') }}">
                            <button class="btn btn-success">
                              <i class="fa fa-plus-circle"></i>
                              Add New Credit!</button>
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
                          <h4>This table show's all the available credit</h4>
                        </div>
                        <div class="col-md-6">
                          <form action="" method="GET">
                              <div class="row">
                                  <div class="form-group col-md-8">
                                      <input type="search" name="search" class="form-control" placeholder="Search by Credit Point" value="{{$search}}"/>
                                  </div>
                                  <div class="col-md-4 float-end">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                    <a href="{{url('/creditDataShow')}}">
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
                        <th class="text-center">Credit Point</th>
                         <th class="text-center">Credit Cost</th>
                        <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($credit as $credit)
                        <tr>
                            <td class="text-center">{{$loop->iteration}}</td>
                            <td class="text-center">{{$credit->credit_point}}</td>
                            <td class="text-center">{{$credit->credit_cost}}</td>
                            <td class="text-center">
                                <a href="{{ route('creditDataUpdate',Crypt::encryptString($credit->credit_id))}}" class="text-decoration-none">
                                    <button class="btn btn-primary">
                                      <i class="fa-solid fa-pen-to-square"></i>
                                    </button>
                                </a>
                                <a href="{{ route('creditDataDelete',Crypt::encryptString($credit->credit_id)) }}" class="text-decoration-none delete">
                              
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
                      {{-- {{$credit->links()}} --}}
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