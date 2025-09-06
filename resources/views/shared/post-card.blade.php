<div class="post">
    <div class="post-author">
        <img src="{{$post->user->getProfilePic()}}">
        @can('delete',$post)
        <button form="deletePost" style=" cursor: pointer;position:absolute;width:20px;color:white;right:3px;top:4px;background: #ef4a4a;border:none" type="submit">X</button>
        @endcan
        <div>
            <h1>{{$post->user->name}}</h1>
            @if(Auth::user()->id !== $post->user->id)
                @if (Auth::user()->follows($post->user))
                    <form action="{{ route('users.unfollow',$post->user->id) }}" method="POST">
                        @csrf
                    <button class="follow" type="submit">{{__('Joblink.UnFollow')}}</button>
                @else
                    <form action="{{ route('users.follow',$post->user->id) }}" method="POST">
                        @csrf
                        <button class="follow" type="submit">{{__('Joblink.Follow')}}</button>

                @endif    
            @endif        
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
            <span class="liked-users">{{$post->likes->count()}}</span>
        </div>
        <div>
            <span>{{$post->comments->count()}} Comments</span>
        </div>
    </div>
    <div class="post-activity">
        <div>
            <img src="{{Auth::user()->profilePic ? asset('storage/' . Auth::user()->profilePic) : asset('storage/uploads/defaultUser.jpg')}}" class="post-activity-user-icon">
            <img src="{{url('images/down-arrow.png')}}" class="post-activity-arrow-icon">
        </div>
        <div class="post-activity-link-like">
            @if(Auth::user()->liking($post))
                <form action="{{ route('posts.unlike',$post->id) }}" method="POST">
                    @csrf
                    <div class="flex items-center gap-3">
                        <img src="{{url('images/like.png')}}">
                        <button type="submit">{{__('Joblink.UnLike')}}</button>
                    </div>
                    
                </form>
            @else
            <div class="flex items-center gap-3">
                <img style="margin-bottom:5px;" src="{{url('images/like.png')}}">
                <form action="{{ route('posts.like',$post->id) }}" method="POST">
                    @csrf  
                    <button style="font-size:16px;" type="submit">{{__('Joblink.Like')}}</button>  
                </form>  
            </div>    
            @endif        
        </div>
        <div class="post-activity-link-comment">
            <img style="width:25%;" src="{{url('images/comment.png')}}">
            <a href={{ route('posts.show',$post->id)}}>{{__('Joblink.Comment')}}</a>
        </div>
        
        
    </div>
</div>
@can('delete',$post)
<form id="deletePost" method="POST" action="{{ route('posts.destroy',$post->id) }}">
    @csrf
    @method('delete')
</form>
@endcan