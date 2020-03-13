@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- Show message -->
            @include('messages.show')
            
            <!-- Create post -->
            @include('posts.create')  
            <br>
            @if(count($posts) != 0)
                <div class="card">
                    <div class="card-header">Posts</div>
                    
                    <!-- Show posts -->
                    @include('posts.index')  
                </div> 
            @endif         
        </div>
    </div>
</div>
@endsection
