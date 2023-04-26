<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AgentController;
use App\Http\Controllers\FeeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\PrintController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ProfileController;

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
    return view('auth/login');
});

Auth::routes([
    'register' => false, // Register Routes...
    'reset' => false, // Reset Password Routes...
    'verify' => false, // Email Verification Routes...

]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['middleware'=>['auth','role:user|admin|Super-Admin']], function(){
    Route::resource('roles',RoleController::class);
    Route::resource('fees',FeeController::class);
    Route::resource('agents',AgentController::class);
    Route::resource('users',UserController::class);
    Route::resource('applications',ApplicationController::class);
	
	//Route::get('autocomplete',[SearchController::class,'autocomplete'])->name('autocomplete');

    Route::get('applications/{id}/print',[PrintController::class,'index']);
    Route::resource('profile',ProfileController::class);

    Route::controller(SearchController::class)->group(function(){
        Route::get('demo-search', 'index');
        Route::get('autocomplete', 'autocomplete')->name('autocomplete');
    });

    
});
