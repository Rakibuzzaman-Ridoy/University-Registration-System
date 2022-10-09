<?php

namespace App\Http\Controllers\backend\paymentCategory;
use App\Models\PaymentCategory;
use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class paymentCategoryController extends Controller
{
    public function paymentCategoryFormOpen()
    {
        return view('paymentCategory/paymentCategoryFormOpen');
    }

    public function paymentCategoryDataInsert(Request $request)
    {
    //    printResult($request->all());
    //    die;
        $request->validate([
            "paymentCategory"=>"required|unique:payment_categories,paymentCategory_name",
        ]);

        $paymentCategory = new PaymentCategory;
        $paymentCategory->paymentCategory_name	 = $request['paymentCategory'];
        $paymentCategory->save();
        $notification = array("message"=>"Data Inserted Successfully!","alert-type"=>"success");
        return redirect('/paymentCategoryDataShow')->with($notification);
    }

    public function paymentCategoryDataShow(Request $request)
    {
        $search = $request['search'] ?? "";
        if($search !="")
        {
            $paymentCategory = PaymentCategory::where("paymentCategory_name","LIKE","%$search%")->orwhere("paymentCategory_id","LIKE","%$search")->simplePaginate();

        }else
        {
             $paymentCategory = PaymentCategory::simplePaginate(5); 
        }
        $data = compact('paymentCategory','search');
        return view('paymentCategory/paymentCategoryDataShow')->with($data);
    }


    public function paymentCategoryDataUpdate($id)
    {
        $ids = Crypt::decryptString($id);
        $dataupdate = PaymentCategory::find($ids);
        $data = compact('dataupdate');
        return view('paymentCategory/paymentCategoryFormOpen')->with($data);

    }

    public function paymentCategoryDataEdit(Request $request, $id)
    {
        $paymentCategory = PaymentCategory::find($id);
        $paymentCategory->paymentCategory_name = $request->paymentCategory;
        $paymentCategory->save();
        $notification = array("message"=>"Data Updated Successfully!","alert-type"=>"success");
        return redirect('/paymentCategoryDataShow')->with($notification);
    }

    public function paymentCategoryDataDelete(Request $request, $id)
    {
        $ids = Crypt::decryptString($id);
        $paymentCategory = PaymentCategory::find($ids)->delete();
        if($paymentCategory){
            $notification = array('message' => 'Data Deleted Successfully!', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        }
        else{
            $notification = array('message' => 'Failed to Delete!!', 'alert-type' => 'error');
            return redirect()->back()->with($notification);
        }
    }
}
