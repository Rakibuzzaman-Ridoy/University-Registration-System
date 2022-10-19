@extends('layouts.frontend.app')
@push('title')
    <title>Student's pre-registration</title>
@endpush
@section('main-section')
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Student's Pre-Registration</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                              <a href="{{route('checkStatusStudent')}}">
                               {{-- {{ Auth::guard('student')->user()->id }} --}}
                                <button class="btn btn-success">
                                    <i class="fas fa-eye"></i>
                                    Check Registration Status!</button>
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
                    <div class="card card-primary">
                        <div class="card-header">
                                <h5>Student's Pre-Registration</h5>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                        <!-- form start -->
                            <form role="form" action="{{ route('regFormSubmit')}}" method="Post" id="myForm">
                                @csrf
                                <div class="add_items">
                                    <div class="form-row">
                                        <div class="form-group col-md-5">
                                            <label for="exampleInputEmail1">Department Name</label>
                                            <select name="department_id" id="department_ids" class="form-control" required>
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
                                        <div class="form-group col-md-5">
                                            <label for="exampleInputEmail1">Semester Name</label>
                                            <select name="semester_id" id="semester_ids" class="form-control" required>
                                                <option value="">Select Semester</option>                                               
                                                @foreach ($semester as $sem)
                                                    <option value="{{ $sem->semester_id }}">{{ $sem->semester_name }}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger font-weight-bold">
                                                @error('semester_id')
                                                    {{"This field is Required!"}}
                                                @enderror
                                            </span>
                                        </div> 
                                        <div class="form-group col-md-1">
                                            <input type="text" name="student_id" value="{{Auth::guard('student')->user()->id}}" hidden>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        
                                        <div class="form-group col-md-10">
                                            <label for="exampleInputEmail1">Course</label>
                                            <select name="course_id[]" id="course_ids" class="form-control" required>
                                                <option value="">Select Course</option>                                               
                                                @foreach ($course as $cor)
                                                    <option value="{{ $cor->course_id }}">{{ $cor->course_name }}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger font-weight-bold">
                                                @error('course_id[]')
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
                                    <button type="submit" class="btn btn-danger">Apply for Registration</button>
                                </div>
                        </form> {{-- Form End --}}
                    </div> <!-- /.card-body -->   
                </div>
            </div>
        </div><!--/. container-fluid -->
</section>
</div>
<!-- /.content -->
                                            {{-- Multiple Insert --}}
<div style="visibility: hidden">
<div class="whole_extra_item_adds" id="whole_extra_item_adds">
    <div class="delete_whole_extra_item_adds" id="delete_whole_extra_item_adds">
        <div class="form-row">
            <div class="form-group col-md-10">
                <label for="exampleInputEmail1">Course</label>
                <select name="course_id[]" id="course_id" class="form-control" required>
                    <option value="">Select Course</option>                                               
                    @foreach ($course as $cor)
                        <option value="{{ $cor->course_id }}">{{ $cor->course_name }}</option>
                    @endforeach
                </select>
                <span class="text-danger font-weight-bold">
                    @error('course_id[]')
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
        var whole_extra_item_adds = $(".whole_extra_item_adds").html();
        $(this).closest(".add_items").append(whole_extra_item_adds);
        count++
    });

    $(document).on("click",".removeeventmore",function(){
        // var whole_extra_item_adds = $(".rid").html();
        $(this).closest(".delete_whole_extra_item_adds").remove();
        count -=1
    });
});
</script>
<footer class="main-footer">
<strong>Copyright &copy;  <a href="#"><b>Rakibuzzaman Rid</b></a>.</strong> All rights reserved.
</footer>
@endsection