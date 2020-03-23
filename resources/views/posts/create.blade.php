 <!-- Create post -->
 <div class="card">
    <div class="card-header">Make a post</div>

    <div class="card-body">
        <form action="/posts" method="post">
            @csrf
            <textarea 
                name="post_body"  
                cols="30" rows="4" 
                class="form-control @error('post_body') is-invalid @enderror"
                placeholder="What's on your mind...">{{ old('post_body')}}
            </textarea>
            @error('post_body')
                <div class="invalid-feedback ">{{$errors->first('post_body')}}</div>
            @enderror

            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            <br>
            <button type="submit" class="btn btn-danger">
                <i class="fas fa-pencil-alt"></i> Create post
            </button>
        </form>
    </div>
</div>