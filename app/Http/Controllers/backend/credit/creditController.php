<?php

namespace App\Http\Controllers\backend\credit;
use App\Models\Credit;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use DB;

class creditController extends Controller
{
    public function creditFormOpen()
    {
        return view('credit/creditFormOpen');
    }

    public function creditDataInsert(Request $request)
    {
    //    printResult($request->all());
    //    die;
        $request->validate([
            "credit_point"=>"required|unique:credits,credit_point",
            "credit_cost"=>"required|unique:credits,credit_cost",
        ]);

        $credit = new Credit;
        $credit->credit_point	 = $request['credit_point'];
        $credit->credit_cost     = $request['credit_cost'];
        $credit->save();
        $notification = array("message"=>"Data Inserted!","alert-type"=>"success");
        return redirect('/creditDataShow')->with($notification);
    }

    public function creditDataShow(Request $request)
    {
        $search = $request['search'] ?? "";
        if($search !="")
        {
            $credit = Credit::where("credit_point","LIKE","%$search%")->orwhere("credit_id","LIKE","%$search")->simplePaginate();

        }else
        {
             $credit = Credit::simplePaginate(5); 
        }
        $data = compact('credit','search');
        return view('credit/creditDataShow')->with($data);
    }


    public function creditDataUpdate($id)
    {
        $ids = Crypt::decryptString($id);
        $dataupdate = Credit::find($ids);
        $data = compact('dataupdate');
        return view('credit/creditFormOpen')->with($data);

    }

    public function creditDataEdit(Request $request, $id)
    {
        $credit = Credit::find($id);
        $credit->credit_point = $request->credit_point;
        $credit->credit_cost = $request->credit_cost;
        $credit->save();
        $notification = array("message"=>"Data Updated!","alert-type"=>"success");
        return redirect('/creditDataShow')->with($notification);
    }

    public function creditDataDelete(Request $request, $id)
    {
        $ids = Crypt::decryptString($id);
        $credit = Credit::find($ids)->delete();
        if($credit){
            $notification = array('message' => 'Data Deleted Successfully!', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        }
        else{
            $notification = array('message' => 'Failed to Delete!!', 'alert-type' => 'error');
            return redirect()->back()->with($notification);
        }
    }
}
