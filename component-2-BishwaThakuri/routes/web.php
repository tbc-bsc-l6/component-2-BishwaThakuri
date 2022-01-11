<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Middleware\Admin;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;

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


// Route::get('ping', function() {
// 	$mailchimp = new \MailchimpMarketing\ApiClient();

// 	$mailchimp->setConfig([
// 		'apiKey' => config('services.mailchimp.key'),
// 		'server' => 'us20'
// 	]);

// 	$response = $mailchimp->lists->getAllLists();
// 	ddd($response);
// });





Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware'=>'admin'],function(){
    Route::resource('/admin/users','AdminUsersController');
});

Route::get('/form', function () {
    return view('form');
});

Route::get('/update', function () {
    return view('update-form');
});

Route::post('/addproduct', [ProductController::class, 'saveproduct'])->name('addproduct');

Route::post('updateproduct/{id}',[ProductController::class,'updateProduct'])->name('update');

Route::get('editproduct/{id}',[ProductController::class,'editProduct'])->name('edit');

Route::get('deleteproduct/{id}',[ProductController::class,'deleteProduct'])->name('delete');

Route::get('components/body', [ProductController::class,'index']);

Route::post('newsletter',function(){
    request()->validate(['email'=>'required|email']);
    $mailchimp= new \MailchimpMarketing\ApiClient();
    $mailchimp->setConfig([
        'apiKey'=>config('services.mailchimp.key'),
        'server'=>'us20'
    ]);
    try{
        $response=$mailchimp->lists->addListMember('1cf2f16ad2',[
            'email_address'=>request('email'),
            'status'=>'subscribed'
        ]);
    }
    catch (\Exception $e){
       throw \Illuminate\Validation\ValidationException::withMessages([
            'email' =>'this email could not be added at newsletter list'
        ]);
    }
 	return redirect('/dashboard')->with('success','your are signed to our newsletter');
});

Route::get('search', function () {
    return view('form');
});

Route::get('user-profile', [UserController::class, 'profile'])->name('user-profile');

// Code to check if the csrf token is working or not 
// Route::get('/token', function (Request $request) {
//     $token = $request->session()->token();

//     $token = csrf_token();
//     echo $token;
// });

