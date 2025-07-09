<div class="post">
    <div class="post-author">
        <img src="{{$post->user->getProfilePic()}}">
        <button form="deletePost" style=" cursor: pointer;position:absolute;width:20px;color:white;right:3px;top:4px;background: #ef4a4a;border:none" type="submit">X</button>
        <div>
            <h1>{{$post->user->name}}</h1>
            <button class="follow" type="submit">{{__('Joblink.Follow')}}</button>
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
                    <img src="{{url('images/like.png')}}">
                    <button type="submit">{{__('Joblink.UnLike')}}</button>
                </form>
            @else
                <form action="{{ route('posts.like',$post->id) }}" method="POST">
                    @csrf   
                    <img src="{{url('images/like.png')}}">
                    <button type="submit">{{__('Joblink.Like')}}</button>
                </form>  
            @endif        
        </div>
        <div class="post-activity-link-comment">
            <img src="{{url('images/comment.png')}}">
            <a href={{ route('posts.show',$post->id)}}>{{__('Joblink.Comment')}}</a>
        </div>
        
        
    </div>
</div>
<form id="deletePost" method="POST" action="{{ route('posts.destroy',$post->id) }}">
    @csrf
    @method('delete')
</form>