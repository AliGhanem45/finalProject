<div class="comment-section">
    <!-- Comment Input Form -->
    <div class="comment-input-container">
        <div class="comment-input-wrapper">
            <img src="{{ Auth::user()->profilePic ? asset('storage/' . Auth::user()->profilePic) : asset('storage/uploads/defaultUser.jpg') }}" class="comment-user-avatar">
            <form class="comment-form" action="{{ route('comments.store',$post->id) }}" method="POST">
                @csrf
                <input type="hidden" name="post_id" value="{{ $post->id ?? '' }}">
                <div class="comment-input-field">
                    <input type="text" name="content" placeholder="Add a comment..." class="comment-input" required>
                    <button type="submit" class="comment-submit-btn">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M2 21l21-9L2 3v7l15 2-15 2v7z"/>
                        </svg>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Comments Display -->
    <div class="comments-list">
        @forelse($post->comments as $comment)
            <div class="comment-item">
                <div class="comment-avatar">
                    <img src="{{ $comment->user->profilePic ? asset('storage/' . $comment->user->profilePic) : asset('storage/uploads/defaultUser.jpg') }}" alt="{{ $comment->user->name }}">
                </div>
                <div class="comment-content">
                    <div class="comment-bubble">
                        <div class="comment-header">
                            <h4 class="comment-author">{{ $comment->user->name }}</h4>
                            <span class="comment-title">{{$comment->user->id ==$post->user->id ? 'Author' :'' }}</span>
                        </div>
                        <p class="comment-text">{{ $comment->content }}</p>
                    </div>
                    <div class="comment-actions">
                        <span class="comment-time">{{ $comment->created_at->diffForHumans() }}</span>
                        @if(Auth::user()->commentliking($comment))
                            <form action="{{ route('comments.unlike',$comment->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="comment-action-btn like-btnclick">
                                Unlike
                                </button>
                            </form>
                        @else
                            <form action="{{ route('comments.like',$comment->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="comment-action-btn like-btn" >
                                Like
                                </button>
                            </form>
                        @endif    
                        <button class="comment-action-btn reply-btn" data-comment-id="{{ $comment->id }}">
                            Reply
                        </button>
                        @if(Auth::id() === $comment->user_id)
                        <form action="{{ route('comments.destroy',$comment->id) }}"method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="comment-action-btn delete-btn">
                                Delete
                            </button>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <div class="no-comments">
                <p>Be the first to comment</p>
            </div>
        @endforelse
    </div>
    

    <!-- Load More Comments -->
    @if(($comments ?? collect())->count() >= 5)
        <div class="load-more-comments">
            <button class="load-more-btn">Load more comments</button>
        </div>
    @endif
</div>

<style>
.comment-section {
    margin-top: 15px;
    background:white;
    border-top: 1px solid #e0e0e0;
    padding-top: 15px;
}

.comment-input-container {
    margin-bottom: 20px;
}

.comment-input-wrapper {
    display: flex;
    align-items: flex-start;
    gap: 10px;
}

.comment-user-avatar {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    object-fit: cover;
    flex-shrink: 0;
}

.comment-form {
    flex: 1;
}

.comment-input-field {
    position: relative;
    width:90%;
    display: flex;
    align-items: center;
    background: #f3f2ef;
    border-radius: 25px;
    padding: 8px 15px;
    border: 1px solid transparent;
    transition: all 0.2s ease;
}

.comment-input-field:focus-within {
    background: white;
    border-color: #0a66c2;
    box-shadow: 0 0 0 2px rgba(10, 102, 194, 0.1);
}

.comment-input {
    flex: 1;
    border: none;
    background: transparent;
    outline: none;
    font-size: 14px;
    color: #333;
    padding: 4px 0;
}

.comment-input::placeholder {
    color: #666;
}

.comment-submit-btn {
    background: none;
    border: none;
    color: #0a66c2;
    cursor: pointer;
    padding: 4px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: background-color 0.2s ease;
    margin-left: 8px;
}

.comment-submit-btn:hover {
    background-color: rgba(10, 102, 194, 0.1);
}

.comments-list {
    space-y: 15px;
}

.comment-item {
    display: flex;
    gap: 10px;
    margin-bottom: 15px;
}

.comment-avatar img {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    object-fit: cover;
}

.comment-content {
    flex: 1;
}

.comment-bubble {
    background: #f3f2ef;
    width:95%;
    border-radius: 12px;
    padding: 12px 16px;
    margin-bottom: 5px;
}

.comment-header {
    margin-bottom: 4px;
}

.comment-author {
    font-size: 13px;
    font-weight: 600;
    color: #000;
    margin: 0;
    line-height: 1.2;
}

.comment-title {
    font-size: 12px;
    color: #666;
    font-weight: 400;
}

.comment-text {
    font-size: 14px;
    color: #000;
    margin-top: 5px;
    line-height: 1.4;
    word-wrap: break-word;
}

.comment-actions {
    display: flex;
    align-items: center;
    gap: 15px;
    padding-left: 16px;
}

.comment-time {
    font-size: 12px;
    color: #666;
}

.comment-action-btn {
    background: none;
    border: none;
    font-size: 12px;
    color: #666;
    cursor: pointer;
    font-weight: 600;
    padding: 4px 0;
    transition: color 0.2s ease;
}
.comment-action-btn.like-btnclick{
    color: #0a66c2;
}

.comment-action-btn:hover {
    color: #0a66c2;
}

.comment-action-btn.delete-btn:hover {
    color: #cc1016;
}

.no-comments {
    text-align: center;
    padding: 20px;
    color: #666;
}

.no-comments p {
    margin: 0;
    font-size: 14px;
}

.load-more-comments {
    text-align: center;
    margin-top: 15px;
}

.load-more-btn {
    background: none;
    border: none;
    color: #0a66c2;
    font-size: 14px;
    font-weight: 600;
    cursor: pointer;
    padding: 8px 16px;
    border-radius: 4px;
    transition: background-color 0.2s ease;
}

.load-more-btn:hover {
    background-color: rgba(10, 102, 194, 0.1);
}

/* Responsive Design */
@media (max-width: 768px) {
    .comment-input-wrapper {
        gap: 8px;
    }
    
    .comment-user-avatar {
        width: 36px;
        height: 36px;
    }
    
    .comment-avatar img {
        width: 28px;
        height: 28px;
    }
    
    .comment-actions {
        gap: 12px;
    }
}
</style>
