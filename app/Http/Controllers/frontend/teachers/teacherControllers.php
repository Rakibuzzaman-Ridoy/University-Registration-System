<?php

namespace App\Http\Controllers\frontend\teachers;

use App\Models\Teacher;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use DB;

class teacherControllers extends Controller
{
    public function studenTteacherDataShow(Request $request)
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
        return view('teacher/studentShowTeacher')->with($data);
    }
}
