<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SimplexController extends Controller
{
    public function getQuoteForm(){
        //return the qoute form page
        return view('simplex.qoute', [
            'pageTitle'         => 'Simplex Payments'
        ]);
    }


    public function getQuote(Request $request){

        /*$data = $request->all();
        $fiat = $data['amount'];
        $currency = $data['currency'];
        $crypto = $data['crypto']; */
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://sandbox.test-simplexcc.com/wallet/merchant/v2/quote",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode([
                'end_user_id' => '11b111d1-161e-32d9-6bda-7bb2c6c8ab17',
                "digital_currency" => "BTC",
                "fiat_currency" => "USD",
                "requested_currency" => "USD",
                "requested_amount" => 100,
                'wallet_id' => 'digitalmoneyapi',
                'client_ip' => '1.2.3.4'
            ]),
            CURLOPT_HTTPHEADER => [
              "content-type: application/json",
              "Authorization: ApiKey eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJwYXJ0bmVyIjoiZGlnaXRhbG1vbmV5YXBpIiwiaXAiOlsiMS4yLjMuNCJdLCJzYW5kYm94Ijp0cnVlfQ.E95secL3hQF9GnFzvjFSxDdhDFR0EXv069K1r_FdY_4"
            ],
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
          
        if($err){
            die('Curl returned error: ' . $err);
        }
        return $response;

    }

    public function submitQuote(Request $request){

        $data = $request->all();
        $fiat = $data['amount'];
        $currency = $data['currency'];
        $crypto = $data['crypto'];
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://sandbox.test-simplexcc.com/wallet/merchant/v2/quote",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode([
                'end_user_id' => '11b111d1-161e-32d9-6bda-7bb2c6c8af17',
                'digital_currency' => $crypto,
                'fiat_currency' => $currency,
                'requested_currency' => $currency,
                'requested_amount' => intval($fiat),
                'wallet_id' => 'digitalmoneyapi',
                'client_ip' => '1.2.3.4'
            ]),
            CURLOPT_HTTPHEADER => [
              "content-type: application/json",
              "Authorization: ApiKey eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJwYXJ0bmVyIjoiZGlnaXRhbG1vbmV5YXBpIiwiaXAiOlsiMS4yLjMuNCJdLCJzYW5kYm94Ijp0cnVlfQ.E95secL3hQF9GnFzvjFSxDdhDFR0EXv069K1r_FdY_4"
            ],
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
          
        if($err){
            die('Curl returned error: ' . $err);
        }
        return $response;

    }



    public function paymentRequest(){


        //Call Get Quote

        //$quotedetails  = $this->getQuote();

        // Build Api Request for payment

        $signup_login = array(
            "location"=> "36.848460,-174.763332",
			"uaid"=> "IBAnKPg1bdxRiT6EDkIgo24Ri8akYQpsITRKIueg+3XjxWqZlmXin7YJtQzuY4K73PWTZOvmuhIHu + ee8m4Cs4WLEqd2SvQS9jW59pMDcYu + Tpl16U / Ss3SrcFKnriEn4VUVKG9QnpAJGYB3JUAPx1y7PbAugNoC8LX0Daqg66E = ",
			"accept_language"=> "de,en-US;q=0.7,en;q=0.3",
			"http_accept_language"=>"de,en-US;q=0.7,en;q=0.3",
			"user_agent" => "Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:67.0) Gecko/20100101 Firefox/67.0",
			"cookie_session_id" => "7r7rz_VfGC_viXTp5XPh5Bm--rWM6RyU",
			"timestamp"=> "2018-01-15T09:27:34.431Z",
            "ip" => "176.12.200.206"
        );

        $account_details = array(
            "app_provider_id"=> "digital_money_ltd",
            "app_version_id"=> "1.3.1",
            "app_end_user_id"=> "11b111d1-161e-32d9-6bda-7bb2c6c8ab17",
            "app_install_date"=> "2018-01-03T15:23:12Z",
            "email"=> "kvntume20@gmail.com",
            "phone"=>"+256751483218",
            "signup_login" =>  $signup_login
        );

        $destination_wallet = array(
            "currency" => "BTC",
            "address" => "1BvBMSEYstWetqTFn5Au4m4GFg7xJaNVN2",
            "tag" => ""
        );

        $payment_details = array(
            "quote_id" => "203d7998-c8e3-4217-8d62-7ac6246e5f03",
            "payment_id" => "2222cb8e-98fe-4808-b275-adde5ff45d14",
            "order_id" => "609b9976-5617-4513-9560-dcfe68b2330b",
            "destination_wallet" => $destination_wallet,
            "original_http_ref_url" => "https://dmexchange.com/"
        );

        $transaction_details = array(
            "payment_details" => $payment_details
        );


        $transrequest = array(
            "account_details" =>  $account_details,
            "transaction_details" =>  $transaction_details
        );
       // header('Content-Type : application/json');
        $req = json_encode($transrequest);

            $ch = curl_init('https://sandbox.test-simplexcc.com/wallet/merchant/v2/payments/partner/data');                                                                      
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $req);                                              
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Authorization: ApiKey eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJwYXJ0bmVyIjoiZGlnaXRhbG1vbmV5YXBpIiwiaXAiOlsiMS4yLjMuNCJdLCJzYW5kYm94Ijp0cnVlfQ.E95secL3hQF9GnFzvjFSxDdhDFR0EXv069K1r_FdY_4'));

        $response = curl_exec($ch);
        $err = curl_error($ch);
          
        if($err){
            die('Curl returned error: ' . $err);
        }
        return $response;

    }

    public function paymentForm(){
        return view('simplex.payment', [
            'pageTitle'         => 'Simplex Payments'
        ]);
    }

}
