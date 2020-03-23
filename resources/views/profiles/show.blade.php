@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- Profile info -->
            <div class="card mb-3">
                <div class="row no-gutters flex-d align-items-end">
                    <div class="col-md-3 p-4">
                        
                        <a href="{{ url('/profile/'.$user->id.'/edit') }}" class="profile-img">    
                            @if($user->profile->filename == null)
                                <img src="{{url('/images/default-avatar.png')}}" class="card-img" alt="default profil photo">
                            @else 
                                <img src="{{url('uploads/'.$user->profile->filename)}}" class="card-img" alt="profil photo">
                            @endif    
                            @if ($user->id == Auth::user()->id)
                                <p class="rounded-pill px-2 py-1  profile-img__upload">Add image</p>
                            @endif
                        </a>
                    </div>
                    <div class="col-md-9">
                        <div class="card-body">
                            <h4 class="card-title mb-1">{{ $user->name }} {{ $user->surname }}</h4>
                            <p class="card-text text-secondary">{{$user->profile->occupation}}</p>
                        </div>
                    </div>
                    <div class="d-flex flex-column col-md-12 p-4">
                        <h5 class="card-title">About</h5>
                        <p class="card-text text-secondary">{{$user->profile->description}} </p>
                        @if ($user->id == Auth::user()->id)
                            <a href="{{ url('/profile/'.$user->id.'/edit') }}" class="ml-auto btn btn-danger"><i class="fas fa-user-edit"></i> Edit profile</a>
                        @endif
                    </div>
                </div>
            </div>
            
            <!-- Show message -->
            @include('messages.show')
            
            <!-- Create post -->
            @if ($user->id == Auth::user()->id) 
                @include('posts.create')       
            @endif
            <br>

            <!-- Show posts -->
            @if(count($posts) != 0)
                <div class="card">
                    @if ($user->id == Auth::user()->id)
                        <div class="card-header">Your posts</div>
                    @else
                        <div class="card-header">Posts by {{ $user->name }} </div>
                    @endif
                    
                    @include('posts.list')
                </div>
            @endif
        </div>
    </div>
</div>
@endsection