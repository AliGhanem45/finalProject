<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
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
    public function store()
    {
        $validated = request()->validate([
            "content"=>"required|min:5|max:1000",
            "image"=>"image",
        ]);
        if(request()->has('image')){
            $imagePath = request()->file('image')->store('postUploads','public');
            $validated['image'] = $imagePath;
        }
        if(request()->has('video')){
            $videoPath = request()->file('video')->store('postUploads','public');
            $validated['video'] = $videoPath;
        }
        $validated['user_id'] = auth()->user()->id;
        Post::create($validated);
        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('shared.post-show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('dashboard');
    }
}
