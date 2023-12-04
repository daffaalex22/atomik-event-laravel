<?php

use App\Mail\OrderCoupon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

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

Route::get('/kupon', function () {
    return view('kupon');
});

Route::post('/kupon', function () { 

    $data = [
        "name"=> request("name"),
        "email"=> request("email"),
        "coupon"=> request("coupon"),
    ];

    Mail::to($data["email"])->send(new OrderCoupon($data));

    return redirect('/kupon');
});

Route::get('/about', function () {
    return view('about');
});