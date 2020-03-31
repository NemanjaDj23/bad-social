@extends('layouts.app')

@section('content')
<div class="container mt-5 pt-3">
    <div class="row bg-white border rounded-lg m-3 mt-5 p-4">
        <div class="col-md-8">
            <div class="row d-flex align-items-center">
                <div class="col-md-2 p-4">
                    <a href="{{ url('/users/'.$post->user_id) }}">
                        @if($post->user->filename == null)
                            <img src="{{url('/images/default-avatar.png')}}" class="card-img rounded-circle " alt="default profil photo">
                        @else 
                            <img src="{{url('uploads/'.$post->user->filename)}}" class="card-img rounded-circle" alt="profil photo">
                        @endif 
                    </a>
                </div>
                <div >
                    <h5 class="m-0"><a href="{{ url('/users/'.$post->user_id) }}" class="text-dark font-weight-bolder text-decoration-none">{{$post->user->username}}</a></h5>
                    <small><a href="{{ url('/users/'.$post->user_id) }}" class="text-secondary text-decoration-none">{{$post->user->name}} {{$post->user->surname}}</a></small>
                </div>
            </div>
            
            <p>
                @foreach ($post->categories as $category)
                    <a href="{{ route('posts.index', ['category' => $category->name]) }}" class="btn btn-danger">{{ $category->name }}</a>
                @endforeach
            </p>
            <p class="mt-3">{{$post->post_body}}</p><br>

            <small>Written on {{ $post->updated_at->format("d.m.Y.") }}</small>
            <small>{{ $post->updated_at->diffForHumans() }}</small>
        </div>
    </div>
</div>
@endsection