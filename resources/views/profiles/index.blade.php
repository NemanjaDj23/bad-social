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
                        <input type="submit" class="btn btn-danger" value="POST">
                    </form>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">Posts</div>

                <div class="card-body">
                    @foreach($posts as $post)
                        <h5 class="m-0"><a href="profile/{{ $post->user_id }}" class="text-dark font-weight-bolder text-decoration-none">{{ $post->user->username}}</a></h5>
                        <small><a href="/profile/{{ $post->user_id }}" class="text-secondary text-decoration-none">{{$post->user->name}}</a></small>
                        <a href="/posts/{{$post->id}}" class="text-decoration-none">
                            <p class="text-dark mt-2 p-2 border rounded-sm">{{ $post->content }}</p>
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
