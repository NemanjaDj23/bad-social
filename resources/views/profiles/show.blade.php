@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-3">
                <div class="row no-gutters flex-d align-items-end">
                    <div class="col-md-3 p-4">
                        <img src="/images/default-avatar.png" class="card-img" alt="defoult profil avatar">
                    </div>
                    <div class="col-md-9">
                        <div class="card-body">
                            <h4 class="card-title mb-1">{{ $user->name }} {{ $user->surname }}</h4>
                            <p class="card-text text-secondary">Your occupation</p>
                        </div>
                    </div>
                    <div class="d-flex flex-column col-md-12 p-4">
                        <h5 class="card-title">About</h5>
                        <p class="card-text text-secondary">Some description text, abot youihgh gier gerhgrehgijerioj
                         re erijeir gej gejroj goreoj goerj g ieorjoej ogrj eigj oiejr gojeiojg oeij </p>

                    @if ($user->id == Auth::user()->id)
                        <a href="/profile/{{ $user->id }}/edit" class="ml-auto btn btn-danger">Edit profile</a>
                    @endif
                    </div>
                </div>
            </div>

            @if ($user->id == Auth::user()->id)
                <div class="card">
                    <div class="card-header">Make a post</div>

                    <div class="card-body">
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
            @endif
            <br>
            <div class="card">
                @if ($user->id == Auth::user()->id)
                    <div class="card-header">Your posts</div>
                @else
                    <div class="card-header">Posts by {{ $user->name }} </div>
                @endif
                
                <div class="card-body">
                    @foreach($posts as $post)
                        <h5 class="m-0 font-weight-bolder">{{ $post->user->username }}</h5>
                        <small class="text-secondary">{{ $post->user->name }} {{ $post->user->surname }}</small>
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