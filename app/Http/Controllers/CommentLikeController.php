<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Comment;
use App\Mail\LikeOnCommentEmail;
use Illuminate\Support\Facades\Mail;
class CommentLikeController extends Controller
{
    public function like(Comment $comment){
        $user = auth()->user();
        $user->commentlike()->attach($comment);
        $commentOwner = $comment->user;
        Mail::to($commentOwner->email)->send(New LikeOnCommentEmail($commentOwner,$user));
        return back();
    }
    public function unlike(Comment $comment){
        $user = auth()->user();
        $user->commentlike()->detach($comment);
        return back();
    }
}
