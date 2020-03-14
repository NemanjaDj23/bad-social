<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \Askedio\SoftCascade\Traits\SoftCascadeTrait;

class Post extends Model
{
    public $timestamps = true;

    protected $softCascade = ['comments'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
