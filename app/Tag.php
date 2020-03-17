<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Tag extends Model
{
    //

    public function setTitleAttribute($value){
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    //RELATIONSHIPS

    public function posts(){
        return $this->belongsToMany(Post::class, 'posts_tags', 'tag', 'post');
    }
}
