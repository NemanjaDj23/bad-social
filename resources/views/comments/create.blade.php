<!-- Add comment -->

<form method="post" action="{{ route('comment.store') }}">
    @csrf
    <div class="form-group">
        <input type="text" name="comment_body" class="form-control" placeholder="Add comment...">
        <input type="hidden" name="post_id" value="{{ $post->id }}">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-danger">
        <i class="fas fa-pencil-alt"></i> Add Comment
        </button>
    </div>
</form>