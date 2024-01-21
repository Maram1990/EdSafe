<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::latest()->get()->paginate(3);
        return view('posts',compact('posts'));
    }


    public function show(Post $post)
    {
        return view('postshow',compact('post'));
    }

}
