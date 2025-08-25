@extends('layouts.layout')
@section('content')
<!-- -------left-sidebar------------ -->
    @include('shared.left-sidebar')
<!-- -----------------main-content------------ -->
    <div class="main-content">

        @include('shared.create-post')
        <div class="sort-by">
            <hr>

        </div>
        <p>Suggested For You</p>
        @foreach ($posts as $post)
        @include('shared.post-card')
        @endforeach

    </div>
<!-- ------------right-sidebar--------------- -->
    @include('shared.right-sidebar')


<script>

    let profileMenu = document.getElementById("profileMenu");

    function toggleMenu(){
        profileMenu.classList.toggle("open-menu");
    }

</script>

<script>

    let sideActivity = document.getElementById("sidebarActivity");
    let moreLink = document.getElementById("showMoreLink");

    function toggleActivity(){
        sideActivity.classList.toggle("open-activity");

        if(sideActivity.classList.contains("open-activity")){
            moreLink.innerHTML = "Show less <b>-</b>";
        }
        else{
            moreLink.innerHTML = "Show more <b>+</b>";
        }
    }

</script>



</body>
</html>
@endsection
