@extends('layouts.frontend.app')
@push('title')
        <title>University Registration System!</title>   
@endpush
@section('main-section')
<div class="content-wrapper">

   <!-- Small Box (Stat card) -->
   <h5 class="mb-2 mt-4">Student's Dashboard</h5>
   <div class="row">
     <div class="col-lg-3 col-6">
       <!-- small card -->
       <div class="small-box bg-info">
         <div class="inner">
            <h3><sup style="font-size: 20px">*</sup></h3>

           <h4>All Courses!</h4>
         </div>
         <div class="icon">
           <i class="fas fa-book"></i>
         </div>
         <a href="{{ route('studentCourseDataShow') }}" class="small-box-footer">
           Course info <i class="fas fa-arrow-circle-right"></i>
         </a>
       </div>
     </div>
     <!-- ./col -->
     <div class="col-lg-3 col-6">
       <!-- small card -->
       <div class="small-box bg-success">
         <div class="inner">
           <h3><sup style="font-size: 20px"> *</sup></h3>

           <h4>Teacher's List!</h4>
         </div>
         <div class="icon">
           <i class="fa-solid fa-person"></i>
         </div>
         <a href="{{route('studenTteacherDataShow')}}" class="small-box-footer">
           Teacher's info <i class="fas fa-arrow-circle-right"></i>
         </a>
       </div>
     </div>
     <!-- ./col -->
     <div class="col-lg-3 col-6">
       <!-- small card -->
       <div class="small-box bg-warning">
         <div class="inner">
           <h3>*</h3>

           <h4>Pre Registrations</h4>
         </div>
         <div class="icon">
            <i class="fa-solid fa-registered"></i>
         </div>
         <a href="{{ route('regFormOpen') }}" class="small-box-footer">
           Registration info <i class="fas fa-arrow-circle-right"></i>
         </a>
       </div>
     </div>
     <!-- ./col -->
     <div class="col-lg-3 col-6">
       <!-- small card -->
       <div class="small-box bg-danger">
         <div class="inner">
           <h3>*_*</h3>

           <h4> Registration Status</h4>
         </div>
         <div class="icon">
           <i class="fas fa-chart-pie"></i>
         </div>
         <a href="{{ route('checkStatusStudent') }}" class="small-box-footer">
           Registration Status <i class="fas fa-arrow-circle-right"></i>
         </a>
       </div>
     </div>
     <!-- ./col -->
   </div>
   <!-- /.row -->

   <!-- Small Box (Stat card) -->
   <div class="row ">
     <div class="col-lg-3 col-6 ">
       <!-- small card -->
       <div class="small-box bg-danger">
         <!-- end loading -->
         <div class="inner">
           <h3>*</h3>

           <h4 class="text-dark">Fee Categories</h4>
         </div>
         <div class="icon">
            <i class="fa-solid fa-money-bill"></i>
         </div>
         <a href="{{ route('studentPaymentAmountDataShow') }}" class="small-box-footer">
           Payment Categories info <i class="fas fa-arrow-circle-right"></i>
         </a>
       </div>
     </div>
     <!-- ./col -->
     <div class="col-lg-3 col-6">
       <!-- small card -->
       <div class="small-box bg-dark">
         <div class="inner">
            <h2>*</h2>
           <h4>Fee Details</h4>
         </div>
         <div class="icon">
            <i class="fa-solid fa-hand-holding-dollar"></i>
         </div>
         <a href="{{route('studentPaymentAmountDataShow')}}" class="small-box-footer">
           Details info <i class="fas fa-arrow-circle-right text-light"></i>
         </a>
       </div>
     </div>
     <!-- ./col -->
   </div>
   <!-- /.row -->
</div>
                                            
<div class="row">
  <div class="col-md-4">
    
  </div>
  <div class="col-md-8">
    <footer class="main-footer">
      <strong>Copyright &copy;  <a href="#" class="text-dark"><b>Rakibuzzaman Rid</b></a>.</strong> All rights reserved.
      </footer>
  </div>
</div>
@endsection