<!-- Show posts -->

<div class="card-body">
    @foreach($posts as $post)
        <div class="p-3 border rounded-sm">
            <div class="row d-flex align-items-center">
                <div class="col-md-2 p-4">
                    <a href="{{ url('profile/'.$post->user_id) }}"><img src="/images/default-avatar.png" class="card-img rounded-circle" alt="defoult profil avatar"><a>
                </div>
                <div >
                    <h5 class="m-0"><a href="{{ url('profile/'.$post->user_id) }}" class="text-dark font-weight-bolder text-decoration-none">{{ $post->user->username}}</a></h5>
                    <small><a href="{{ url('profile/'.$post->user_id) }}" class="text-secondary text-decoration-none">{{$post->user->name}} {{$post->user->surname}}</a></small>
                </div>
            </div>
            
            <a href="{{ url('/posts/'.$post->id) }}" class="text-decoration-none">
                <p class="text-dark mt-2">{{ $post->content }}</p>
            </a>
            <small>Written on {{ $post->updated_at->format("d.m.Y.") }}</small>
            <small>{{ $post->updated_at->diffForHumans() }}</small>

            <div class="d-flex flex-row justify-content-end">
                @if ($post->user->id == Auth::user()->id)
                    
                    <a href="{{ url('/posts/'.$post->id.'/edit') }}" class="btn btn-danger"><i class="fas fa-pencil-alt"></i> Edit post</a>

                    <form action="{{ url('/posts/'.$post->id) }}" method="post">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger ml-2" type="submit"> <i class="fas fa-trash"></i> Delete post </button>
                    </form>
                    
                @endif
            </div>
            <br><br>

            <!-- Show comments -->
            @include('comments.show')

            <!-- Add comment -->
            @include('comments.create')
        </div>
        <hr>
        <br><br>
    @endforeach
</div>