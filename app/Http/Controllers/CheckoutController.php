<?php

namespace App\Http\Controllers;

use App\Events\OrderWasPurchased;
use App\Jobs\SendDelayProductKeyEmail;
use App\Jobs\SendProductKeyEmail;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Order;
use Event;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {


    }

    public function test($id){
        $order = Order::findOrFail($id);

        return view('emails.product_keys', compact(['order']));
    }

    public function confirm($id){
        $order = Order::findOrFail($id);

        $f = $order->checkProductKeyQuantity();

        if($f){
//            echo 'đủ hàng';
            Event::fire(new OrderWasPurchased($order));
        }else{
            echo 'không đủ hàng';
//            $this->dispatch(new SendDelayProductKeyEmail($order))->delay(7200);
        }
    }
}
