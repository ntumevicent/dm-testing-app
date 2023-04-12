<?php

namespace App\Http\Controllers\Api\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\User\UserResource;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Api\ApiController;
use App\Http\Resources\UserResource as User;

class UserController extends ApiController{

    public function __construct(UserResource $resource)
    {
        $this->resource = $resource;
    }

    public function trnx()
    {
       return Transaction::where('user_id',auth()->id())->where('user_type',1)->with('currency');
    }
    
    public function userInfo(){
        $success['user'] = new User(auth()->user());
        return $this->sendResponse($success,'success');
        
    }

    public function index()
    {
        //$success['wallets'] = Wallet::where('user_id',auth()->id())->where('user_type',1)->with('currency')->get();
        $success['transactions'] =  50000; //$this->trnx()->latest()->take(8)->get();

        return $this->sendResponse($success,'success');
    }
 

}