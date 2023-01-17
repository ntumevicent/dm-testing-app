<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\CentralLogics\Helpers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class CurrencyController extends Controller
{
    public function index(){
        return view('currency.currency', [
            'pageTitle'         => 'Currency Locale'
        ]);
    }



}
