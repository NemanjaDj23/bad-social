@extends('layouts.app')

@section('content')
<div class="container mt-5 pt-3">
    <div class="row justify-content-end">
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
                    @include('posts.list')  
                </div> 
            @endif         
        </div>
        <div class="col-md-2">
                <div class="card categories">
                    <div class="card-header">Categories:</div>

                    <ul class="py-3 px-4 m-0">
                        @foreach ($categories as $category)
                            <li><a href="{{ route('posts.index', ['category' => $category->name]) }}" class="text-danger">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                     
                </div>          
        </div>

    </div>
</div>
@endsection
