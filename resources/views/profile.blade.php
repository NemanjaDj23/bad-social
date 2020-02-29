@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $user->name }}</div>
                
                <div class="card-body">
                    @foreach($posts as $post)
                        <h5>{{ $post->user->name }} ({{ $post->user->username }})</h5>
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