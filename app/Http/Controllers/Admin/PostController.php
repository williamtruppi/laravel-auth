<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /* $categories = Category::all();
        $tags = Tag::all(); */
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $slug = Str::slug($request->title);

        $validateData = $request->validate([
            'title' => 'required|unique:posts|max:255',
            'body' => 'required',
            /* 'category_id' => 'required|exists:categories,id',
            'tags' => 'exists:tags,id' */
        ]);
        
        $validateData['slug'] = $slug;

        Post::create($validateData);

        $new_post = Post::orderBy("id", "desc")->first();

        /* $new_post->tags()->attach($request->tags); */

        return redirect()->route("admin.posts.index", $new_post);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $slug = Str::slug($request->title);

        $validateData = $request->validate([
            'title' => 'required|unique:posts,id|max:255',
            'body' => 'required',
            /* 'category_id' => 'required|exists:categories,id',
            'tags' => 'exists:tags,id' */
        ]);
        
        $validateData['slug'] = $slug;

        $post->update($validateData);
        /* $post->tags()->sync($request->tags); */
        return redirect()->route("admin.posts.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index');
    }
}
