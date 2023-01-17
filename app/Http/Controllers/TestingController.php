<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use CodeDredd\Soap\Facades\Soap;

class TestingController extends Controller
{
    //validate bill account

    public function validatebillaccount(){
        $response = Soap::baseWsdl('http://mmpuchong.mobile-money.com:1668/EMTerminalAPI/API.svc?wsdl')->call('ValidateBillAccount', [
            'sccode' => '04251264',
            'userid' => '4295444830',
            'password' => '32AB95164D',
            'sctxnid' => '67237',
            'payeecode' => 'NWSC',
            'accountno' => '04230658124',
            'remark1'=> '',
            'remark2'=> ''
        ]);

        $output = $response->json();
        return $output;
    }

    public function paybill(){
        $response = Soap::baseWsdl('http://mmpuchong.mobile-money.com:1668/EMTerminalAPI/API.svc?wsdl')->call('PayBill', [
            'sccode' => '04251264',
            'userid' => '4295444830',
            'password' => '32AB95164D',
            'sctxnid' => '8676943',
            'txntype' => '1',
            'payeecode' => 'UMEME',
            'accountno' => '04230658124',
            'phoneno'=> '0774427036',
            'amount'=> '10000',
            'remark1'=> 'UMEME TEST',
            'remark2'=> ''
        ]);

        $output = $response->json();
        return $output;
    }

    public function checkbillstatus(){
        $response = Soap::baseWsdl('http://mmpuchong.mobile-money.com:1668/EMTerminalAPI/API.svc?wsdl')->call('CheckBillStatus', [
            'sccode' => '04251264',
            'userid' => '4295444830',
            'password' => '32AB95164D',
            'sctxnid' => '867943',
        ]);

        $output = $response->json();
        return $output;
    }

    public function checkbalance(){
        $response = Soap::baseWsdl('http://mmpuchong.mobile-money.com:1668/EMTerminalAPI/API.svc?wsdl')->call('CheckBalance', [
            'sccode' => '04251264',
            'userid' => '4295444830',
            'password' => '32AB95164D',
            'sctxnid' => '867943',
        ]);

        $output = $response->json();
        return $output;
    }


    public function airtelmoneycheckno(){
        $response = Soap::baseWsdl('http://mmpuchong.mobile-money.com:1668/EMTerminalAPI/API.svc?wsdl')->call('AirtelMoneyCheckPhoneNo', [
            'sccode' => '04251264',
            'userid' => '4295444830',
            'password' => '32AB95164D',
            'phoneno' => '0751412121'
        ]);

        $output = $response->json();
        return $output;
    }

    public function airtelmoneycashin(){
        $response = Soap::baseWsdl('http://mmpuchong.mobile-money.com:1668/EMTerminalAPI/API.svc?wsdl')->call('AirtelMoneyCashIn', [
            'sccode' => '04251264',
            'userid' => '4295444830',
            'password' => '32AB95164D',
            'sctxnid' => '45334',
            'txntype'  => '1',
            'phoneno' => '0751412121',
            'amount'  => '2500'
        ]);

        $output = $response->json();
        return $output;
    }

    public function airtelmoneycashout(){
        $response = Soap::baseWsdl('http://mmpuchong.mobile-money.com:1668/EMTerminalAPI/API.svc?wsdl')->call('AirtelMoneyCashOut', [
            'sccode' => '04251264',
            'userid' => '4295444830',
            'password' => '32AB95164D',
            'sctxnid' => '453984',
            'txntype'  => '1',
            'phoneno' => '0751412129',
            'secretcode'  => '348453'
        ]);

        $output = $response->json();
        return $output;
    }

    public function airtelmoneycheckstatus(){
        $response = Soap::baseWsdl('http://mmpuchong.mobile-money.com:1668/EMTerminalAPI/API.svc?wsdl')->call('AirtelMoneyCheckStatus', [
            'sccode' => '04251264',
            'userid' => '4295444830',
            'password' => '32AB95164D',
            'sctxnid' => '453984',
        ]);

        $output = $response->json();
        return $output;
    }

    public function getdueamountanddate(){
        $response = Soap::baseWsdl('http://mmpuchong.mobile-money.com:1668/EMTerminalAPI/API.svc?wsdl')->call('GetDueAmountAndDate', [
            'sccode' => '04251264',
            'userid' => '4295444830',
            'password' => '32AB95164D',
            'sctxnid' => '45398234',
            'txntype'  => '1',
            'payeecode' => 'DSTV',
            'secretcode'  => '348453',
            'accountno'  => '04230658124'
        ]);

        $output = $response->json();
        return $output;
    }

    public function airtimetopup(){
        $response = Soap::baseWsdl('http://mmpuchong.mobile-money.com:1668/EMTerminalAPI/API.svc?wsdl')->call('AirTimeTopUp', [
            'sccode' => '04251264',
            'userid' => '4295444830',
            'password' => '32AB95164D',
            'sctxnid' => '756383',
            'trxtype'  => '1',
            'cardid' => '',
            'phoneno' => '0751483218',
            'amount'  => '2500',
            'pinKeyword' => 'AIRTEL'
        ]);

        $output = $response->json();
        return $output;
    }

    public function topup(){
        $response = Soap::baseWsdl('http://mmpuchong.mobile-money.com:1668/EMTerminalAPI/API.svc?wsdl')->call('TopUp', [
            'sccode' => '04251264',
            'userid' => '4295444830',
            'password' => '32AB95164D',
            'bankcode'  => 'Centenary',
            'date'     => '20220923',
            'refno' => '7348',
            'amount'  => '2500',
        ]);

        $output = $response->json();
        return $output;
    }

    
}
