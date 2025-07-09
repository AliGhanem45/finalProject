<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class FollowController extends Controller
{
    public function follow(User $user){
        $follower = auth()->user();
        $follower->followings()->attach($user);
        return back();
    
    }
    public function unfollow(User $user){
        $follower = auth()->user();
        $follower->followings()->detach($user);
        return back();
    
    }
}


