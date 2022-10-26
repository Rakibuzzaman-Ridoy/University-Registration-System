<?php

namespace App\Http\Controllers\frontend\registration;

use App\Http\Controllers\Controller;
use App\Models\PaymentCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Registration;
use App\Models\Department;
use App\Models\Course;
use App\Models\Semester;
use App\Models\Student;


class registrationController extends Controller
{
    public function checkStatusStudent()
    {
        $registration = Registration::where('student_id',Auth::guard('student')->user()->id)->get();
        // $checkStat = Registration::all();
        $data = compact('registration');
        // return view('registration/regStatus')->with($data); 
        $checkStat = DB::table('registrations')->where('student_id', Auth::guard('student')->user()->id)->exists();
        if($checkStat == false)
        {
            $notification = array("message"=>"Apply for registration first!!","alert-type"=>"success");
            return redirect('/regFormOpen')->with($notification);
        }else{
            return view('registration/regStatus')->with($data); 
        }
    }
    public function regFormOpen()
    {
        $course = Course::all();
        $department = Department::all();
        $semester = Semester::all();
        $student = Student::all();
        $paymentCategory = PaymentCategory::all();
        $data = compact('course','student','department','semester','paymentCategory');
        //dd($student->toArray());
        return view('registration/regFormOpen')->with($data);
    }

    public function regFormSubmit(Request $request)
    {
        $request->validate([
            "department_id"=>"required",
            "semester_id"=>"required",
            "course_id"=>"required",
            "student_id"=>"required"
        ]);

        //dd($request->all());
        $data[] = [];
        for($i=0; $i<count($request->course_id); $i++)
        {
            $data[$i] = [
                'department_id'=>$request->department_id,
                'semester_id'=>$request->semester_id,
                'course_id'=>$request->course_id[$i],
                'student_id'=>$request->student_id,
            ];
        }
        //printResult($data);
        for($i=0; $i<count($request->course_id); $i++)
        {
            $course = Registration::create($data[$i]);
        }
        if(!empty($course))
        {
            $notification = array("message"=>"Successfully Applied for Registration!","alert-type"=>"success");
            return redirect()->back()->with($notification);
        }
    }

    public function regDataShow(Request $request)
    {
        $search = $request['search'] ?? "";
        if($search !="")
        {
             $registration = Registration::where("student_id","LIKE","%$search%")->orwhere("registration_id","LIKE","%$search")->simplePaginate(1);
            // $registration = Registration::where("student_id","LIKE","%$search%")->orwhere("registration_id","LIKE","%$search")
            // ->offset(0)->limit(2)->simplePaginate(1);

        }else
        {
            //  $registration = registration::simplePaginate(5); 
            $registration = Registration::select('student_id')->groupby('student_id')->simplePaginate(5); 
        }
        $data = compact('registration','search');
        return view('registration/regDataShow')->with($data);
    }

    public function regDataDetails($student_id)
    {
        //dd('ok');
        $ids = Crypt::decryptString($student_id);
        $dataupdate = Registration::where('student_id',$ids)->get();
        $student = Student::all();
        $department = Department::all();
        $semester   = Semester::all();
        $course = Course::all();
        $users = DB::table('registrations')
            ->join('courses', 'registrations.course_id', '=', 'courses.course_id')
            ->join('credits', 'courses.credit_id', '=', 'credits.credit_id')
            ->get();
        // dd($users);
        // dd($student->toArray());
        //dd($dataupdate->toArray());
        $data = compact('dataupdate','department','semester','student','course','users');
        return view('registration/regDataDetails')->with($data);

    }

    public function regStatus(Request $request)
    {
        $data[] = [];
            for($i=0; $i<count($request->registration_id); $i++)
            {
                $data[$i] = [
                    
                    "status"=>$request['status'][$i],

                ];
            }

            for($i=0; $i<count($request->registration_id); $i++)
            {
                $status=Registration::find($request->registration_id[$i])->update($data[$i]);
          
                
            }
            //d($status);
            if(!empty($status))
            {
                $notification = array("message"=>"Data updated Successfully!","alert-type"=>"success");
                return redirect()->back()->with($notification);
            }
    }

  
}
