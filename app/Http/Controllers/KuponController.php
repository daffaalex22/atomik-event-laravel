<?php

namespace App\Http\Controllers;

use App\Mail\OrderCoupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class KuponController extends Controller
{
    //
    public function order() {
        if (request("button") == "Batal Beli") {
            return redirect('/kupon');
        }
    
        // Getting Forms Data
        $data = [
            "name" => request("name"),
            "email" => request("email"),
            "coupon" => request("coupon"),
        ];
    
        // Split Into First and Last Name
        $string = $data["name"];
        $last_space = strrpos($string, " ");
        $data["first_name"] = substr($string, 0, $last_space);
        $data["last_name"] = substr($string, $last_space + 1);
    
    
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
    
        if (env('USE_MAILING') === 'true') {
            Mail::to($data["email"])->send(new OrderCoupon($data));
        }
        
    
        // Update Counter Data
        $counter = $counter + $data["coupon"];
        
        $fp = fopen($counter_file, "w"); 
        fwrite($fp, $counter);
        fclose($fp);
    
        // Midtrans Payment
    
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'SB-Mid-server-03XnJAZR--SJtcDSjace9Mpk';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
    
        $params = array(
            'transaction_details' => array(
                'order_id' => $data["startCount"],
                'gross_amount' => $data["coupon"] * intval(env("COUPON_PRICE")),
            ),
            'customer_details' => array(
                'first_name' => $data["first_name"],
                'last_name' => $data["last_name"],
                'email' => $data["email"]
            ),
        );
    
        $snapToken = \Midtrans\Snap::getSnapToken($params);
    
        return redirect('/kupon')->with([
            'snapToken' => $snapToken,
            'orderData' => $data,
        ]);
    }

    public function index() {
        $dummyOrderData = [
            'name'=> '',
            'email'=> '',
            'coupon'=> '',
        ];
    
        return view('kupon', [
            'snapToken'=> session()->get('snapToken') ?? "",
            'orderData' => session()->get('orderData') ?? $dummyOrderData,
        ]);
    }
}
