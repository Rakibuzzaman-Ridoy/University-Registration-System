<?php

namespace App\Http\Controllers\backend\teacher;
use App\Models\Teacher;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use DB;

class teacherController extends Controller
{
    public function teacherFormOpen()
    {
        return view('teacher/teacherFormOpen');
    }

    public function teacherDataInsert(Request $request)
    {
    //    printResult($request->all());
    //    die;
        $request->validate([
            "teacher_name"=>"required|unique:teachers,teacher_name",
            "email"=>"required|unique:teachers,email|email",
            "phone"=>"required|unique:teachers,phone",
            "gender"=>"required",
            "area"=>"required",
        ]);

        $teacher = new Teacher;
        $teacher->teacher_name	 = $request['teacher_name'];
        $teacher->email     = $request['email'];
        $teacher->phone     = $request['phone'];
        $teacher->gender     = $request['gender'];
        $teacher->area     = $request['area'];
        $teacher->save();
        $notification = array("message"=>"Data Inserted!","alert-type"=>"success");
        return redirect('/teacherDataShow')->with($notification);
    }

    public function teacherDataShow(Request $request)
    {
        $search = $request['search'] ?? "";
        if($search !="")
        {
            $teacher = Teacher::where("teacher_name","LIKE","%$search%")->orwhere("phone","LIKE","%$search")->simplePaginate();

        }else
        {
             $teacher = Teacher::simplePaginate(5); 
        }
        $data = compact('teacher','search');
        return view('teacher/teacherDataShow')->with($data);
    }


    public function teacherDataUpdate($id)
    {
        $ids = Crypt::decryptString($id);
        $dataupdate = Teacher::find($ids);
        $data = compact('dataupdate');
        return view('teacher/teacherFormOpen')->with($data);

    }

    public function teacherDataEdit(Request $request, $id)
    {
        $teacher = Teacher::find($id);
        $teacher->teacher_name 	 = $request['teacher_name'];
        $teacher->email     = $request['email'];
        $teacher->phone     = $request['phone'];
        $teacher->gender     = $request['gender'];
        $teacher->area     = $request['area'];
        $teacher->save();
        $notification = array("message"=>"Data Updated!","alert-type"=>"success");
        return redirect('/teacherDataShow')->with($notification);
    }

    public function teacherDataDelete(Request $request, $id)
    {
        $ids = Crypt::decryptString($id);
        $teacher = Teacher::find($ids)->delete();
        if($teacher){
            $notification = array('message' => 'Data Deleted Successfully!', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        }
        else{
            $notification = array('message' => 'Failed to Delete!!', 'alert-type' => 'error');
            return redirect()->back()->with($notification);
        }
    }
}
