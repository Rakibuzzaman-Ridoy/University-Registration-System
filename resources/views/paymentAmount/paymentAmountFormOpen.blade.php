@extends('layouts.app')
@push('title')
        <title>Payable Amount Insert Form!</title>   
@endpush
@section('main-section')
<style>
    .error{
  color:red;
}
</style>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                            <h1>Payable Amount Insert</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                              <a href="{{ route('paymentAmountDataShow') }}">
                                
                                <button class="btn btn-success">
                                    <i class="fa-solid fa-list"></i>
                               Payable Amount List!</button>
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
                         	<h5>Payable Amount Insert Form!</h5>
                        </div>
                        <!-- /.card-header -->
                        <!-- card-body -->
                        <div class="card-body">
                            <form action="{{ route('paymentAmountDataInsert') }}"
                                method="POST" id="myForm">{{-- Form start --}}
                                @csrf
                                <div class="add_item">
                                    <div class="form-row">
                                        <div class="form-group col-md-5">
                                            <label for="exampleInputEmail1">Payment Category</label>
                                            <select name="paymentCategory_id" id="paymentCategory_id" class="form-control" required>
                                                <option value="">Select Payment Category</option>
                                                @foreach ($paymentCategory as $pay)
                                                    <option value="{{ $pay->paymentCategory_id }}">{{ $pay->paymentCategory_name }}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger font-weight-bold">
                                                @error('paymentCategory_id')
                                                    {{"This field is Required!"}}
                                                @enderror
                                           </span>
                                        </div>
                                        <div class="form-group col-md-5">
                                            <label for="exampleInputEmail1">Department Name</label>
                                            <select name="department_id" id="department_id" class="form-control" required>
                                                <option value="">Select Department</option>
                                                @foreach ($department as $dept)
                                                    <option value="{{ $dept->department_id }}">{{ $dept->department_name }}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger font-weight-bold">
                                                @error('department_id')
                                                    {{"This field is Required!"}}
                                                @enderror
                                           </span>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-5">
                                            <label for="exampleInputEmail1">Semester Name</label>
                                            <select name="semester_id[]" id="semester_id" class="form-control" required>
                                                <option value="">Select Semester</option>                                               
                                                @foreach ($semester as $sem)
                                                    <option value="{{ $sem->semester_id }}">{{ $sem->semester_name }}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger font-weight-bold">
                                                @error('semester_id[]')
                                                    {{"This field is Required!"}}
                                                @enderror
                                           </span>
                                        </div>
                                        <div class="form-group col-md-5">
                                            <label for="exampleInputEmail1">Amount</label>
                                            <input type="text" name="amount[]" value="" class="form-control" placeholder="Enter Amount" required>
                                            <span class="text-danger font-weight-bold">
                                                @error('amount[]')
                                                    {{"This field is Required!"}}
                                                @enderror
                                           </span>
                                            
                                        </div>
                                        <div class="form-group col-md-1" style="padding-top: 30px;">
                                            <span class="btn btn-success addeventmore">
                                                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div> {{-- add item end --}}
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </form> {{-- Form End --}}
                        </div> <!-- /.card-body -->   
                    </div>
                </div>
            </div>
        </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
                                                {{-- Multiple Insert --}}
<div style="visibility: hidden">
    <div class="whole_extra_item_add" id="whole_extra_item_add">
        <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
            <div class="form-row">
                <div class="form-group col-md-5">
                    <label for="exampleInputEmail1">Semester Name</label>
                    <select name="semester_id[]" id="semester_id" class="form-control" required>
                        <option value="">Select Semester</option>
                        @foreach ($semester as $sem)
                            <option value="{{ $sem->semester_id }}">{{ $sem->semester_name }}</option>
                        @endforeach
                    </select>
                    <span class="text-danger font-weight-bold">
                        @error('semester_id[]')
                            {{"This field is Required!"}}
                        @enderror
                   </span>
                </div>
                
                <div class="form-group col-md-5">
                    <label for="exampleInputEmail1">Amount</label>
                    <input type="text" name="amount[]" value="" class="form-control" placeholder="Enter Amount" required>
                    <span class="text-danger font-weight-bold">
                        @error('amount[]')
                            {{"This field is Required!"}}
                        @enderror
                   </span>
                </div>
                <div class="form-group col-md-1" style="padding-top: 30px;">
                    <div class="form-row">
                        <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle" aria-hidden="true"></i></span>
                        <span class="btn btn-danger removeeventmore"><i class="fa fa-minus-circle" aria-hidden="true"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

                                                    {{-- jQuery CDN --}}
<script src="https://code.jquery.com/jquery-3.6.1.min.js" 
integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" 
integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" 
crossorigin="anonymous" referrerpolicy="no-referrer"></script>

                                            {{-- Java Script for Multiple Insert --}}
<script type="text/javascript">
    $(document).ready(function(){
        var count = 0;
        $(document).on("click",".addeventmore",function(){
            var whole_extra_item_add = $(".whole_extra_item_add").html();
            $(this).closest(".add_item").append(whole_extra_item_add);
            count++
        });

        $(document).on("click",".removeeventmore",function(){
            // var whole_extra_item_add = $(".rid").html();
            $(this).closest(".delete_whole_extra_item_add").remove();
            count -=1
        });
    });
</script>
                                        
                                            {{-- jQuery Validation --}}
{{-- <script>
    $(document).ready(function($) {
       
       $("#myForm").validate({
       rules: {
           "paymentCategory_id": "required",                    
           "department_id": {
               required: true,
           },
          "semester_id[]": "required",
        "amount[]": "required"
        
       },
       messages: {
        paymentCategory_id: "Enter Payment Category",                   
        department_id: {
               required: "Enter Department Name",
           },
           semester_id: "Select Semester",
           amount: "Opps! Forget to insert payment amount!"
       },
//         errorPlacement: function(error, element) 
// {
//    if ( element.is("#form-group") ) 
//    {
//        error.appendTo( element.parents('#form-group') );
//    }
//    else 
//    { // This is the default behavior 
//        error.insertAfter( element );
//    }
// },
       submitHandler: function(form) {
           form.submit();
       }
       
   });
});
</script> --}}
<footer class="main-footer">
    <strong>Copyright &copy;  <a href="#"><b>Rakibuzzaman Rid</b></a>.</strong> All rights reserved.
</footer>
@endsection