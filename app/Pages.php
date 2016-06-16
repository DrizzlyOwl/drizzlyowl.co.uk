<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    protected $fillable = ["post_title", "post_excerpt", "post_content", "post_image"];

    public function title() {
        return $this->post_title;
    }

    public function content() {
        return $this->post_content;
    }

    public function excerpt() {
        return $this->post_excerpt;
    }
}
