 <!-- Create post -->
 <div class="card">
    <div class="card-header">Make a post</div>

    <div class="card-body">
        <form action="/index" method="post">
            @csrf
            <textarea name="content" cols="30" rows="4" class="form-control"
            placeholder="What's on your mind...">
            </textarea>
            <br>
            <button type="submit" class="btn btn-danger">
                <i class="fas fa-pencil-alt"></i> Create post
            </button>
        </form>
    </div>
</div>