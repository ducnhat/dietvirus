<?php

namespace App\Http\Controllers\User;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $data = User::findOrFail(Auth::user()->id);

        return view('user.user.edit', compact(['data']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, UserRequest $request)
    {
        $input = $request->all();
        $data = User::findOrFail($id);

        if(!strlen($input['password'])){
            unset($input['password']);
        }

        $data->update($input);
        $data->save();

        return redirect()->action('User\UserController@show', $data->id);
    }
}
