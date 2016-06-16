<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ["post_title", "post_excerpt", "post_content", "post_image"];

    public function comments() {
        return $this->hasMany(Comment::class);
    }
}
