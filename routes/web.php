<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\MainController;
use App\Http\Middleware\CheckLogged;
use App\Http\Middleware\CheckRole;
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

// ->middleware('guest','language')

Route::get('/language/{locale}', [LanguageController::class, 'languageView']);

Route::get('/', function () {
    return view('index');
})->name('index_page')->middleware('language');

Route::get('/register',[AuthController::class, 'registerPage'])->name('register_page')
->middleware('language');
Route::post('/register',[AuthController::class, 'registerAcc'])->name('register_account');

Route::get('/login',[AuthController::class, 'loginPage'])->name('login_page')
->middleware('language');
Route::post('/login',[AuthController::class, 'loginAcc'])->name('login_account');

Route::get('/logout',[MainController::class, 'logout'])->name('logout'); 
Route::get('/logout/success',[MainController::class, 'logoutPage'])->name('logout_page')->middleware('language');; 

Route::get('/home',[MainController::class, 'homePage'])->name('home_page')
->middleware('logged','language');

Route::get('/items/{id}',[MainController::class, 'detailPage'])->name('detail_page')
->middleware('logged','language');
Route::post('/buyitems/{id}',[MainController::class, 'buyItem'])->name('buy_item')
->middleware('logged');
Route::post('/cancelitem/{id}',[MainController::class, 'cancelItem'])->name('cancel_item')
->middleware('logged');

Route::get('/cart',[MainController::class, 'cartPage'])->name('cart_page')
->middleware('logged','language');
Route::post('/checkout',[MainController::class, 'checkOut'])->name('check_out')
->middleware('logged');
Route::get('/checkout/success',[MainController::class, 'checkoutPage'])->name('success_checkout')
->middleware('logged','language');

Route::get('/profile',[MainController::class, 'profilePage'])->name('profile_page')
->middleware('logged','language');
Route::post('/profile',[MainController::class, 'profileUpdate'])->name('profile_update')
->middleware('logged');
Route::get('/save',[MainController::class, 'savePage'])->name('save_page')
->middleware('logged','language');

Route::get('/admin',[MainController::class, 'adminPage'])->name('admin_page')
->middleware('logged','role','language');
Route::get('/admin/managerole/{id}',[MainController::class, 'rolePage'])->name('role_page')
->middleware('logged','role','language');
Route::post('/admin/managerole/{id}',[MainController::class, 'roleUpdate'])->name('role_update')
->middleware('logged','role');
Route::post('/admin/deleterole/{id}',[MainController::class, 'roleDelete'])->name('role_delete')
->middleware('logged','role');
