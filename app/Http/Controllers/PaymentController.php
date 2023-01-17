<?php

namespace App\Http\Controllers;
use App\Models\BillCategory;
use App\Models\Bill;
use App\Models\User;
use App\Models\BillTransaction;
use Illuminate\Http\Request;
use App\CentralLogics\Helpers;
use CodeDredd\Soap\Facades\Soap;
use Brian2694\Toastr\Facades\Toastr;

class PaymentController extends Controller
{
    public function payment(){
        return view('pages.payments', [
            'pageTitle'         => 'Payments'
        ]);
    }

    public function bills(){
        $bill_categories = BillCategory::all();
        return view('pages.billcategories', [
            'bill_categories'   => $bill_categories,
            'pageTitle'         => 'Pay Bills'
        ]);
    }

    public function airtime(){
        return view('pages.airtime', [
            'pageTitle'         => 'Airtime & Data'
        ]);
    }

    public function airtimeform(){
        $user = User::findOrFail(1);

        return view('pages.airtime_form', [
            'pageTitle'         => 'Buy Airtime'
        ]);

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
        $payment_data = $tag->topup_airtime($request->payee_code, $request->account_number, $request->customer_phone, $request->customer_amount);
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
}
