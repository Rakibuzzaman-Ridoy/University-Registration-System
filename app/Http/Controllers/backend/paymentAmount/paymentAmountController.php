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
    //    $data[]=[];
    //    for($i = 0; $i<count($request->semester_id); $i++){
    //     $data[$i]=[
    //             'department_id'=> $request['department_id'],
    //             'semester_id'=> $request->semester_id[$i],
    //            'paymentCategory_id'=> $request['paymentCategory_id'],
    //             'amount' => $request->amount[$i],
    //     ];
    //    }
    //    for($i = 0; $i<count($request->semester_id); $i++){
    //     $payment=PaymentAmount::create( $data[$i]);
      
    //    }
    //    if(!empty($payment)){
    //     $notification = array("message"=>"Data Inserted Successfully!","alert-type"=>"success");
    //     return redirect('/paymentAmountDataShow')->with($notification);
    //    }
    // printResult(count($request->amount));
    // die;
        $data[] = [];
        for($i=0; $i<count($request->amount); $i++)
        {
            $data[$i] = [
                'department_id'=>$request->department_id,
                'semester_id'=>$request->semester_id[$i],
                'paymentCategory_id'=>$request->paymentCategory_id,
                'amount'=>$request->amount[$i],
            ];
        }

        for($i=0; $i<count($request->amount); $i++)
        {
            $payment = PaymentAmount::create($data[$i]);
        }
        if(!empty($payment))
        {
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
            //  $paymentAmount = PaymentAmount::simplePaginate(5); 
            $paymentAmount = PaymentAmount::select('paymentCategory_id')->groupby('paymentCategory_id')->simplePaginate(5); 
        }
        $data = compact('paymentAmount','search');
        return view('paymentAmount/paymentAmountDataShow')->with($data);
    }


    public function paymentAmountDataUpdate($paymentCategory_id)
    {
        $ids = Crypt::decryptString($paymentCategory_id);
        $dataupdate = PaymentAmount::where('paymentCategory_id',$ids)->get();
        //dd($dataupdate->toArray());
        $paymentCategory = PaymentCategory::all();
        $department = Department::all();
        $semester   = Semester::all();
        $data = compact('dataupdate','department','semester','paymentCategory');
        return view('paymentAmount/paymentAmountDataUpdate')->with($data);

    }

    public function paymentAmountDataEdit(Request $request, $paymentCategory_id)
    {
        if(!empty($request->semester_id && $request->amount))
        {
            PaymentAmount::where('paymentCategory_id',$paymentCategory_id)->delete();
            $data[] = [];
            for($i=0; $i<count($request->amount); $i++)
            {
                $data[$i] = [
                    'department_id'=>$request->department_id,
                    'semester_id'=>$request->semester_id[$i],
                    'paymentCategory_id'=>$request->paymentCategory_id,
                    'amount'=>$request->amount[$i],
                ];
            }

            for($i=0; $i<count($request->amount); $i++)
            {
                $payment = PaymentAmount::create($data[$i]);
            }
            if(!empty($payment))
            {
                $notification = array("message"=>"Data updated Successfully!","alert-type"=>"success");
                return redirect('/paymentAmountDataShow')->with($notification);
            }
        }
        else
        {
            $notification = array("message"=>"Failed to update data!","alert-type"=>"error");
            return redirect()->back()->with($notification);
        }
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

    public function paymentAmountDataShowDetails($paymentCategory_id)
    {
        //dd('ok');
        $ids = Crypt::decryptString($paymentCategory_id);
        $dataupdate = PaymentAmount::where('paymentCategory_id',$ids)->get();
        $paymentCategory = PaymentCategory::all();
        $department = Department::all();
        $semester   = Semester::all();
        $data = compact('dataupdate','department','semester','paymentCategory');
        return view('paymentAmount/paymentAmountDataDetails')->with($data);

    }
}
