<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
class LikePostController extends Controller
{
    public function like(Post $post){
        $user = auth()->user();
        $user->likes()->attach($post);
        return back();
    }
    public function unlike(Post $post){
        $user = auth()->user();
        $user->likes()->detach($post);
    }
}
