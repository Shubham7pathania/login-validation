<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Razorpay\Api\Api;

class RazorpayController extends Controller
{
    public function formPage(){
        return view('payment');
    }

    public $api;

    public function __construct()
    {
        $this->api = new Api(config('services.razorpay.key'), config('services.razorpay.secret'));
    }

    public function makeOrder(Request $request){
        $request->validate([
            'amount' => 'required|numeric',
        ]);

        $orderid = rand(111111,999999);
        $orderData = [
            'receipt' => 'rcptid_11',
            'amount' => $request->get('amount') * 100,
            'currency' => 'INR',
            'notes' => [
                'order_id' => $orderid,
            ]
        ];

        $razorpayOrder = $this->api->order->create($orderData);

        //  dd($razorpayOrder);

        return view('order_details', compact('orderid','razorpayOrder'));
    }

    public function success(Request $request){
        dd($request->all());
    }
}