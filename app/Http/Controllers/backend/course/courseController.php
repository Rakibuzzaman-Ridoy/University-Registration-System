<?php

namespace App\Http\Controllers\backend\course;
use App\Models\Teacher;
use App\Models\Credit;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use DB;
use App\Models\Course;

class courseController extends Controller
{
    public function courseFormOpen()
    {
        $teacher = Teacher::all();
        $credit  = Credit::all();
        $data = compact('teacher','credit');
        return view('course/courseFormOpen')->with($data);
    }

    public function courseDataInsert(Request $request)
    {
    //    printResult($request->all());
    //    die;
        $request->validate([
            "course_name"=>"required|unique:courses,course_name",
            "course_code"=>"required|unique:courses,course_code",
            "credit_id"=>"required",
            "teacher_id"=>"required",
        ]);

        $course = new Course;
        $course->course_name	 = $request['course_name'];
        $course->course_code     = $request->course_code;
        $course->credit_id       = $request->credit_id;
        $course->teacher_id      = $request->teacher_id;
        $course->save();
        $notification = array("message"=>"Data Inserted!","alert-type"=>"success");
        return redirect('/courseDataShow')->with($notification);
    }

    public function courseDataShow(Request $request)
    {
        $search = $request['search'] ?? "";
        if($search !="")
        {
            $course = Course::where("course_name","LIKE","%$search%")->orwhere("course_id","LIKE","%$search")->simplePaginate();

        }else
        {
             $course = Course::simplePaginate(5); 
        }
        $data = compact('course','search');
        return view('course/courseDataShow')->with($data);
    }


    public function courseDataUpdate($id)
    {
        $ids = Crypt::decryptString($id);
        $dataupdate = Course::find($ids);
        $credit = Credit::all();
        $teacher = Teacher::all();
        $data = compact('dataupdate','credit','teacher');
        return view('course/courseDataUpdate')->with($data);

    }

    public function courseDataEdit(Request $request, $id)
    {
        $course = Course::find($id);
        $course->course_name = $request->course_name;
        $course->course_code     = $request->course_code;
        $course->credit_id       = $request->credit_id;
        $course->teacher_id      = $request->teacher_id;
        $course->save();
        $notification = array("message"=>"Data Updated!","alert-type"=>"success");
        return redirect('/courseDataShow')->with($notification);
    }

    public function courseDataDelete(Request $request, $id)
    {
        $ids = Crypt::decryptString($id);
        $course = Course::find($ids)->delete();
        if($course){
            $notification = array('message' => 'Data Deleted Successfully!', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        }
        else{
            $notification = array('message' => 'Failed to Delete!!', 'alert-type' => 'error');
            return redirect()->back()->with($notification);
        }
    }
}
