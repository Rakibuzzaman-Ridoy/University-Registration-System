@extends('layouts.app')
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

           <h4>Semester!</h4>
         </div>
         <div class="icon">
           <i class="fas fa-book"></i>
         </div>
         <a href="{{ route('semesterFormOpen') }}" class="small-box-footer">
           Semester's Info <i class="fas fa-arrow-circle-right"></i>
         </a>
       </div>
     </div>
     <!-- ./col -->
     <div class="col-lg-3 col-6">
       <!-- small card -->
       <div class="small-box bg-success">
         <div class="inner">
           <h3><sup style="font-size: 20px"> *</sup></h3>

           <h4>Department</h4>
         </div>
         <div class="icon">
          <i class="fa-solid fa-landmark"></i>
         </div>
         <a href="{{ route('departmentFormOpen') }}" class="small-box-footer">
           Department's info <i class="fas fa-arrow-circle-right"></i>
         </a>
       </div>
     </div>
     <!-- ./col -->
     <div class="col-lg-3 col-6">
       <!-- small card -->
       <div class="small-box bg-warning">
         <div class="inner">
           <h3>*</h3>

           <h4>Payment Category</h4>
         </div>
         <div class="icon">
            <i class="fa-solid fa-dollar"></i>
         </div>
         <a href="{{ route('paymentCategoryFormOpen') }}" class="small-box-footer">
          Payment Categoryies's info <i class="fas fa-arrow-circle-right"></i>
         </a>
       </div>
     </div>
     <!-- ./col -->
     <div class="col-lg-3 col-6">
       <!-- small card -->
       <div class="small-box bg-danger">
         <div class="inner">
           <h3>*_*</h3>

           <h4> Payment Amount</h4>
         </div>
         <div class="icon">
          {{-- <i class="fa-solid fa-money-bill-1-wave"></i> --}}
          <i class="fa-solid fa-hand-holding-dollar"></i>
         </div>
         <a href="{{ route('paymentAmountFormOpen') }}" class="small-box-footer">
           Payment Amount's Info<i class="fas fa-arrow-circle-right"></i>
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

           <h4 class="text-light">Course</h4>
         </div>
         <div class="icon">
          <i class="fa-solid fa-book"></i>
         </div>
         <a href="{{ route('courseFormOpen') }}" class="small-box-footer">
         Course info <i class="fas fa-arrow-circle-right"></i>
         </a>
       </div>
     </div>
     <!-- ./col -->
     <div class="col-lg-3 col-6">
       <!-- small card -->
       <div class="small-box bg-dark">
         <div class="inner">
            <h2>*</h2>
           <h4>Teacher</h4>
         </div>
         <div class="icon">
            <i class="fa-solid fa-person text-light"></i>
         </div>
         <a href="{{ route('teacherFormOpen') }}" class="small-box-footer">
           Teacher's info <i class="fas fa-arrow-circle-right text-light"></i>
         </a>
       </div>
     </div>
     <div class="col-lg-3 col-6">
      <!-- small card -->
      <div class="small-box bg-orange">
        <div class="inner">
           <h2>*</h2>
          <h4>Credit</h4>
        </div>
        <div class="icon">
          <i class="fa-solid fa-pen-clip"></i>
        </div>
        <a href="{{ route('creditFormOpen') }}" class="small-box-footer">
          Credit's info <i class="fas fa-arrow-circle-right text-light"></i>
        </a>
      </div>
    </div>
    <div class="col-lg-3 col-6">
      <!-- small card -->
      <div class="small-box bg-gray">
        <div class="inner">
           <h2>*</h2>
          <h4>Student's Registration</h4>
        </div>
        <div class="icon">
          <i class="fa-solid fa-registered"></i>
        </div>
        <a href="{{route('regDataShow') }}" class="small-box-footer">
          Student's Registration Status <i class="fas fa-arrow-circle-right text-light"></i>
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