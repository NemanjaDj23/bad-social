@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row bg-white border rounded-lg m-3 mt-5 p-4">
        <div class="col-md-8">
            <h5 class="m-0"><a href="/profile/{{ $post->user_id }}" class="text-dark font-weight-bolder text-decoration-none">{{$post->user->username}}</a></h5>
            <small><a href="/profile/{{ $post->user_id }}" class="text-secondary text-decoration-none">{{$post->user->name}} {{$post->user->surname}}</a></small>
            <p class="mt-3">{{$post->content}}</p><br>
        </div>
    </div>
</div>
@endsection