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
                        <textarea 
                            name="post_body" 
                            id="post_body"
                            cols="30" rows="4" 
                            class="form-control @error('post_body') is-invalid @enderror" 
                            placeholder="What's on your mind...">{{ old('post_body') ?? $post->post_body}}
                        </textarea>
                        
                        @error('post_body')
                            <div class="invalid-feedback ">{{$errors->first('post_body')}}</div>
                        @enderror
                        
                        <br>
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-edit"></i> Update post
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection