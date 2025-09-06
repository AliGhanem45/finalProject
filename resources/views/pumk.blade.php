@extends('layouts.layout')
@section('content')
    <!-- -------left-sidebar------------ -->
    {{-- <div class="left-sidebar">
      <div class="sidebar-profile-box">
        <img src="images/cover-pic.png" width="100%" />
        <div class="sidebar-profile-info">
          <img src="images/user-1.png" />
          <h1>Rayan Walton</h1>
          <h3>Web Developer at Micosoft</h3>
          <ul>
            <li>Your profile views<span>52</span></li>
            <li>Your post views<span>810</span></li>
            <li>Your connections<span>205</span></li>
          </ul>
        </div>
        <div class="sidebar-profile-link">
          <a href="#"><img src="images/items.png" /> My items</a>
          <a href="#"><img src="images/premium.png" /> Try Premium</a>
        </div>
      </div>

      <div class="sidebar-activity" id="sidebarActivity">
        <h3>RECENT</h3>
        <a href="#"><img src="images/recent.png" /> Web Development</a>
        <a href="#"><img src="images/recent.png" /> User Interface</a>
        <a href="#"><img src="images/recent.png" /> Online Learning</a>
        <a href="#"><img src="images/recent.png" /> Learn Online</a>
        <a href="#"><img src="images/recent.png" /> Code Better</a>
        <a href="#"><img src="images/recent.png" /> Group Learning</a>
        <h3>GROUPS</h3>
        <a href="#"><img src="images/group.png" /> Web Design Group</a>
        <a href="#"><img src="images/group.png" /> HTML & CSS Learners</a>
        <a href="#"><img src="images/group.png" /> Python & JavaScript Group</a>
        <a href="#"><img src="images/group.png" /> Learn Coding Online</a>
        <h3>HASHTAG</h3>
        <a href="#"><img src="images/hashtag.png" /> webdevelopment</a>
        <a href="#"><img src="images/hashtag.png" /> userinterface</a>
        <a href="#"><img src="images/hashtag.png" /> onlinelearning</a>
        <div class="discover-more-link">
          <a
            href="https://www.youtube.com/c/EasyTutorialsVideo?sub_confirmation=1"
            >Discover more</a
          >
        </div>
      </div>

      <p id="showMoreLink" onclick="toggleActivity()">Show more <b>+</b></p>
    </div> --}}
    @include('shared.left-sidebar')
    <!-- الماين سيكشن (بين السايد بارز) -->
    <main class="main-content py-8">
      <h1 class="text-xl font-semibold mb-6 mt--1">{{__('Joblink.People you may know')}}</h1>

      <div class="flex flex-col gap-4">
        <!-- Card 1 -->
        @forelse ($users as $user)
        @if($user->id == Auth::user()->id || Auth::user()->follows($user))
        @continue
        @endif
        <div
          class="bg-white rounded-2xl shadow-sm ring-1 ring-gray-200 p-4 flex items-center justify-between hover:shadow-md transition"
        >
          <div class="flex items-center gap-4">
            <img
              src="{{$user->profilePic ? asset('storage/' . $user->profilePic) : asset('storage/uploads/defaultUser.jpg')}}"
              alt="profile"
              class="w-14 h-14 rounded-full object-cover"
            />
            <div>
              <h2 class="font-medium"><a href="{{ route('profile.show',$user->id) }}">{{$user->name}}</a></h2>
              <p class="text-sm text-gray-600">{{$user->profession}}</p>
            </div>
          </div>
          @if (Auth::user()->follows($user))
            <form action="{{ route('users.unfollow',$user->id) }}" method="POST">
                @csrf
              <button type="submit"
              class="px-4 py-2 rounded-xl text-white linkedin-blue hover:opacity-95 transition text-sm font-medium"
              >
              {{ __('Joblink.UnFollow') }}
              </button>
            </form>
          @else
            <form action="{{ route('users.follow',$user->id) }}" method="POST">
              @csrf
              <button type="submit"
              class="px-4 py-2 rounded-xl text-white linkedin-blue hover:opacity-95 transition text-sm font-medium"
              >
              {{ __('Joblink.Follow') }}
              </button>
            </form>
          @endif  
        </div>
        @empty
          <p>no results match </p>
      @endforelse
        {{-- <!-- Card 2 -->
        <div
          class="bg-white rounded-2xl shadow-sm ring-1 ring-gray-200 p-4 flex items-center justify-between hover:shadow-md transition"
        >
          <div class="flex items-center gap-4">
            <img
              src="https://randomuser.me/api/portraits/men/32.jpg"
              alt="profile"
              class="w-14 h-14 rounded-full object-cover"
            />
            <div>
              <h2 class="font-medium">Omar Sayegh</h2>
              <p class="text-sm text-gray-600">Growth Marketer</p>
            </div>
          </div>
          <button
            class="px-4 py-2 rounded-xl text-white linkedin-blue hover:opacity-95 transition text-sm font-medium"
          >
            Follow
          </button>
        </div> --}}

        <!-- Card 3 -->
        {{-- <div
          class="bg-white rounded-2xl shadow-sm ring-1 ring-gray-200 p-4 flex items-center justify-between hover:shadow-md transition"
        >
          <div class="flex items-center gap-4">
            <img
              src="https://randomuser.me/api/portraits/women/68.jpg"
              alt="profile"
              class="w-14 h-14 rounded-full object-cover"
            />
            <div>
              <h2 class="font-medium">Sara Khoury</h2>
              <p class="text-sm text-gray-600">UX Designer</p>
            </div>
          </div>
          <button
            class="px-4 py-2 rounded-xl text-white linkedin-blue hover:opacity-95 transition text-sm font-medium"
          >
            Follow
          </button>
        </div> --}}
      </div>
    </main>
    <!-- ------------right-sidebar--------------- -->
    {{-- <div class="right-sidebar">
      <div class="sidebar-news">
        <img src="images/more.png" class="info-icon" />
        <h3>Trending News</h3>
        <a href="#">High demand for skilled manpower</a>
        <span>1d ago &middot; 10,934 readers</span>

        <a href="#">Careers growing horizontally too</a>
        <span>19h ago &middot; 1,552 readers</span>

        <a href="#">Less work visa for US, more for UK</a>
        <span>1d ago &middot; 27,290 readers</span>

        <a href="#">More hiring = higher confidence?</a>
        <span>18h ago &middot; 8,208 readers</span>

        <a href="#">Gautam Adani is the world's third richest</a>
        <span>12h ago &middot; 4,205 readers</span>

        <a
          href="https://www.youtube.com/c/EasyTutorialsVideo?sub_confirmation=1"
          class="read-more-link"
          >Read More</a
        >
      </div>

      <div class="sidebar-ad">
        <small>Ad &middot; &middot; &middot;</small>
        <p>Master the 5 priciples of web design</p>
        <div>
          <img src="images/user-1.png" />
          <img src="images/mi-logo.png" />
        </div>
        <b>Brand and Demand in Xiaomi</b>
        <a
          href="https://www.youtube.com/c/EasyTutorialsVideo?sub_confirmation=1"
          class="ad-link"
          >Learn More</a
        >
      </div>

      <div class="sidebar-useful-links">
        <a href="#">About</a>
        <a href="#">Accessiblity</a>
        <a href="#">Help Center</a>
        <a href="#">Privacy Policy</a>
        <a href="#">Advertising</a>
        <a href="#">Get the App</a>
        <a href="#">More</a>

        <div class="copyright-msg">
          <img src="images/logo.png" />
          <p>Linkedup &#169; 2022. All right reserved</p>
        </div>
      </div>
    </div> --}}
    @include('shared.right-sidebar')
  </body>
</html>
@endsection
