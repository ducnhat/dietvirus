<?php

namespace App\Http\Controllers\Admin;

use App\Events\ProductKeyWasWarranted;
use App\KeyWarranty;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\WarrantyRequest;
use Event;

class WarrantyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $data = KeyWarranty::all();

        return view('admin.warranty.index', compact(['data']));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $data = KeyWarranty::findOrFail($id);

        return view('admin.warranty.show', compact(['data']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $data = KeyWarranty::findOrFail($id);

        return view('admin.warranty.edit', compact(['data']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, WarrantyRequest $request)
    {
        $data = KeyWarranty::findOrFail($id);
        $input = $request->all();
        $input['resolve_at'] = Carbon::now()->toDateTimeString();
        $data->update($input);
        $data->save();

        if($data->is_warranted){
            Event::fire(new ProductKeyWasWarranted());
        }

        return redirect()->action('Admin\WarrantyController@index');
    }
}
