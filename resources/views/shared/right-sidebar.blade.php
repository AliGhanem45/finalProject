<div class="right-sidebar">
    <div class="sidebar-news">
        <img src="images/more.png" class="info-icon">
        <h3>{{__('Joblink.Trending news')}}</h3>
        @foreach($topPosts as $topPost)
        <a href="{{ route('posts.show',$topPost->id)}}">{{$topPost->content}}</a>
        <span>{{ $topPost->created_at->diffForHumans() }} &middot;{{$topPost->likes->count()}} Likes</span>
        @endforeach
        {{-- <a href="#">Careers growing horizontally too</a>
        <span>19h ago &middot; 1,552 readers</span>

        <a href="#">Less work visa for US, more for UK</a>
        <span>1d ago &middot; 27,290 readers</span>

        <a href="#">More hiring = higher confidence?</a>
        <span>18h ago &middot; 8,208 readers</span>

        <a href="#">Gautam Adani is the world's third richest</a>
        <span>12h ago &middot; 4,205 readers</span> --}}

        <a href="https://www.youtube.com/c/EasyTutorialsVideo?sub_confirmation=1" class="read-more-link">{{__('Joblink.Read more')}}</a>
        
    </div>
    <div class="sidebar-ad">
            <small>Ad &middot; &middot; &middot;</small>
            <p>Master the 5 priciples of web design</p>
            <div>
                <img src="{{url('images/logo-white.jpg')}}">
                
            </div>
            <b>Brand and Demand in Xiaomi</b>
            <a href="https://www.youtube.com/c/EasyTutorialsVideo?sub_confirmation=1" class="ad-link">Learn More</a>
    </div>

    

    <div class="sidebar-useful-links">
        <a href="#">{{__('Joblink.About')}}</a>
        <a href="#">Accessiblity</a>
        <a href="#">{{__('Joblink.Privacy Policy')}}</a>
        <div class="sidebar-useful-links">
            <a href="{{ route('language','ar') }}">ar</a>
            <a href="{{ route('language','en') }}">en</a>
        </div>
        

        <div class="copyright-msg">
            <img src="images/logo.jpg">
            <p>JobBridge &#169; 2025. {{__('Joblink.All right reserved')}}</p>
        </div>
    </div>

</div>