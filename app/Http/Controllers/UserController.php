<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\CentralLogics\Helpers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function dashboard(){
        return view('auth.dashboard', [
            'pageTitle'         => 'User Dashboard'
        ]);
    }

    public function register_form(){
        return view('auth.register', [
            'pageTitle'         => 'Register'
        ]);
    }
    

    public function referal_register(Request $request, $referal_code){
       
        return view('auth.register', [
            'pageTitle'         => $referal_code
        ]);


    }

    public function register(Request $request) {

      $data = $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:4'
      ]);
      $tag = new Helpers();

      $user = new User();
      $user->name = $request->name;
      $user->email = $request->email;
      $user->referral_token =  $tag->referralCode();
      $user->password = Hash::make($request->password);
      $user->save();
   
      return redirect()->route('login.form')->with('message', 'Registered Successfully, please login');
      
    }



    public function referal_form($referral_token)
    {
        if($referral_token){
            $data['refer_name'] = User::where('referral_token',$referral_token)->first();
        }

        $data['pageTitle'] = "Register";
        return view('auth.referal',$data);
    }


    public function referal(Request $request) {

        $data = $request->validate([
          'name' => 'required',
          'email' => 'required|email|unique:users',
          'password' => 'required|min:4'
        ]);
        $tag = new Helpers();
  
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->refer_id = $request->refer_id;
        $user->referral_token =  $tag->referralCode();
        $user->password = Hash::make($request->password);
        $user->save();
     
        return redirect()->route('login.form')->with('message', 'Registered Successfully, please login');
      }


    public function login_form(){
        return view('auth.login', [
            'pageTitle'         => 'Login'
        ]);
    }
    

    public function login(Request $request) {

        $request->validate( [
          'email'   => 'required|email',
          'password' => 'required'
        ]);


      if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password])) {

        return redirect(route('user.dashboard'));

      }
      return back()->with('error','Sorry! Credentials Mismatch.');
    }

    public function logout()
    {
        $auth = Auth::guard('web');
        Auth::guard('web')->logout();
        return redirect(route('login.form'));
    }

}
