<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'location',
        'profession',
        'bio',
        'role',
        'profilePic',
        'coverPic'
    ];
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function searches()
    {
        return $this->hasMany(Search::class);
    }
    public function followings()
    {
        return $this->belongsToMany(User::class, 'follower_user', 'follower_id', 'user_id')->withTimeStamps();
    }
    public function followers()
    {
        return $this->belongsToMany(User::class, 'follower_user', 'user_id', 'follower_id')->withTimeStamps();
    }
    public function follows(User $user)
    {
        return $this->followings()->where('user_id', $user->id)->exists();
    }
    public function likes()
    {
        return $this->belongsToMany(Post::class, 'like_post')->withTimeStamps();
    }
    public function liking(Post $post)
    {
        return $this->likes()->where('post_id', $post->id)->exists();
    }
    public function commentlike()
    {
        return $this->belongsToMany(Comment::class, 'comment_like')->withTimeStamps();
    }
    public function commentliking(Comment $comment)
    {
        return $this->commentlike()->where('comment_id', $comment->id)->exists();
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function getProfilePic()
    {
        if ($this->profilePic) {
            return url('storage/' . $this->profilePic);
        }
        return asset('storage/uploads/defaultUser.jpg');
    }
    public function getCoverPic()
    {
        if ($this->coverPic) {
            return url('storage/' . $this->coverPic);
        }
        return asset('storage/uploads/defaultUser.jpg');
    }
}
