<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use App\Http\Requests\ProductKeyRequest;

use App\Http\Requests;
use App\Http\Controllers\Admin\Controller;
use App\ProductKey;

class ProductKeyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $data = ProductKey::all();

//        dd($data);
        return view('admin.product-key.index', compact(['data']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $products = Product::lists('name', 'id')->sortBy('name')->all();

        return view('admin.product-key.create', compact(['products']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(ProductKeyRequest $request)
    {
        $input = $request->all();
        ProductKey::create($input);

        return redirect()->action('Admin\ProductKeyController@index');
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
