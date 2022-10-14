<?php

namespace App\Http\Controllers\frontend\PayableAmount;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PaymentAmount;
//Using Department,Semester and Payment Category Models for Joining Purpose
use App\Models\Department;
use App\Models\Semester;
use App\Models\PaymentCategory;
use Illuminate\Support\Facades\Crypt;
use DB;
class studentPaymentAmountView extends Controller
{
    public function studentPaymentAmountDataShow(Request $request)
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
        return view('studentPaymentAmount/studentPaymentAmoutShow')->with($data);
    }

    public function studentPaymentAmountDataShowDetails($paymentCategory_id)
    {
        //dd('ok');
        $ids = Crypt::decryptString($paymentCategory_id);
        $dataupdate = PaymentAmount::where('paymentCategory_id',$ids)->get();
        $paymentCategory = PaymentCategory::all();
        $department = Department::all();
        $semester   = Semester::all();
        $data = compact('dataupdate','department','semester','paymentCategory');
        return view('studentPaymentAmount/studentPaymentAmountDetails')->with($data);

    }
}
