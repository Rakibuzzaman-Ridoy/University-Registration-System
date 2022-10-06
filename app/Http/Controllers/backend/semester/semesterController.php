<?php

namespace App\Http\Controllers\backend\semester;
use App\Models\Semester;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use DB;

class semesterController extends Controller
{
    public function semesterFormOpen()
    {
        return view('semester/semesterFormOpen');
    }

    public function semesterDataInsert(Request $request)
    {
    //    printResult($request->all());
    //    die;
        $request->validate([
            "semester"=>"required|unique:semesters,semester_name",
        ]);

        $semester = new Semester;
        $semester->semester_name	 = $request['semester'];
        $semester->save();
        $notification = array("message"=>"Data Inserted!","alert-type"=>"success");
        return redirect('/semesterDataShow')->with($notification);
    }

    public function semesterDataShow(Request $request)
    {
        $search = $request['search'] ?? "";
        if($search !="")
        {
            $semester = Semester::where("semester_name","LIKE","%$search%")->orwhere("semester_id","LIKE","%$search")->simplePaginate();

        }else
        {
             $semester = Semester::simplePaginate(5); 
        }
        $data = compact('semester','search');
        return view('semester/semesterDataShow')->with($data);
    }


    public function semesterDataUpdate($id)
    {
        $ids = Crypt::decryptString($id);
        $dataupdate = Semester::find($ids);
        $data = compact('dataupdate');
        return view('semester/semesterFormOpen')->with($data);

    }

    public function semesterDataEdit(Request $request, $id)
    {
        $semester = Semester::find($id);
        $semester->semester_name = $request->semester;
        $semester->save();
        $notification = array("message"=>"Data Updated!","alert-type"=>"success");
        return redirect('/semesterDataShow')->with($notification);
    }

    public function semesterDataDelete(Request $request, $id)
    {
        $ids = Crypt::decryptString($id);
        $semester = Semester::find($ids)->delete();
        if($semester){
            $notification = array('message' => 'Data Deleted Successfully!', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        }
        else{
            $notification = array('message' => 'Failed to Delete!!', 'alert-type' => 'error');
            return redirect()->back()->with($notification);
        }
    }
}
