<?php

namespace App\Http\Controllers;

use App\KeyWarranty;
use App\ProductKey;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\KeyRequest;

class KeyController extends Controller
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
    public function store(KeyRequest $request)
    {
        $input = $request->all();
        $key = ProductKey::where('key', $request->get('product_key_id'))->first();
        $input['product_key_id'] = $key->id;
        $input['status'] = 0;

        KeyWarranty::create($input);

        $key->warranty_at = Carbon::now()->toDateTimeString();
        $key->save();

        return redirect()->action('KeyController@index');
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

    public function warranty(){
        return view('frontend.key.warranty');
    }
}
