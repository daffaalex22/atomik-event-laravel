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

    // Getting Forms Data
    $data = [
        "name"=> request("name"),
        "email"=> request("email"),
        "coupon"=> request("coupon"),
    ];


    // Getting Counter Data
    $counter = 1;
    $counter_file = "./order-counter.txt";
    if (!file_exists($counter_file)) {
        touch($counter_file);
        $fp = fopen($counter_file, "r+");
        fwrite($fp, 1);
        fclose($fp);
    } else {
        $fp = fopen($counter_file, "r+");
        $counter = intval(fread($fp, filesize($counter_file)));
        fclose($fp);
    }

    $data["startCount"] = $counter;
    // Sending Mail
    Mail::to($data["email"])->send(new OrderCoupon($data));

    // Update Counter Data
    $counter = $counter + $data["coupon"];
    
    $fp = fopen($counter_file, "w"); 
    fwrite($fp, $counter);
    fclose($fp); 

    return redirect('/kupon');
});

Route::get('/about', function () {
    return view('about');
});