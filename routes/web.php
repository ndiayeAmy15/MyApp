<?php

use App\Http\Controllers\AuthController;
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



Route::controller(PageController::class)->group(function (){
    Route::get('/','load_home')->name('app_home');
    Route::get('/about','load_about')->name('app_about');
    Route::match(['get','post'],'/dashboard','load_dashboard')->name('app_dashboard');
});

Route::controller(AuthController::class)->group(function (){
    Route::get('/logout','logout')->name('app_logout');
    Route::match(['get','post'],'/activate_account/{token}','activate_account')->name('app_activate_account');
    Route::get('/user_checker','userChecker')->name('app_userChecker');
    Route::get('/resend_activation_code/{token}','resend_activation_code')->name('app_resend_activation_code');
    Route::match(['get','post'],'/change_mail/{token}','change_mail')->name('app_change_mail');
    Route::get('/activate_account_link/{token}','activate_account_link')->name('app_activate_account_link');

});
/*Route::match(['get','post'],'/login',[AuthController::class,'load_login'])->name('app_login');
Route::match(['get','post'],'/register',[AuthController::class,'load_login'])->name('app_login');*/

