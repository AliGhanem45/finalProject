<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\User;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function get_all_users()
    {
        $users = User::where("role", 1)->get();
        if (request()->has('search')) {
            $users = User::where('name', 'like', '%' . request()->get('search', '') . '%')->get();
        }

        return view("admin/usersList", ['users' => $users]);
    }
    // public function admin_dashboard()
    // {
    //     //مافي شي هون
    //     $users = User::latest();
    //     if (request()->has('search')) {
    //         $users = User::where('name', 'like', '%' . request()->get('search', '') . '%')->latest();
    //     }

    //     return view("admin/adminDashboard");
    // }




    public function delete_user(User $user)
    {
        $user->delete();
        return redirect()->back();
    }
    public function view_user(User $user)
    {
        $user->load(['posts', 'comments', 'comments.post', 'comments.post.user']);

        return view("admin/user-activities", ['user' => $user]);
    }
    public function delete_comment(Comment $comment)
    {
        $comment->delete();
        return redirect()->back();
    }
}
