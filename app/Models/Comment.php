<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['id', 'content', 'created_at', 'post_id', 'user_id'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
    public function commentlike()
    {
        return $this->belongsToMany(User::class, 'comment_like')->withTimeStamps();
    }
    public function commentliking(Comment $comment)
    {
        return $this->commentlike()->where('comment_id', $comment->id)->exists();
    }
}
