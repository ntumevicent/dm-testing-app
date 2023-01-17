<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PesapalController extends Controller
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

    public function register_ipn_url(){
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://cybqa.pesapal.com/pesapalv3/api/URLSetup/RegisterIPN',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{
            "url": "https://www.myapplication.com/ipn",
            "ipn_notification_type": "GET"
        }',
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer '. $this->request_token(),
            'Accept: application/json',
            'Content-Type: application/json'
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
          
        if($err){
            die('Curl returned error: ' . $err);
        }
        return $response;
    }

    public function get_ipn_list(){
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://cybqa.pesapal.com/pesapalv3/apiURLSetup/GetIpnList',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return $response;

    }

    public function submit_order(){
        $billing_address = array(
            "email_address" => "john.doe@example.com",
            "phone_number" => null,
            "country_code" => "",
            "first_name" => "John",
            "middle_name" => "",
            "last_name" => "Doe",
            "line_1" => "",
            "line_2" => "",
            "city" => "",
            "state" => "",
            "postal_code" => null,
            "zip_code" => null
        );

        $order_details = array(
            "id" => "TEST1515111110",
            "currency" => "KES",
            "amount" => 100.00,
            "description" => "Payment description goes here",
            "callback_url" => "https://www.myapplication.com/response-page",
            "notification_id" => "fe078e53-78da-4a83-aa89-e7ded5c456e6",
            "billing_address" => $billing_address
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
            "amount": 100.00,
            "description": "Payment description goes here",
            "callback_url": "https://www.myapplication.com/response-page",
            "notification_id": "fe078e53-78da-4a83-aa89-e7ded5c456e6",
            "billing_address": {
                "email_address": "john.doe@example.com",
                "phone_number": null,
                "country_code": "",
                "first_name": "John",
                "middle_name": "",
                "last_name": "Doe",
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

        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
          
        if($err){
            die('Curl returned error: ' . $err);
        }
        return $response;

    }



}
