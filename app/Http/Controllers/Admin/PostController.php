<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\PostCactegory;
use App\Http\Requests\PostRequest;
use App\Post;
use Storage;
use Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $data = Post::orderBy('created_at', 'desc')->get();

        return view('admin.post.index', compact(['data']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $categories = PostCactegory::lists('name', 'id');

        return view('admin.post.create', compact(['categories']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(PostRequest $request)
    {
        $input = $request->all();
        $data = Post::create($input);
        $this->uploadImage($request, $data);

        return redirect()->action('Admin\PostController@index');
    }

    /**
     * Upload image from client to server
     * @param ProductRequest $request
     * @param Product $data
     */
    public function uploadImage(PostRequest $request, Post $data){
        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = $data->id;
            $ext = $file->getClientOriginalExtension();
            $image = Image::make($file)->resize(350, 220)->encode($ext);
            Storage::put(config('app.image_upload_path') . "posts/$filename.jpg", (string) $image);
            $data->image = "$filename.jpg";
            $data->save();
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
        $categories = PostCactegory::lists('name', 'id');
        $data = Post::findOrFail($id);

        return view('admin.post.edit', compact(['categories', 'data']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, PostRequest $request)
    {
        $input = $request->all();
        $data = Post::findOrFail($id);
        $data->update($input);
        $this->uploadImage($request, $data);

        return redirect()->action('Admin\PostController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $data = Post::findOrFail($id);
        $data->delete();

        return redirect()->action('Admin\PostController@index');
    }
}
