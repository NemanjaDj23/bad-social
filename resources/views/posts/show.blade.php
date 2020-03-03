@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row bg-white border rounded-lg m-3 mt-5 p-4">
        <div class="col-md-8">
            <div class="row d-flex align-items-center">
                <div class="col-md-2 p-4">
                    <a href="/profile/{{ $post->user_id }}"><img src="/images/default-avatar.png" class="card-img rounded-circle" alt="defoult profil avatar"></a>
                </div>
                <div >
                    <h5 class="m-0"><a href="/profile/{{ $post->user_id }}" class="text-dark font-weight-bolder text-decoration-none">{{$post->user->username}}</a></h5>
                    <small><a href="/profile/{{ $post->user_id }}" class="text-secondary text-decoration-none">{{$post->user->name}} {{$post->user->surname}}</a></small>
                </div>
            </div>
            
            <p class="mt-3">{{$post->content}}</p><br>

            <small>Written on {{ $post->created_at->format("d.m.Y.") }}</small>
            <small>{{ $post->created_at->diffForHumans() }}</small>
        </div>
    </div>
</div>
@endsection