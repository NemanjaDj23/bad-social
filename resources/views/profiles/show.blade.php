@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">Make a post</div>

                <div class="card-body">
                    <form action="/index" method="post">
                        @csrf
                        <textarea name="content" cols="30" rows="10" class="form-control"
                        placeholder="What's on your mind...">
                        </textarea>
                        <br>
                        <input type="submit" class="btn btn-danger" value="POST">
                    </form>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">Your posts</div>
                
                <div class="card-body">
                    @foreach($posts as $post)
                        <h5>{{ $post->user->name }} ({{ $post->user->username }})</h5>
                        <a href="/posts/{{$post->id}}" class="text-decoration-none">
                            <p class="text-dark p-2 border rounded-sm">{{ $post->content }}</p>
                        </a>
                        <small>{{ $post->created_at->format("d.m.Y.") }}</small>
                        <small>{{ $post->created_at->diffForHumans() }}</small>
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection