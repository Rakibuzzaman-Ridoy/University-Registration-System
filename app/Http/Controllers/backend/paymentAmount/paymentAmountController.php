<?php

namespace App\Http\Controllers\backend\paymentAmount;
use App\Models\PaymentAmount;
//Using Department,Semester and Payment Category Models for Joining Purpose
use App\Models\Department;
use App\Models\Semester;
use App\Models\PaymentCategory;
use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class paymentAmountController extends Controller
{
    public function paymentAmountFormOpen()
    {
        $department = Department::all();
        $semester   = Semester::all();
        $paymentCategory = PaymentCategory::all();
        $data = compact('department','semester','paymentCategory');
         return view('paymentAmount/paymentAmountFormOpen')->with($data);
    }
    public function paymentAmountDataInsert(Request $request)
    {
        // printResult($request->all());
        // die;
        $request->validate([
            "department_id"=>"required",
            "semester_id"=>"required",
            "paymentCategory_id"=>"required",
            "amount"=>"required",

        ]);
       $data[]=[];
       for($i = 0; $i<count($request->semester_id); $i++){
        $data[$i]=[
                'department_id'=> $request['department_id'],
                'semester_id'=> $request->semester_id[$i],
               'paymentCategory_id'=> $request['paymentCategory_id'],
                'amount' => $request->amount[$i],
        ];
       }
       for($i = 0; $i<count($request->semester_id); $i++){
        $payment=PaymentAmount::create( $data[$i]);
      
       }
       if(!empty($payment)){
        $notification = array("message"=>"Data Inserted Successfully!","alert-type"=>"success");
        return redirect('/paymentAmountDataShow')->with($notification);
       }
      
    }

    public function paymentAmountDataShow(Request $request)
    {
        $search = $request['search'] ?? "";
        if($search !="")
        {
            $paymentAmount = PaymentAmount::where("amount","LIKE","%$search%")->orwhere("paymentAmount_id","LIKE","%$search")->simplePaginate();

        }else
        {
             $paymentAmount = PaymentAmount::simplePaginate(5); 
        }
        $data = compact('paymentAmount','search');
        return view('paymentAmount/paymentAmountDataShow')->with($data);
    }


    public function paymentAmountDataUpdate($id)
    {
        $ids = Crypt::decryptString($id);
        $dataupdate = PaymentAmount::find($ids);
        $data = compact('dataupdate');
        return view('paymentAmount/paymentAmountFormOpen')->with($data);

    }

    public function paymentAmountDataEdit(Request $request, $id)
    {
        $paymentAmount = PaymentAmount::find($id);
        $paymentAmount->amount = $request->paymentAmount;
        $paymentAmount->save();
        $notification = array("message"=>"Data Updated Successfully!","alert-type"=>"success");
        return redirect('/paymentAmountDataShow')->with($notification);
    }

    public function paymentAmountDataDelete(Request $request, $id)
    {
        $ids = Crypt::decryptString($id);
        $paymentAmount = PaymentAmount::find($ids)->delete();
        if($paymentAmount){
            $notification = array('message' => 'Data Deleted Successfully!', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        }
        else{
            $notification = array('message' => 'Failed to Delete!!', 'alert-type' => 'error');
            return redirect()->back()->with($notification);
        }
    }
}
