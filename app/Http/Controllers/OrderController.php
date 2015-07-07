<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use Cart;
use App\OrderItems as OrderItem;
use Event;
use App\Events\OrderWasAdded;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
//        echo 'asd';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(OrderRequest $request)
    {
        $input = $request->all();
        $input['subtotal'] = Cart::getSubtotal();
        $input['total'] = Cart::getTotal();

        if(count(Cart::getConditions()) > 0){
            $input['discount'] = Cart::getCondition('promo')->getCalculatedValue(Cart::getSubtotal());
            $input['coupon'] = Cart::getCondition('promo')->getAttributes()['coupon'];
        }

        $order = Order::create($input);

        $items = Cart::getContent();

        foreach($items as $item) {
            $item = new OrderItem(array(
                'product_id' => $item->id,
                'name' => $item->name,
                'price' => $item->price,
                'quantity' => $item->quantity
            ));

            $order->orderItems()->save($item);
        }

        Event::fire(new OrderWasAdded($order));

        return redirect()->action('CartController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $order = Order::findOrFail($id);

        return view('emails.invoice', compact(['order']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
