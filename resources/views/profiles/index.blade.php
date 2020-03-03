@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Make a post</div>

                <div class="card-body">
                    @if(session()->has('success'))
                        <div class='alert alert-success'>{{ session()->get('success') }}</div>
                        @elseif(session()->has('error'))
                            <div class='alert alert-danger'>{{ session()->get('error') }}</div>
                    @endif

                    <form action="/index" method="post">
                        @csrf
                        <textarea name="content" cols="30" rows="4" class="form-control"
                        placeholder="What's on your mind...">
                        </textarea>
                        <br>
                        <input type="submit" class="btn btn-danger" value="Create post">
                    </form>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">Posts</div>

                <div class="card-body">
                    @foreach($posts as $post)
                        <div class="p-3 border rounded-sm">
                            <div class="row d-flex align-items-center">
                                <div class="col-md-2 p-4">
                                    <a href="profile/{{ $post->user_id }}"><img src="/images/default-avatar.png" class="card-img rounded-circle" alt="defoult profil avatar"><a>
                                </div>
                                <div >
                                    <h5 class="m-0"><a href="profile/{{ $post->user_id }}" class="text-dark font-weight-bolder text-decoration-none">{{ $post->user->username}}</a></h5>
                                    <small><a href="/profile/{{ $post->user_id }}" class="text-secondary text-decoration-none">{{$post->user->name}} {{$post->user->surname}}</a></small>
                                </div>
                            </div>
                            
                            <a href="/posts/{{$post->id}}" class="text-decoration-none">
                                <p class="text-dark mt-2">{{ $post->content }}</p>
                            </a>
                            <small>Written on {{ $post->updated_at->format("d.m.Y.") }}</small>
                            <small>{{ $post->updated_at->diffForHumans() }}</small>

                            <div class="d-flex">
                                @if ($post->user->id == Auth::user()->id)
                                    <div class="ml-auto">
                                        <a href="/posts/{{$post->id}}/edit" class="btn btn-danger">Edit post</a>
                                        <a href="{{ route('post.delete', ['id' => $post->id]) }}" class="btn btn-danger ml-2">Delete post</a>
                                    </div>
                                @endif
                            </div>
                            
                            <br><br>

                            <h5>Comments:</h5>
                            <hr>
                            @foreach($post->comments as $comment)
                                <div class="display-comment">
                                    <a href="profile/{{ $comment->user->id }}" class="text-dark text-decoration-none"><strong>{{ $comment->user->name }}</strong></a>
                                    <p>{{ $comment->content }}</p>
                                </div>
                                <hr>
                            @endforeach
                            <br>

                            <form method="post" action="{{ route('comment.store') }}">
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="comment_body" class="form-control" placeholder="Add comment..."/>
                                    <input type="hidden" name="post_id" value="{{ $post->id }}" />
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-danger" value="Add Comment" />
                                </div>
                            </form>
                        </div>
                        <hr>
                        <br><br>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
