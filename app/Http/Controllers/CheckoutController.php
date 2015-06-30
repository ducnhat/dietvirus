<?php

namespace App\Http\Controllers;

use App\Events\DelaySendProductKey;
use App\Events\OrderWasPurchased;
use App\Jobs\SendDelayProductKeyEmail;
use App\Jobs\SendProductKeyEmail;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Order;
use Event;
use Carbon\Carbon;

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

    /**
     * Xác nhận thanh toán
     * Cập nhật trạng thái đơn hàng là đã thanh toán
     * Gủi email kèm mã bản quyền
     *
     * @param $id
     */
    public function confirm($id){
        $order = Order::findOrFail($id);
        $order->paid_at = Carbon::now()->toDateTimeString();
        $order->save();

        Event::fire(new OrderWasPurchased($order));
    }
}
