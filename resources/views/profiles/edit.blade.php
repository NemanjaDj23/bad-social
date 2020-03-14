@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/profile/{{ $user->id }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="row">
            <div class="col-8 offset-2">
                <div class="row">
                    <h3>Edit Profile</h3>
                </div>

                <div class="form-group row">
                    <label for="occupation" class="col-form-label">Occupation</label>
                    <input type="text" name="occupation" class="form-control" placeholder="Something about your occupation..." value="{{ old('title') ?? $user->profile->occupation}}">
                </div>

                <div class="form-group row">
                    <label for="description" class="col-form-label">Description</label>
                    <textarea name="description" cols="30" rows="4" class="form-control" placeholder="Something about you...">{{ old('title') ?? $user->profile->description}}</textarea>
                </div>

                <div class="form-group row">
                    <label for="profile_photo" class="col-form-label">Profile photo:</label>
                    <input type="file" class="form-control border-0" name="profile_photo"/>
                </div>

                <div class="flex-d row">
                    <div class="ml-auto mt-3">
                        <button class="btn btn-danger"> <i class="fas fa-save"></i> Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection