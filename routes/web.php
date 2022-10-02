<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\frontend\IndexController;

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

Route::get('/', [IndexController::class, 'index']);

Route::middleware(['auth:sanctum', 'verified', 'authAdmin'])->group(function(){
    Route::get('/admin/dashboard' , [AdminController::class, 'index'])->name('admin');
    //    Contact creation
    Route::resource('/contact',\App\Http\Controllers\ContactController::class);
    //    Bank creation
    Route::resource('/bank',\App\Http\Controllers\BankController::class);
    //    Document creation
    Route::resource('/document',\App\Http\Controllers\DocumentController::class);
    //    Footer creation
    Route::resource('/footer',\App\Http\Controllers\FooterController::class);
    Route::post('footer/status', [\App\Http\Controllers\FooterController::class,'footerStatus'])->name('footer.status');
});
