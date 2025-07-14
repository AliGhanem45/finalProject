<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\LikePostController;
use App\Http\Controllers\CommentLikeController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/lang/{lang}', function ($lang) {
    app()->setLocale($lang);
    session()->put('locale',$lang);
    return back();
})->name('language');
Route::get('/users', function () {
    return view('user-list');
})->name('userList');
Route::get('/explore',[DashboardController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profiles', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/profiles/{user}', [ProfileController::class, 'show'])->name('profile.show');
    Route::patch('/profiles', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profiles', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
route::resource('posts',PostController::class)->except(['index','create']);
Route::delete('/profiles/{user}',[ProfileController::class , 'deleteProfilePic'])->name('delete.profile.pic');
Route::delete('/profile/{user}',[ProfileController::class, 'deleteCoverPic'])->name('delete.cover.pic');
route::resource('comments',CommentController::class)->only(['index','store']);
Route::delete('/comments/{comment}',[CommentController::class,'destroy'])->name('comments.destroy');
Route::post('/users/{user}/follow',[FollowController::class,'follow'])->middleware('auth')->name('users.follow');
Route::post('/users/{user}/unfollow',[FollowController::class,'unfollow'])->middleware('auth')->name('users.unfollow');
Route::post('posts/{post}/like',[LikePostController::class,'like'])->middleware('auth')->name('posts.like');
Route::post('posts/{post}/unlike',[LikePostController::class,'unlike'])->middleware('auth')->name('posts.unlike');
Route::post('comments/{comment}/like',[CommentLikeController::class,'like'])->middleware('auth')->name('comments.like');
Route::post('comments/{comment}/unlike',[CommentLikeController::class,'unlike'])->middleware('auth')->name('comments.unlike');
Route::get('/users', function () {
    return view('user-list');
})->name('users.list');
require __DIR__.'/auth.php';
