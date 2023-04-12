<?php

namespace App\Http\Controllers\Api\User;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Api\ApiController;
use App\Http\Resources\UserResource;

class AuthController extends ApiController
{
     /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'                => 'required',
            'email'               => 'required| unique:users',
           // 'phone'               => 'required',
           // 'address'             => 'required',
            'password'            => 'required|min:6',
        ],
        [
            'email.unique'  => 'the email is already taken'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error', $validator->errors());       
        }


        $data['name']          = $request->name;
        $data['phone']          = $request->phone;
        $data['address']        = $request->address;
        $data['email']          = $request->email;
        //$data['password']       = bcrypt($request->password);
        $data['password']       = Hash::make($request->password);
        $user = User::create($data);
        
        $success['token'] =  $user->createToken('wallet')->plainTextToken;
        $success['user']  =  new UserResource($user);

       Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password]);

       return $this->sendResponse($success, 'User registered successfully.');
    }
   
    /**
     * Login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'               => 'required',
            'password'            => 'required|min:6',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error', $validator->errors());       
        }
        
        $exist = User::where('email',$request->email)->first();
        if(!$exist){
           return $this->sendError('error',[ 'email' => 'Sorry! Email doesn\'t exist'] );
        }

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){ 
            $user = Auth::user(); 
            $success['token'] =  $user->createToken('wallet')->plainTextToken; 
            $success['user']  =  new UserResource($user);
            return $this->sendResponse($success, 'Login successful.');
        } 
        else{ 
            return $this->sendError('Error.', ['Unauthorised access']);
        } 
    }

    public function logout(Request $request)
    {
        $auth = Auth::guard('web');
        if(!$request->user()){
            return $this->sendError('Error.', ['Unauthorised access']);
        }
        $request->user()->currentAccessToken()->delete();

        //Auth::logout();
        $auth->logout();
        return $this->sendResponse(['success'], 'Logout successful.');
    }


}
