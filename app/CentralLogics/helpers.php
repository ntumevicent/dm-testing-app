<?php
namespace App\CentralLogics;

use CodeDredd\Soap\Facades\Soap;

class Helpers {

  function validate_bill_account($payeecode, $accountno)
  { 
    $data = Soap::baseWsdl('http://mmpuchong.mobile-money.com:1668/EMTerminalAPI/API.svc?wsdl')->call('ValidateBillAccount', [
        'sccode' => '04251264',
        'userid' => '4295444830',
        'password' => '32AB95164D',
        'sctxnid' => $this->getsctxnid(12),
        'payeecode' => $payeecode,
        'accountno' => $accountno,
        'remark1'=> '',
        'remark2'=> ''
    ]);

    return json_decode($data, true);
   }

   function pay_bill($payeecode, $accountno, $customer_phone, $customer_amount)
   {
    $data = Soap::baseWsdl('http://mmpuchong.mobile-money.com:1668/EMTerminalAPI/API.svc?wsdl')->call('PayBill', [
        'sccode' => '04251264',
        'userid' => '4295444830',
        'password' => '32AB95164D',
        'sctxnid' => $this->getsctxnid(12),
        'txntype' => '1',
        'payeecode' => $payeecode,
        'accountno' => $accountno,
        'phoneno'=> $customer_phone,
        'amount'=> $customer_amount,
        'remark1'=> 'UMEME TEST',
        'remark2'=> ''
    ]);
    return json_decode($data, true);

   }

   public function topup_airtime($customer_phone, $customer_amount){

    $data = Soap::baseWsdl('http://mmpuchong.mobile-money.com:1668/EMTerminalAPI/API.svc?wsdl')->call('AirTimeTopUp', [
        'sccode' => '04251264',
        'userid' => '4295444830',
        'password' => '32AB95164D',
        'sctxnid' => $this->getsctxnid(12),
        'trxtype'  => '1',
        'cardid' => '',
        'phoneno' => $phone_no,
        'amount'  => $customer_amount,
        'pinKeyword' => 'AIRTEL'
    ]);

    return json_decode($data, true);
}





    function getsctxnid($length = 8)  {
        $characters = '1234567890';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    function referralCode($length = 20) {
        $characters = 'abcdefghijklmnpqrstuvwxyz';
        $string = '';
        $max = strlen($characters) - 1;
        for ($i = 0; $i < $length; $i++) {
            $string .= $characters[mt_rand(0, $max)];
        }
        return $string;
    }

}