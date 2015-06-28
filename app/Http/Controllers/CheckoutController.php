<?php

namespace App\Http\Controllers;

use App\Jobs\SendDelayProductKeyEmail;
use App\Jobs\SendProductKeyEmail;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Order;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    public function confirm($id){
        $order = Order::findOrFail($id);

        $f = $order->checkProductKeyQuantity();

        if($f){
//            $this->dispatch(new SendProductKeyEmail($order));
            $keys = $order->getProductKeys();

            foreach($keys as $key){

            }
        }else{
//            $this->dispatch(new SendDelayProductKeyEmail($order))->delay(7200);
        }
    }
}
