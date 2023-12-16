<?php

use App\Http\Controllers\KuponController;
use App\Mail\OrderCoupon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Console\Input;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/kupon', [KuponController::class,'index']);
Route::post('/kupon', [KuponController::class,'order']);
Route::get('/kupon/sukses', [KuponController::class,'successOrder']);