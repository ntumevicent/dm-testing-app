<?php

use App\Http\Controllers\TestingController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\SimplexController;
use App\Http\Controllers\PesapalController;
use App\Http\Controllers\PesaController;
use App\Http\Controllers\AjaxController;

use App\Http\Controllers\UserController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\PageController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/validatebill', [TestingController::class, 'validatebillaccount']);
Route::get('/paybill', [TestingController::class, 'paybill']);
Route::get('/checkbillstatus', [TestingController::class, 'checkbillstatus']);
Route::get('/checkbalance', [TestingController::class, 'checkbalance']);
Route::get('/airtelmoneycheckno', [TestingController::class, 'airtelmoneycheckno']);
Route::get('/airtelmoneycheckstatus', [TestingController::class, 'airtelmoneycheckstatus']);
Route::get('/airtelmoneycashin', [TestingController::class, 'airtelmoneycashin']);
Route::get('/airtelmoneycashout', [TestingController::class, 'airtelmoneycashout']);
Route::get('/getdueamountanddate', [TestingController::class, 'getdueamountanddate']);
Route::get('/airtimetopup', [TestingController::class, 'airtimetopup']);
Route::get('/topup', [TestingController::class, 'topup']);

Route::get('/payments', [PaymentController::class, 'payment']);
Route::get('/paybills', [PaymentController::class, 'bills'])->name('payment.bills');
Route::get('/buyairtime', [PaymentController::class, 'airtime'])->name('payment.airtime');
Route::get('/airtimeform', [PaymentController::class, 'airtimeform'])->name('airtime.form');
Route::get('/dataform', [PaymentController::class, 'dataform'])->name('data.form');

Route::get('/register/{referral_token}', [UserController::class, 'referal_form']);
Route::post('/referal', [UserController::class, 'referal'])->name('referal.submit');
Route::get('/register', [UserController::class, 'register_form'])->name('register.form');
Route::post('/register', [UserController::class, 'register'])->name('register.submit');
Route::get('/loginform', [UserController::class, 'login_form'])->name('login.form');
Route::post('/login', [UserController::class, 'login'])->name('login.submit');
Route::get('/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
Route::get('logout',     [UserController::class,'logout'])->name('user.logout');

//Route::get('/register/{referal_code}', [UserController::class, 'referal_register'])->name('refer.form');



Route::get('/billcategories', [BillController::class, 'billcategories'])->name('bill.categories');
Route::get('/testing', [BillController::class, 'testingform']);
Route::post('/testing', [BillController::class, 'testingform_submit'])->name('testingsubmit');
Route::get('/billcategories/viewbillcategory/{id}', [BillController::class, 'viewbillcategory'])->name('bill_category.detail');

Route::get('/validatemeternumber/{payee_code}', [BillController::class, 'validatemeterform'])->name('metercheck.detail');
Route::post('/checkmeternumber', [BillController::class, 'checkmeternumber'])->name('check.meternumber');

Route::get('/validatedstvaccount', [BillController::class, 'validatedstvform']);

Route::get('/billcategories/umemeform', [BillController::class, 'umemeform'])->name('umeme_bill.form');
Route::post('/billcategories/payumemeyaka', [BillController::class, 'payumemeyaka'])->name('pay.umemeyaka');
Route::get('/transactions', [BillController::class, 'transactions'])->name('bill.transactions');

//simplex
Route::get('/getquoteform', [SimplexController::class, 'getQuoteForm']);
Route::get('/getquote', [SimplexController::class, 'getQuote']);
//Route::post('/getquote', [SimplexController::class, 'getQuote']);
Route::get('/paymentrequest', [SimplexController::class, 'paymentRequest']);
Route::get('/paymentform', [SimplexController::class, 'paymentForm']);



//pesapal
Route::get('/generatetoken', [PesapalController::class, 'request_token']);
Route::get('/registeripnurl', [PesapalController::class, 'register_ipn_url']);
Route::get('/getipnlist', [PesapalController::class, 'get_ipn_list']);
Route::get('/submitorder', [PesapalController::class, 'submit_order']);

Route::get('/payform', [PesaController::class, 'pay_form']);
Route::post('/payform', [PesaController::class, 'pay_form_submit'])->name('pesapal.payform_submit');



//testing ajax submitt form
Route::get('/ajaxform', [AjaxController::class, 'ajaxform']);
Route::get('/ajaxtestform', [AjaxController::class, 'ajaxRequest']);
Route::post('/ajaxform', [AjaxController::class, 'ajax_form_submit'])->name('ajax.ajaxform_submit');
Route::post('/ajaxtestform', [AjaxController::class, 'ajaxRequestStore'])->name('ajax.request.store');

Route::get('/currency', [CurrencyController::class, 'index']);

Route::get('/page', [PageController::class, 'index']);
Route::get('/getUsers', [PageController::class, 'getUsers'])->name('reload.getusers');
Route::get('/getHome', [PageController::class, 'getHome'])->name('reload.gethome');
Route::get('/getPeople', [PageController::class, 'getPeople'])->name('reload.getpeople');

Route::get('/pagers', [PageController::class, 'pagers']);

Route::get('/tabs', [PageController::class, 'getTabs']);
Route::post('/tabs', [PageController::class, 'tabsSubmit'])->name('tabs-submit');
Route::post('/tabs/{id}', [PageController::class, 'getBillsData'])->name('bill.data');





