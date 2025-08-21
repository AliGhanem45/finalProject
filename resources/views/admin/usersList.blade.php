@extends('layouts.adminlayout')

@section('content')
<div class="  px-6 py-10">
    <h1 class="text-3xl font-bold text-blue-700 mb-8">Users Management</h1>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach ($users as $user)
        <div class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 p-6 flex flex-col items-center text-center">

            <!-- Profile Image -->
            <div class="w-24 h-24 mb-4">
  <img src="{{$user->profilePic ? asset('storage/' . $user->profilePic) : asset('storage/uploads/defaultUser.jpg')}}"
                 alt="{{ $user->name }}"
                 class="w-24 h-24 rounded-full object-cover border-4 border-blue-500 shadow-md ">

            </div>

            <!-- User Info -->
            <h2 class="text-lg font-bold text-gray-800">{{ $user->name }}</h2>
            <p class="text-sm text-gray-600">{{ $user->profession }}</p>
            <p class="text-sm text-gray-500 flex items-center justify-center mt-2">
                <svg class="w-4 h-4 mr-1 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                {{ $user->location }}
            </p>

            <!-- Delete Button -->
            <div class="flex items-center justify-between px-4">
  <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
                  onsubmit="return confirm('Are you sure you want to delete this user?');"
                  class="mt-6">
                @csrf
                @method('DELETE')
                <button type="submit"
                        class="px-6 py-2 bg-red-600 hover:bg-red-700 text-white font-medium text-sm rounded-lg shadow-md transition">
                    Delete
                </button>
            </form>
            <a role="button" class=" mt-6 px-6 py-2 bg-green-600 hover:bg-green-700 text-white font-medium text-sm rounded-lg shadow-md transition" href={{route("admin.view_user",$user->id)}}>View User</a>
            </div>

        </div>
    @endforeach
</div>
</div>
@endsection
