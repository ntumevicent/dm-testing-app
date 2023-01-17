<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AjaxController extends Controller
{
    public function ajaxform(){
        return view('ajax.testform', [
            'pageTitle'         => 'Testing Ajax Form'
        ]);
    }

    public function ajax_form_submit(Request $request){

        $request->validate( [
            'name' => 'required',
            'email' => 'required',
            'amount' => 'required'
         ], [
            'name.required' => 'please enter your name boss',
        ]);
        

        if($request['email'] != 'mme@gmail.com' ){
            return response()->json(['errors' => 'You have put a wrong email' ]);
        }

        
    }

    

    public function ajaxRequest()
    {
        return view('ajax.ajaxform', [
            'pageTitle'         => 'Testing Ajax Form 2'
        ]);
    }


    public function ajaxRequestStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required',
            'email' => 'required|email',
            'address' => 'required',
        ]);

        if($request['email'] != 'mme@gmail.com' ){
            return response()->json(['error' => 'You have put a wrong email' ]);
        }

        if ($validator->passes()) {

            // Store Data in DATABASE from HERE 
            

            return response()->json(['success'=>'Added new records.']);
            
        }

        return response()->json(['error'=>$validator->errors()]);
    }


}
