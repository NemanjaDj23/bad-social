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

                    <form action="/home" method="post">
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
                <div class="card-header">Posts</div>

                <div class="card-body">
                    @foreach($posts as $post)
                        <h5><a href="user/{{ $post->user_id }}">{{ $post->user->name }} ({{ $post->user->username}})</a></h5>
                        <p>{{ $post->content }}</p>

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
