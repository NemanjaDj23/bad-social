<!-- Add comment -->

<form method="post" action="{{ route('comment.store') }}">
    @csrf
    <div class="form-group">
        <input type="text" name="comment_body" class="form-control @error('comment_body') is-invalid @enderror" placeholder="Add comment...">
        @error('comment_body')
            <div class="invalid-feedback "> {{$errors->first('comment_body')}}</div>
        @enderror

        <input type="hidden" name="post_id" value="{{ $post->id }}">
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-danger">
        <i class="fas fa-pencil-alt"></i> Add Comment
        </button>
    </div>
</form>