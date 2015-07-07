<?php

namespace App\Http\Controllers\Admin;

use App\Product;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Storage;
use App\Http\Requests\ProductRequest;
use Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $data = Product::all();

        return view('admin.product.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(ProductRequest $request)
    {
        $input = $request->all();
        $data = Product::create($input);

        $this->uploadImage($request, $data);

        return redirect()->action('Admin\ProductController@index');
    }

    /**
     * Upload image from client to server
     * @param ProductRequest $request
     * @param Product $data
     */
    public function uploadImage(ProductRequest $request, Product $data){
        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = $data->id;
            $ext = $file->getClientOriginalExtension();
            $image = Image::make($file)->fit(300)->encode($ext);
            Storage::put(config('app.image_upload_path') . "products/$filename.jpg", (string) $image);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $data = Product::findOrFail($id);

        return view('admin.product.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, ProductRequest $request)
    {
        $input = $request->all();
        $data = Product::findOrFail($id);
        $data->update($input);
        $data->save();

        $this->uploadImage($request, $data);

        return redirect()->action('Admin\ProductController@index');
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
