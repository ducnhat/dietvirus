<?php

namespace App\Http\Controllers;

use App\Post;
use App\PostComment;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostCommentRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $data = Post::orderby('publish_at', 'desc')->orderby('created_at', 'desc')->where('is_published', 1)->get();

        return view('frontend.post.index', compact(['data']));
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
    public function store(PostCommentRequest $request)
    {
        $input = $request->all();
        $comment = new PostComment($input);
        $post = Post::findOrFail($request->get('post_id'));
        $post->comments()->save($comment);

        return redirect()->action('PostController@show', ['id' => $post->id, 'slug' => convertStringToSlug($post->title)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id, $slug)
    {
        $data = Post::findOrFail($id);

        return view('frontend.post.show', compact(['data']));
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
