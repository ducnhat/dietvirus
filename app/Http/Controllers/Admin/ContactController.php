<?php

namespace App\Http\Controllers\Admin;

use App\Events\ContactWasReplied;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Contact;
use App\Http\Requests\ReplyMessageRequest;
use Event;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $data = Contact::orderBy('is_reply')->orderBy('created_at', 'desc')->get();

        return view('admin.contact.index', compact(['data']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $data = Contact::findOrFail($id);

        return view('admin.contact.edit', compact(['data']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, ReplyMessageRequest $request)
    {
        $data = Contact::findOrFail($id);
        $input = $request->all();
        $input['reply_at'] = Carbon::now()->toDateTimeString();
        $input['is_reply'] = 1;
        $data->update($input);
        $data->save();

        Event::fire(new ContactWasReplied($data));

        return redirect()->action('Admin\ContactController@index');
    }

    public function show($id)
    {
//        $contact = Contact::findOrFail($id);
//
//        return view('emails.contact', compact(['contact']));
    }
}
