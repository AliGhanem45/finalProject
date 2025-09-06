<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use App\Mail\CommentOnPostEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Gate;

class CommentController extends Controller
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
    public function store(Post $post)
    {
       $validated = request()->validate([
            "content"=>"required|string|max:1000",
            "post_id" => "required|exists:posts,id",
        ]);
        $validated['user_id'] = auth()->user()->id;
        Comment::create($validated);
        $commentor = auth()->user();
        $postOwner = $post->user;
        Mail::to($postOwner->email)->send(new CommentOnPostEmail($commentor,$postOwner));
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function destroy(Comment $comment)
    {
        Gate::authorize('delete',$comment);
        $comment->delete();
        return back();
    }
}
