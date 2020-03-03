@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit post</div>

                <div class="card-body">
                    <form action="/posts/{{$post->id}}" method="post">
                        @method('PATCH')
                        @csrf
                        <textarea name="content" cols="30" rows="4" class="form-control" placeholder="What's on your mind...">{{$post->content}}</textarea>
                        <br>
                        <input type="submit" class="btn btn-danger" value="Update post">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection