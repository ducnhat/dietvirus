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
    public function index(Request $request)
    {
        if($request->session()->has('error')){
            $error = $request->session()->get('error');
        }else{
            $error = false;
        }

        return view('frontend.cart.index', compact(['error']));
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
     * Review cart items and checkout
     *
     * @param  no
     * @return Response
     */
    public function show()
    {
        return view('frontend.cart.review');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
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

        $this->checkCouponCondition();

        return redirect()->action('CartController@index');
    }

    /**
     * Check cart condition to apply coupon
     *
     * @param no
     * @return no
     */
    private function checkCouponCondition(){
        if(count(Cart::getConditions()) > 0){
            $condition = Cart::getCondition('promo')->getAttributes()['condition'];
            if($condition >= Cart::getSubtotal()){
                Cart::clearCartConditions();
            }
        }
    }

    /**
     * Update discount for user
     *
     * @param Request $request
     * @return Response
     */
    public function coupon(Request $request){
        $coupon = $request->get('coupon');

        $data = Coupon::check($coupon)->first();

        $error = array('error' => 'false', 'message' => null);

        if($data != null && $data->condition <= Cart::getTotal()){
            $condition = new \Darryldecode\Cart\CartCondition(array(
                'name' => $data->type,
                'type' => $data->type,
                'target' => $data->target,
                'value' => "-$data->value",
                'attributes' => ['coupon' => $data->coupon, 'condition' => $data->condition]
            ));

            Cart::condition($condition);
        }else{
            $error['error'] = true;
            $error['message'] = trans('coupon.coupon_error');

            $request->session()->flash('error', $error);
        }

        return redirect()->action('CartController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  no
     * @return Response
     */
    public function destroy()
    {
        Cart::clear();

        return redirect()->action('HomeController@index');
    }

    /**
     * Clear current coupon is being used
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function clearCoupon(){
        Cart::clearCartConditions();

        return redirect()->action('CartController@index');
    }

    /**
     * Remove an item from cart
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function removeItem(Request $request){
        $id = $request->get('id');
        Cart::remove($id);

        return redirect()->action('CartController@index');
    }
}
