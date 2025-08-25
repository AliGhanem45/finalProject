<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Search;
use App\Models\User;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ids = User::where('profession', auth()->user()->profession)->pluck('id');

        $posts = Post::whereIn('user_id', $ids)->get();

        if (request()->has('search')) {
            $posts = Post::where('content', 'like', '%' . request()->get('search', '') . '%')->latest();
            $search = Search::create([
                'content' => request()->get('search'),
                'user_id' => auth()->user()->id
            ]);
        }
        return view('explore', ["posts" => $posts]);
    }

    public function user_list()
    {

        $users = User::where("role", 1)->get();

        if (request()->has("search")) {
            $users = User::where("name", 'like', "%" . request()->get("search", "") . "%")->get();
        }
        return view('user-list', ['users' => $users]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
