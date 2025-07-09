<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['id', 'content', 'created_at', 'image','video','user_id','updated_at'];
        protected $with = ['comments','user'];

    public function comments(){
        return $this->hasMany(Comment::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function likes(){
        return $this->belongsToMany(User::class,'like_post')->withTimeStamps();
    }
    Public function liking(Post $post){
        return $this->likes()->where('post_id',$post->id)->exists();
    }
    public function getPostPic(){
        if($this->image){
            return url('storage/' . $this->image);
        }
    }
}
