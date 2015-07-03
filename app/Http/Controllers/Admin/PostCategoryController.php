<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostCategoryRequest;
use App\PostCactegory;

class PostCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $data = PostCactegory::all();

        return view('admin.post-category.index', compact(['data']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.post-category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(PostCategoryRequest $request)
    {
        $input = $request->all();
        PostCactegory::create($input);

        return redirect()->action('Admin\PostCategoryController@index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $data = PostCactegory::findOrFail($id);

        return view('admin.post-category.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, PostCategoryRequest $request)
    {
        $data = PostCactegory::findOrFail($id);
        $input = $request->all();
        $data->update($input);
        $data->save();

        return redirect()->action('Admin\PostCategoryController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $data = PostCactegory::findOrFail($id);
        $data->delete();

        return redirect()->action('Admin\PostCategoryController@index');
    }
}
