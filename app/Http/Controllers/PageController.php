<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\BillCategory;
use App\Models\Bill;
use App\Models\Photo;
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

    public function tabsSubmit(Request $request){
          $new_bill = new Bill();
          $new_bill->bill_category_id = $request->bill_id;
          $new_bill->bill_name = 'testing';
          $new_bill->payee_code = 'testing';
          $new_bill->bill_icon = 'fa-credit-card';
          $new_bill->save();
          return redirect()->route('bill.categories')->with('success', 'Bill category added successfully');
    }



    public function getBillsData($id){
        $bill_data = Bill::find($id);
        $data = $bill_data->bill_name;

        return $data;
    }

    

    public function viewbillcategoryf($id){
        $bill_category = BillCategory::find($id);
        $get_bills = Bill::with('bill_category')->where('bill_category_id', $id)->get();

        return view('pages.billcategory', [
            'get_bills'         => $get_bills,
            'pageTitle'         => $bill_category->bill_category_name
        ]);
    }

    public function getBills(){
        $bills = Bill::all();

        return view('pages.bills', [
            'bills'         => $bills,
            'pageTitle'         => 'Bills'
        ]);
    }

    public function billChangeStatus(Request $request){
        $bill_id =  $request->bill_id;
        $bill_status = $request->bill_status;
        Bill::where('id', $bill_id)->update(['bill_status' => $bill_status]);

        return response()->json([
            'success' => 'Status updated successfully!'
        ]);
    }

    public function getSurvey(){
        //$bills = Bill::all();

        return view('survey.survey', [
            'pageTitle'         => 'Survey'
        ]);
    }

    public function getBlogs(){
        $bills = Bill::all();
        $photos = Photo::all();
        $bill_categories = BillCategory::all();

        return view('pages.blogs', [
            'photos'   => $photos,
            'bills'             => $bills,
            'pageTitle'         => 'Bills'
        ]);
    }
}
