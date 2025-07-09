<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Comment;
class CommentLikeController extends Controller
{
    public function like(Comment $comment){
        $user = auth()->user();
        $user->commentlike()->attach($comment);
        return back();
    }
    public function unlike(Comment $comment){
        $user = auth()->user();
        $user->commentlike()->detach($comment);
        return back();
    }
}
