<div class="left-sidebar">
    {{-- <div class="sidebar-profile-box">
        <img src="images/cover-pic.png" width="100%">
        <div class="sidebar-profile-info">
            <img src="images/user-1.png">
            <h1>Rayan Walton</h1>
            <h3>Web Developer at Micosoft</h3>
            <ul>
                <li>Your profile views<span>52</span></li>
                <li>Your post views<span>810</span></li>
                <li>Your connections<span>205</span></li>
            </ul>
        </div>
        <div class="sidebar-profile-link">
            <a href="#"><img src="images/items.png"> My items</a>
            <a href="#"><img src="images/premium.png"> Try Premium</a>
        </div>
    </div> --}}

    <div class="sidebar-activity" id="sidebarActivity">
        <h3>{{__('Joblink.RECENT')}}</h3>
        <a href="#"><img src="{{url('images/recent.png')}}"> Web Development</a>
        <a href="#"><img src="{{url('images/recent.png')}}"> User Interface</a>
        <a href="#"><img src="{{url('images/recent.png')}}"> Online Learning</a>
        <a href="#"><img src="{{url('images/recent.png')}}"> Learn Online</a>
        <a href="#"><img src="{{url('images/recent.png')}}"> Code Better</a>
        <a href="#"><img src="{{url('images/recent.png')}}"> Group Learning</a>
        <div class="discover-more-link">
            <a href="https://www.youtube.com/c/EasyTutorialsVideo?sub_confirmation=1">Discover more</a>
        </div>
    </div>

    <p id="showMoreLink" onclick="toggleActivity()">Show more <b>+</b></p>
</div>