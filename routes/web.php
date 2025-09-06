<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\LikePostController;
use App\Http\Controllers\CommentLikeController;
use App\Http\Controllers\FeedController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/aboutus', function () {
    return view('aboutus');
})->name('about');
Route::get('/lang/{lang}', function ($lang) {
    app()->setLocale($lang);
    session()->put('locale', $lang);
    return back();
})->name('language');

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/explore', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/feed', [FeedController::class, 'index'])->name('feed');
    Route::get('/users', [DashboardController::class, 'user_list'])->name('userList');
    Route::get('/users/follow', [DashboardController::class, 'follower_list'])->name('followList');
});

Route::middleware('auth')->group(function () {
    Route::get('/profiles', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/profiles/{user}', [ProfileController::class, 'show'])->name('profile.show');
    Route::patch('/profiles', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profiles', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
route::resource('posts', PostController::class)->except(['index', 'create']);
Route::delete('/profiles/{user}', [ProfileController::class, 'deleteProfilePic'])->name('delete.profile.pic');
Route::delete('/profile/{user}', [ProfileController::class, 'deleteCoverPic'])->name('delete.cover.pic');
route::resource('comments', CommentController::class)->only(['index', 'store']);
Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
Route::post('/comments/{post}', [CommentController::class, 'store'])->name('comments.store');
Route::post('/users/{user}/follow', [FollowController::class, 'follow'])->middleware('auth')->name('users.follow');
Route::post('/users/{user}/unfollow', [FollowController::class, 'unfollow'])->middleware('auth')->name('users.unfollow');
Route::post('posts/{post}/like', [LikePostController::class, 'like'])->middleware('auth')->name('posts.like');
Route::post('posts/{post}/unlike', [LikePostController::class, 'unlike'])->middleware('auth')->name('posts.unlike');
Route::post('comments/{comment}/like', [CommentLikeController::class, 'like'])->middleware('auth')->name('comments.like');
Route::post('comments/{comment}/unlike', [CommentLikeController::class, 'unlike'])->middleware('auth')->name('comments.unlike');


Route::middleware(['auth', 'role:admin'])->prefix("/admin")->controller(AdminController::class)->group(function () {
    // Route::get("/dashboard", 'admin_dashboard')->name("admin.dashboard");
    Route::get("/users", 'get_all_users')->name("admin.dashboard");
    Route::get("/posts/{user}", 'get_all_posts')->name("admin.posts.dashboard");
    Route::get("/comments/{post}", 'get_all_comments')->name("admin.comments.dashboard");
    Route::delete("/users/{user}/delete", 'delete_user')->name("admin.users.destroy");
    Route::get("/users/{user}/view", 'view_user')->name("admin.view_user");
    Route::delete("/comments/{comment}/delete", 'delete_comment')->name("admin.delete_comment");
});


require __DIR__ . '/auth.php';
