@extends('layouts.app')

@section('content')
<div class="container">
    <form action="#" enctype="multipart/form-data" method="post">
        @csrf
        @method('PATCH')
        <div class="row">
            <div class="col-8 offset-2">

                <div class="row">
                    <h3>Edit Profile</h3>
                </div>


                <div class="form-group row">
                    <label for="occupation" class="col-form-label">Occupation</label>

                    <input id="occupation" type="occupation" class="form-control @error('occupation') is-invalid @enderror" name="occupation" value="{{ old('occupation') }}" autocomplete="occupation">

                    @error('occupation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group row">
                    <label for="description" class="col-form-label">Description</label>

                    <input id="description" type="description" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" autocomplete="description">

                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="image" class="col-form-label">Profile image</label>
                    <input type="file" class="form-control-file " id="image" name="image">
                </div>

                <div class="flex-d row">
                    <div class="ml-auto">
                        <button class="btn btn-danger">Save profile</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection