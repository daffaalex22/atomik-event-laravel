<?php

namespace App\Http\Controllers;

use App\Mail\OrderCoupon;
use Carbon\Carbon;
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
    
        // Midtrans Get Snap Token
        \Midtrans\Config::$serverKey = env("MIDTRANS_SERVER_KEY_SANDBOX");
        \Midtrans\Config::$isProduction = env("IS_PRODUCTION") === "true";
        \Midtrans\Config::$isSanitized = true;
    
        $params = array(
            'transaction_details' => array(
                'order_id' => $data["email"] . strval(Carbon::now()->timestamp),
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

    public function successOrder() {
        return view('success');
    }

    public function mailCode() {
        $transactionStatus = request('transaction_status');
        $fraudStatus = request('fraud_status');

        if (
            $transactionStatus != 'capture' ||
            $transactionStatus != 'settlement' ||
            $fraudStatus != 'accept'
        ) {
            return;
        }
        
        $orderId = request('order_id');

        // In a realistic scenario, these data will be 
        // obtained from a database
        $data = [
            'name'=> 'Buyer',
            'email'=> $this->extractEmail($orderId),
            'coupon'=> 3,
        ];

        // Sending Mail
        Mail::to($data["email"])->send(new OrderCoupon($data));
    }

    private function extractEmail($orderId) {
        preg_match_all("/[a-z0-9_\-\+\.]+@[a-z0-9\-]+\.([a-z]{2,4})(?:\.[a-z]{2})?/i", $orderId, $matches);
        $email = $matches[0][0];

        return $email;
    }
}
