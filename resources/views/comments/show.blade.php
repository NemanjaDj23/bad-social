<!-- Show comments -->

<h5>Comments:</h5>
<hr>
@foreach($post->comments as $comment)
    <div class="display-comment">
        <a href="{{ url('/profile/'.$comment->user->id) }}" class="text-dark text-decoration-none"><strong>{{ $comment->user->username }}</strong></a>
        <p>{{ $comment->comment_body }}</p>
    </div>
    <hr>
@endforeach
<br>