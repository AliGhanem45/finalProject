<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Mail\NewFollowerEmail;
use Illuminate\Support\Facades\Mail;
class FollowController extends Controller
{
    public function follow(User $user){
        $follower = auth()->user();
        $follower->followings()->attach($user);
        Mail::to($user->email)->send(New NewFollowerEmail($follower,$user));
        return back();
    
    }
    public function unfollow(User $user){
        $follower = auth()->user();
        $follower->followings()->detach($user);
        return back();
    
    }
}


