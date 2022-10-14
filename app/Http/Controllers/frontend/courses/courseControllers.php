<?php

namespace App\Http\Controllers\frontend\courses;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Credit;
use Illuminate\Support\Facades\Crypt;
use DB;
use App\Models\Course;

class courseControllers extends Controller
{
    public function studentCourseDataShow(Request $request)
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
        return view('studentCoursesView')->with($data);
    }
}
