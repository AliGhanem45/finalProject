@extends('layouts.adminlayout')

@section('content')
<div class="w-full">
    <h1 class="text-3xl my-4 py-3">{{$user->name}} activities</h1>
    <div class="profile-main">
    <div class="profile-container">
        <div>
            <img style="height:250px;object-fit:cover;" src="{{$user->getCoverPic()}}" width="100%">
        </div>
        <div class="profile-container-inner">
            <img src="{{ $user->getProfilePic() }}" alt="profile-pic" class="profile-pic">
            <h1>{{$user->name}}</h1>
            <p style="margin-top=7px;">{{$user->profession}}</p>
            <p style="margin-top=3px;">{{$user->location}}</a></p>

            </div>

        </div>
    </div>
    <div class="profile-description">
        <h2>{{__('Joblink.About')}}</h2>
        <p style="width=80%;">{{$user->bio}}</p>
    </div>
    <hr>
    <h1 class="text-3xl font-bold">{{$user->name}}`s posts</h1>
    <div class="profile-description" style=" background:#f0f2f5;">
        @forelse($user->posts as $post)
        <div class="post">
        <div class="post-author">
        <img src="{{$post->user->getProfilePic()}}">
        <button form="deletePost" class="rounded-xl p-2 w-20" style=" cursor: pointer;position:absolute;color:white;right:3px;top:4px;background: #ef4a4a;border:none" type="submit">Delete Post</button>
        <div>
            <h1>{{$post->user->name}}</h1>

            <small>{{$post->user->profession}}</small>
            <small>{{$post->created_at->diffForHumans()}}</small>
        </div>
    </div>
    <p>{{$post->content}}</p>
    @if($post->image||$post->video)
    <div>
        <img src="{{$post->getPostPic()}}" width="100%">
    </div>
    @endif
    <div class="post-stats">
        <div>
            <img src="{{url('images/thumbsup.png')}}">
            <span class="liked-users">Abhinav Mishra and 75 others</span>
        </div>
        <div>
            <span>22 comments</span>
        </div>
    </div>

</div>
<form id="deletePost" method="POST" action="{{ route('posts.destroy',$post->id) }}">
    @csrf
    @method('delete')
</form>
        @empty
        @endforelse

    </div>
</div>
{{--  --}}



</div>
<div class="mt-6 w-10/12 mx-auto">
    <div class="bg-white shadow-lg rounded-2xl p-6">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">{{$user->name}} Comments </h2>

        @forelse($user->comments as $comment)
            <div class="mb-6 border-b border-gray-200 pb-6 last:border-0 last:pb-0">

                {{-- Post Card --}}
                <div class="flex items-start gap-3 mb-3">
                    {{-- Post User Avatar --}}
                    <img src="{{$comment->post->user->getProfilePic()}}"
                         alt="{{ $comment->post->user->name }}"
                         class="w-12 h-12 rounded-full border">

                    {{-- Post Info --}}
                    <div>
                        <h3 class="font-semibold text-gray-800">{{ $comment->post->user->name }}</h3>
                        <p class="text-sm text-gray-500">Posted on {{ $comment->post->created_at->format('M d, Y H:i') }}</p>

                        {{-- Post Content --}}
                        <div class="bg-gray-50 p-4 rounded-xl mt-2">
                            <span class="inline-block px-2 py-1 text-xs font-semibold bg-blue-100 text-blue-600 rounded-full mb-2">Post</span>
                            <p class="text-gray-700">{{ $comment->post->content }}</p>
                        </div>
                    </div>
                </div>

                {{-- Comment Section --}}
                <div class="ml-14">
                    <div class="bg-gray-100 p-4 rounded-xl">
                        <span class="inline-block px-2 py-1 text-xs font-semibold bg-green-100 text-green-600 rounded-full mb-2">Comment</span>
                        <p class="text-gray-800">{{ $comment->content }}</p>
                        <div class="flex justify-between">
                             <p class="text-xs text-gray-500 mt-2">Commented on {{ $comment->created_at->format('M d, Y H:i') }}</p>
                        <button type="submit" style="background-color: red" form="com-del" class="rounded-xl bg-red-500 p-2  text-white">delete comment</button>
                    </div>
                    <form action={{route("admin.delete_comment",$comment->id)}} id="com-del" method="POST">
                        @csrf
                        @method("delete")
                    </form>
                    </div>
                </div>

            </div>
        @empty
            <p class="text-gray-500">No comments yet.</p>
        @endforelse
    </div>
</div>
@endsection
