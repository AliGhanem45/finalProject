<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
class FeedController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $followingIDs = $user->followings()->pluck('user_id');
        $posts = Post::whereIn('user_id',$followingIDs)->latest();
        if(request()->has('search')){
            $posts = $posts->where('content','like','%' . request()->get('search','') . '%')->latest();
        }
        return view('feed',["posts"=>$posts->paginate(100)]);
    }
}
