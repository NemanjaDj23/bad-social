@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row bg-white border rounded-lg m-3 mt-5 p-4">
        <div class="col-md-8">
            <div class="row d-flex align-items-center">
                <div class="col-md-2 p-4">
                    <a href="{{ url('/profile/'.$post->user_id) }}">
                        @if($post->user->profile->filename == null)
                            <img src="{{url('/images/default-avatar.png')}}" class="card-img rounded-circle " alt="default profil photo">
                        @else 
                            <img src="{{url('uploads/'.$post->user->profile->filename)}}" class="card-img rounded-circle" alt="profil photo">
                        @endif 
                    </a>
                </div>
                <div >
                    <h5 class="m-0"><a href="{{ url('/profile/'.$post->user_id) }}" class="text-dark font-weight-bolder text-decoration-none">{{$post->user->username}}</a></h5>
                    <small><a href="{{ url('/profile/'.$post->user_id) }}" class="text-secondary text-decoration-none">{{$post->user->name}} {{$post->user->surname}}</a></small>
                </div>
            </div>
            
            <p class="mt-3">{{$post->post_body}}</p><br>

            <small>Written on {{ $post->created_at->format("d.m.Y.") }}</small>
            <small>{{ $post->created_at->diffForHumans() }}</small>
        </div>
    </div>
</div>
@endsection