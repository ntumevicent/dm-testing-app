<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\BillCategory;
use App\Models\Bill;
use App\Models\BillTransaction;
use Illuminate\Http\Request;
use App\CentralLogics\Helpers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function index(){
        return view(view: 'reload.index');
    }

    public function getUsers(request $request){
        $users = User::all();

        return view('reload.users', [
           'users'         =>  $users
        ]);

        //return view(view: 'reload.users', compact(varname: 'users'))
    }

    public function getHome(request $request){
        return view(view: 'reload.home');
    }

    public function pagers(){
        return view('reload.pagers', [
            'pageTitle'         =>  'View Swipe Tabs'
         ]);
    }

    public function getPeople(){
        return view('reload.people', [
            'pageTitle'         =>  'Another Table'
         ]);
    }

    public function getTabs(){
        $bill_categories = BillCategory::all();
        $tabs = [];

        foreach ($bill_categories as $bill_category) {
            $bills = Bill::where('bill_category_id', $bill_category->id)->get();
            $tabs[$bill_category->id] = [
                'bill_category_name' => $bill_category->bill_category_name,
                'bill_category_status' => $bill_category->bill_category_status,
                'bill_category_show' => $bill_category->bill_category_show,
                'bills' => $bills
            ];
        }


        return view('tabs.index', [
            'pageTitle'         =>  'Tabs Testing Page',
            'tabs' => $tabs
         ]);
    }
}
