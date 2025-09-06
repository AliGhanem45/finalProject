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
        @forelse(Auth::user()->searches as $search)
            <a href="#"><img src="{{url('images/recent.png')}}"> {{$search->content}}</a>
        @empty
            <p>{{__('Joblink.No searches')}}</p>
        @endforelse    
        <div class="discover-more-link">
            {{-- <a href="https://www.youtube.com/c/EasyTutorialsVideo?sub_confirmation=1">Discover more</a> --}}
        </div>
    </div>
    {{-- <div class="sidebar-ad">
            <small>Ad &middot; &middot; &middot;</small>
            <p>Master the 5 priciples of web design</p>
            <div>
                <img src="{{url('images/logo-white.jpg')}}">
                
            </div>
            <b>Brand and Demand in Xiaomi</b>
            <a href="https://www.youtube.com/c/EasyTutorialsVideo?sub_confirmation=1" class="ad-link">Learn More</a>
    </div> --}}

    <p id="showMoreLink" onclick="toggleActivity()">Show more <b>+</b></p>
</div>