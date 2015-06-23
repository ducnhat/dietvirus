<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use Cart;

class OrderController extends Controller
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
        }

        $order = Order::create($input);

        dd($order);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
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
