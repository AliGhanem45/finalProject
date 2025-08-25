
<nav class="navbar">
    <div class="navbar-left">
        <a href="{{ Route('dashboard') }}" class="logo"><img src="{{url('images/logo.jpg')}}"></a>

        <div class="search-box">
            <img src="{{url('images/search.png')}}">
            <form action="{{request()->is('users') ? route("userList") : route('dashboard') }}" method="GET">
                @csrf
                <input name="search" type="text" placeholder="Search..">
            </form>

        </div>

    </div>
    <div class="navbar-center">
        <ul>
            <li><a href="{{route("dashboard")}}" class="{{request()->is("explore") ? "active-link"  : " "}}"><img src="{{url('images/home.png')}}"> <span>Home</span></a></li>
            <li><a href="#"><img src="{{url('images/network.png')}}"> <span>My Network</span></a></li>
            <li><a class="{{request()->is("users") ? "active-link"  : " "}}" href="{{route('userList')}}"><img src="{{url('images/jobs.png')}}"> <span>People</span></a></li>
            <li><a class="{{request()->is("feed") ? "active-link"  : " "}}" href="{{ route('feed') }}"><img src="{{url('images/message.png')}}"> <span>Feed</span></a></li>
            <li><a href="#"><img src= "{{url('images/notification.png')}}"> <span>Notifications</span></a></li>
        </ul>
    </div>
    <div class="navbar-right">
        <div class="online">
            <img src="{{Auth::user()->profilePic ? asset('storage/' . Auth::user()->profilePic) : asset('storage/uploads/defaultUser.jpg')}}" class="nav-profile-img" onclick="toggleMenu()">
        </div>
    </div>
<!-- --------------- profile-drop-down-menu---------- -->
    <div class="profile-menu-wrap" id="profileMenu">
        <div class="profile-menu">
            <div class="user-info">
                <img src="{{Auth::user()->profilePic ? asset('storage/' . Auth::user()->profilePic) : asset('storage/uploads/defaultUser.jpg')}}">
                <div>
                    <h3 style="margin-bottom:3px">{{Auth::user()->name}}</h3>
                    <a href="{{route('profile.show',Auth::user()->id)}}">See your profile</a>
                </div>
            </div>
            <hr>
            <a href="{{route('profile.edit')}}" class="profile-menu-link">
                <img src="{{url('images/network.png')}}">
                <p>{{ __('edit Profile') }}</p>
            </a>
            <hr>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="{{ route('logout') }}" class="profile-menu-link"  onclick="event.preventDefault();
                                                this.closest('form').submit();">
                    <img src="{{url('images/logout.png')}}">
                    <p>Logout</p>
                    <span>></span>
                </a>
            </form>
        </div>
    </div>

</nav>
