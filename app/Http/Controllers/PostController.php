<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::latest()->paginate(12);
        return view('posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'questiontext' => 'required',
            'postimg' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]
        );
        $input = $request->all();

        if ($postimg = $request->file('postimg')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $postimg->getClientOriginalExtension();
            $postimg->move($destinationPath, $profileImage);
            $input['postimg'] = "$profileImage";
        }
        Post::create($input);
        return redirect()->route('posts.index')->with('success','q created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('success','q deleted successfully');
    }
}
