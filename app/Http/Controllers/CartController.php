<?php

namespace App\Http\Controllers;

use App\Coupon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Cart;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        if(Cart::isEmpty()){
            $data = false;
        }else{
            $data = Cart::getContent();
        }

        return view('frontend.cart.index', compact(['data']));
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
    public function store(Request $request)
    {
        Cart::add($request->all());

        return redirect()->action('CartController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show()
    {
        Cart::clear();

        return redirect()->action('HomeController@index');
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
    public function update(Request $request)
    {
        $input = $request->all();

        foreach($input['quantity'] as $id => $val){
            $newQuantity = $val[0];
            $oldQuantity = Cart::get($id)->quantity;
            Cart::update($id, array('quantity' => $newQuantity - $oldQuantity));
        }

        return redirect()->action('CartController@index');
    }

    /**
     * Update discount for user
     *
     * @param Request $request
     * @return Response
     */
    public function coupon(Request $request){
        echo $coupon = $request->get('coupon');

        $data = Coupon::check($coupon)->first();

        dd($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy()
    {
        Cart::clear();

        return redirect()->action('HomeController@index');
    }
}
