<?php

namespace App\Http\Controllers;

use App\Order;
use App\Payu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OrdersController extends Controller
{

    public function show() {
        return view('orders.show');
    }

    public function summary() {
        $cart = Session::has('cart') ? Session::get('cart') : null;
        return view('orders.summary', ['cart'=>$cart]);
    }





    public function buy()
    {
        $user = Auth::user();

        $cart = Session::has('cart') ? Session::get('cart') : null;
        $order_id = uniqid();

        $data = [
            "notifyUrl" => "http://idgu.ct8.pl/shop/public/orders/catchresponsepayu",
            'continueUrl' => "http://idgu.ct8.pl/shop/public",
            "customerIp" => "127.0.0.1",
            "merchantPosId" => "309731",
            "description" => "RTV market",
            "extOrderId"=> $order_id,
            "currencyCode" => "PLN",
            "totalAmount" => $cart->totalPrice * 100,
            "buyer" => [
                "email" => $user->email,
                "phone" => $user->phone,
                "firstName" => $user->name,
                "lastName" => $user->surname,
                "language" => "pl"
            ],
            "settings" =>[
                "invoiceDisabled" =>"true"
            ],
            "products" => []
        ];


        $order_data = [];
        $order_data['products'] = '';
        $order_data['user_id'] = $user->id;
        $order_data['status'] = 'PENDING';
        $order_data['totalAmount'] = $data['totalAmount'];
        $order_data['adress'] = $user->adress;
        $order_data['orderId'] = $order_id;

        $first = true;

        foreach ($cart->items as $key => $item) {
            if ($first) {
                $first=false;
            }else {
                $order_data['products'] .= '|';
            }

            $data['products'][] = [
                'name' => $item['item']->brand . ' ' . $item['item']->model,
                "unitPrice" => $item['item']->price*100,
                "quantity" => $item['qty']
            ];

            $order_data['products'] .= $key . '-' . $item['qty'];
        }


        $payu = new Payu();

        $order = new Order();
        $order->create($order_data);

        Session::forget('cart');
        return $payu->buyOrderRequest($data);


    }



    public function catchResponsePayu(Request $request)
    {
        $payu = new Payu();
        $payu->catchRequest($request);


        if($payu->authorize()) {
            $payu->updateSatus();
        }

    }

    public function test()
    {
        $order = Order::where('orderId', '=', '5a5907dc199bc')->first();
        $order->status = 'COMPLETED';
        $order->save();
    }

}
