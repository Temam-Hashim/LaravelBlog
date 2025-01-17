<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $posts = Post::all();
        // $posts = Post::orderBy("created_at","desc")->paginate(10);
        $posts = Post::latest()->paginate(5);
        return view("posts.index",['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        Auth::user()->posts()->create($fields);

        return back()->with('success','Post created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }


    // rest api for post
    public function getAllPosts()
    {
        $posts = Post::all();
        return response()->json($posts);
    }
    public function addPosts(Request $request)
    {
        $fields = $request->validate([
            'title'=> 'required',
            'content'=>'required',
            'user_id'=>'required',
        ]);
        $posts = Post::create($fields);
        return response()->json($posts, 201);
    }
}
