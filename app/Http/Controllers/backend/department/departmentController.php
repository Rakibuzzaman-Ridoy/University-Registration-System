<?php

namespace App\Http\Controllers\backend\department;
use App\Models\department;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use DB;

class departmentController extends Controller
{
    
    public function departmentFormOpen()
    {
        return view('department/departmentFormOpen');
    }

    public function departmentDataInsert(Request $request)
    {
    //    printResult($request->all());
    //    die;
        $request->validate([
            "department"=>"required|unique:departments,department_name",
        ]);

        $department = new Department;
        $department->department_name	 = $request['department'];
        $department->save();
        $notification = array("message"=>"Data Inserted!","alert-type"=>"success");
        return redirect('/departmentDataShow')->with($notification);
    }

    public function departmentDataShow(Request $request)
    {
        $search = $request['search'] ?? "";
        if($search !="")
        {
            $department = Department::where("department_name","LIKE","%$search%")->orwhere("department_id","LIKE","%$search")->simplePaginate();

        }else
        {
             $department = Department::simplePaginate(5); 
        }
        $data = compact('department','search');
        return view('department/departmentDataShow')->with($data);
    }


    public function departmentDataUpdate($id)
    {
        $ids = Crypt::decryptString($id);
        $dataupdate = Department::find($ids);
        $data = compact('dataupdate');
        return view('department/departmentFormOpen')->with($data);

    }

    public function departmentDataEdit(Request $request, $id)
    {
        $department = Department::find($id);
        $department->department_name = $request->department;
        $department->save();
        $notification = array("message"=>"Data Updated!","alert-type"=>"success");
        return redirect('/departmentDataShow')->with($notification);
    }

    public function departmentDataDelete(Request $request, $id)
    {
        $ids = Crypt::decryptString($id);
        $department = Department::find($ids)->delete();
        if($department){
            $notification = array('message' => 'Data Deleted Successfully!', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        }
        else{
            $notification = array('message' => 'Failed to Delete!!', 'alert-type' => 'error');
            return redirect()->back()->with($notification);
        }
    }
}
