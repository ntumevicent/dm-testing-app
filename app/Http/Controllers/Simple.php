<?php
namespace App\Http\Controllers; 
use Illuminate\Http\Request;
use App\Models\Quote;

class SimplexController extends Controller
{
    public function getQuote(Request $request){

        $data = $request->all();
        $amount = $data['amount'];
        $currency = 'USD';
        $crypto = 'BTC';
        $user_id = strval(auth()->user()->id);
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://sandbox.test-simplexcc.com/wallet/merchant/v2/quote",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode([
                'end_user_id' => $user_id,
                'digital_currency' => $crypto,
                'fiat_currency' => $currency,
                'requested_currency' => $currency,
                'requested_amount' => $amount,
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

        $res = json_decode($response, true);
        Quote::create([
            'user_id'=>$res["user_id"],
            'quoteid'=>$res["quote_id"],
            'fiat_currency'=>$res["fiat_money"]["currency"],
            'fiat_amount'=> $res["fiat_money"]["total_amount"],
            'crypto_currency'=>$res["digital_money"]["currency"],
            'crypto_amount'=>$res["digital_money"]["amount"]
        ]);
        return $response;

    }

    public function paymentRequest(Request $request){
        $user_id = auth()->user()->id;
        $data = $request->all();
        $quoteid = $data['quoteid'];
        $paytid = $data['paymentid'];
        
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
            "app_end_user_id"=> strval($user_id),
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
            "quote_id" => $quoteid,
            "payment_id" => $paytid,
            "order_id" => strval($this->gen_uuid()),
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
            'pageTitle' => 'Simplex Payments'
        ]);
    }

    public function showsimplex($paymentid, $wallet){
        $data = [
            'paymentid'=>$paymentid,
            'wallet'=>$wallet
        ];
         return view('Simplex', $data);
    }

    //Generate UUID STRING
    function gen_uuid($data = null) {
    // Generate 16 bytes (128 bits) of random data or use the data passed into the function.
    $data = $data ?? random_bytes(16);
    assert(strlen($data) == 16);

    // Set version to 0100
    $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
    // Set bits 6-7 to 10
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80);

    // Output the 36 character UUID.
    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    }

}
