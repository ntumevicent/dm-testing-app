<?php

namespace App\Http\Controllers;
use App\Models\BillCategory;
use App\Models\Bill;
use App\Models\BillTransaction;

use Illuminate\Http\Request;
use App\CentralLogics\Helpers;
use CodeDredd\Soap\Facades\Soap;
use Brian2694\Toastr\Facades\Toastr; 

class BillController extends Controller
{
    public function billcategories(){
        $bill_categories = BillCategory::all();
        return view('pages.billcategories', [
            'bill_categories'   => $bill_categories,
            'pageTitle'         => 'Pay Bills'
        ]);
    }

    public function viewbillcategory($id){
        $bill_category = BillCategory::find($id);
        $get_bills = Bill::with('bill_category')->where('bill_category_id', $id)->get();

        return view('pages.billcategory', [
            'get_bills'         => $get_bills,
            'pageTitle'         => $bill_category->bill_category_name
        ]);
       
    }

    public function testingform(){
        return view('pages.testing', [
            'pageTitle'         => 'Add Bill Category'
        ]);
    }

    public function validatemeterform(Request $request, $payeecode){
        return view('pages.bill_forms.validate_meter', [
            'pageTitle'         => 'Validate Account',
            'payeecode'         => $payeecode
        ]);
    }

    public function testingform_submit(Request $request, $payeecode){
        $request->validate(
            [
                'bill_category_name' => 'required',
                'bill_category_icon' => 'required',
            ]
          );

          $new_bill_category = new BillCategory();
          $new_bill_category->bill_category_name = $request->bill_category_name;
          $new_bill_category->bill_category_icon = $request->bill_category_icon;
          $new_bill_category->save();
          return redirect()->route('bill.categories')->with('success', 'Bill category added successfully');
    }

    public function checkmeternumber(Request $request){
        $request->validate(
            [
                'payee_code' => 'required',
                'account_number' => 'required'
            ]
        );

        $tag = new Helpers();
        $bill_data = $tag->validate_bill_account($request->payee_code, $request->account_number);

        if($bill_data['respmsg'] == 'SUCCESS'){
          return redirect()->route('umeme_bill.form')->with('res', $bill_data);
        } else{
           return redirect()->back()->withErrors( [ 'account_number' => 'Invalid Meter Number' ] );   
        }

    }

    public function payumemeyaka(Request $request){
        $request->validate(
            [
                'payee_code' => 'required',
                'account_number' => 'required',
                'customer_phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
                'customer_amount' => 'required'
            ]
        );

        $tag = new Helpers();
        $payment_data = $tag->pay_bill($request->payee_code, $request->account_number, $request->customer_phone, $request->customer_amount);
         //dd($payment_data);exit();
        $user_id = 12;
         
         if($payment_data['respmsg'] == 'SUCCESS'){
            $new_bill_transaction = new BillTransaction();
            $new_bill_transaction->user_id = $user_id;
            $new_bill_transaction->sctrxn_id = $payment_data['sctrxnid'];
            $new_bill_transaction->user_phone_number = $request->customer_phone;
            $new_bill_transaction->emtx_id = $payment_data['emtxid'];
            $new_bill_transaction->txn_fee = $payment_data['txnfee'];
            $new_bill_transaction->receipt_no = $payment_data['receiptno'];
            $new_bill_transaction->save();
            return redirect()->route('bill.transactions')->with('success', 'New transaction added successfully');

          } else{
            return redirect()->back()->withErrors( );   
        }

    }

    public function transactions(){
        $transactions = BillTransaction::all();
        return view('pages.bill_transactions', [
            'transactions'   => $transactions,
            'pageTitle'         => 'Transactions'
        ]);
    }


    public function umemeform(){
        return view('pages.bill_forms.umeme', [
            'pageTitle'         => 'Payß Bill'
        ]);
    }

    public function getsctxnid($length = 8)  {
            $characters = '1234567890';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
    }
}
