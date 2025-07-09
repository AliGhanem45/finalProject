<div class="create-post">
    <form enctype="multipart/form-data" action="{{ Route('posts.store') }}" method="POST">
        @csrf
        <div class="create-post-input">
            <img src="{{ Auth::user()->profilePic ? asset('storage/' . Auth::user()->profilePic) : asset('storage/uploads/defaultUser.jpg') }}">
            <textarea name="content" rows="2" placeholder="{{__('Joblink.Write a post')}}"></textarea>
        </div>
        @error('content')
                <p style="color:red;margin-left:5px;">{{$message}}</p>
        @enderror
        <div class="create-post-links">
            <li><img src="images/photo.png"><label style="cursor: pointer;" for="image">{{__('Joblink.Photo')}}</label>
                <input type="file" name="image" id="image" style="display:none;">
            </li>
            <li><img src="images/video.png"><label style="cursor: pointer;" for="video">{{__('Joblink.Video')}}</label>
                <input type="file" name="video" id="video" style="display:none;"></li>
            <li><img src="images/event.png">Event</li>
            <li><button type="submit" style="background:#045be6;border:none; color:white;cursor:pointer;">{{__('Joblink.Post')}}</button></li>
        </div>
    </form>
</div>