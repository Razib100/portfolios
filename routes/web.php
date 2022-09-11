<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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
    return view('frontend.master');
});

Route::middleware(['auth:sanctum', 'verified', 'authAdmin'])->group(function(){
    Route::get('/admin/dashboard' , [AdminController::class, 'index'])->name('admin');
});
