<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PesaController extends Controller
{
    public function request_token(){
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://cybqa.pesapal.com/pesapalv3/api/Auth/RequestToken',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{
            "consumer_key": "TDpigBOOhs+zAl8cwH2Fl82jJGyD8xev",
            "consumer_secret": "1KpqkfsMaihIcOlhnBo/gBZ5smw="
        }',
        CURLOPT_HTTPHEADER => array( 
            'Content-Type: application/json', 
            'Accept: application/json'), 
        ));

        $data = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
          
        if($err){
            die('Curl returned error: ' . $err);
        }
        $response =  json_decode($data, true);
        return $response['token'];

    }

    public function pay_form(){
        return view('pesapal.payform', [
            'pageTitle'         => 'Fill to Pay'
        ]);
    }

    public function pay_form_submit(Request $request){
        $request->validate(
            [
                'first_name' => 'required',
                'last_name' => 'required',
                'email_address' => 'required',
                'amount' => 'required'
            ]
        );
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://cybqa.pesapal.com/pesapalv3/api/Transactions/SubmitOrderRequest',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{
            "id": "TEST1515111110",
            "currency": "KES",
            "amount": "'.$request->amount.'",
            "description": "Payment description goes here",
            "callback_url": "https://www.myapplication.com/response-page",
            "notification_id": "fe078e53-78da-4a83-aa89-e7ded5c456e6",
            "billing_address": {
                "email_address": "'.$request->email_address.'",
                "phone_number": null,
                "country_code": "",
                "first_name": "'.$request->first_name.'",
                "middle_name": "",
                "last_name": "'.$request->last_name.'",
                "line_1": "",
                "line_2": "",
                "city": "",
                "state": "",
                "postal_code": null,
                "zip_code": null
            }
        }',
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer '. $this->request_token(),
            'Content-Type: application/json'
        ),
        ));

        $data = curl_exec($curl);
        $err = curl_error($curl);
       curl_close($curl);
       
        if($err){
            die('Curl returned error: ' . $err);
        }
        $response =  json_decode($data, true);
           dd($response);
           exit();

        $url =  $response['redirect_url'];

        return redirect($url);




    }
}
