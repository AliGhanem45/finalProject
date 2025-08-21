@extends( auth()->user()->role == 0 ? 'layouts.adminlayout' : 'layouts.layout')
@section('content')
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
            @if(Auth::user()->id!==$user->id)
            <div class="profile-btn">
                @if (Auth::user()->follows($user))
                    <form action="{{ route('users.unfollow',$user->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="primary-btn">{{__('Joblink.UnFollow')}}</button>
                    </form>
                @else
                    <form action="{{ route('users.follow',$user->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="primary-btn">{{__('Joblink.Follow')}}</button>
                    </form>
                @endif
            </div>
            @endif
        </div>
    </div>
    <div class="profile-description">
        <h2>{{__('Joblink.About')}}</h2>
        <p style="width=80%;">{{$user->bio}}</p>
    </div>
    <hr>
    <div class="profile-description" style=" background:#f0f2f5;padding-bottom:0px;margin-left:50px;width:82%;">
        @forelse($posts as $post)
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
            <span>22 comments</span>
        </div>
    </div>
    <div class="post-activity">
        <div>
            <img src="{{Auth::user()->profilePic ? asset('storage/' . Auth::user()->profilePic) : asset('storage/uploads/defaultUser.jpg')}}" class="post-activity-user-icon">
            <img src="{{url('images/down-arrow.png')}}" class="post-activity-arrow-icon">
        </div>
        <div class="post-activity-link-like">
            <img src="{{url('images/like.png')}}">
            <a>{{__('Joblink.Like')}}</a>
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
        @empty
        @endforelse

    </div>
</div>
<!-- ------profile-sidebar------ -->
    <div class="profile-sidebar">
        <div class="sidebar-people">
            <h3>{{__('People you may know')}}</h3>
            @foreach ($topUsers as $topUser )
            @if(Auth::user()->id==$topUser->id)
            @continue
            @endif
                <div class="sidebar-people-row">
                    <img src="{{$topUser->getProfilePic()}}">
                    <div>
                        <a href="{{route('profile.show',$topUser->id)}}">{{$topUser->name}}</a>
                        <p>{{$topUser->profession}}</p>
                        @if (Auth::user()->follows($topUser))
                            <form action="{{ route('users.unfollow',$topUser->id) }}" method="POST">
                                @csrf
                                <button type="submit">{{__('Joblink.UnFollow')}}</button>
                            </form>
                        @else
                            <form action = "{{ route('users.follow',$topUser->id) }}" method = "POST">
                                @csrf
                            <button type="submit">{{__('Joblink.Follow')}}</button>
                            </form>
                        @endif
                    </div>
                </div>
            @endforeach

        </div>
        <div class="sidebar-useful-links">
            <a href="#">About</a>
            <a href="#">Accessiblity</a>
            <a href="#">Privacy Policy</a>
            <div class="sidebar-useful-links">
            <a href="{{ route('language','ar') }}">ar</a>
            <a href="{{ route('language','en') }}">en</a>
            </div>


            <div class="copyright-msg">
                <img src="{{url('images/logo.jpg')}}">
                <p>JobBridge &#169; 2025. All right reserved</p>
            </div>
        </div>
    </div>
</div>







<script>

    let profileMenu = document.getElementById("profileMenu");

    function toggleMenu(){
        profileMenu.classList.toggle("open-menu");
    }

</script>

</body>
</html>
@endsection
