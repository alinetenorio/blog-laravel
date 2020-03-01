<?php

namespace App;

use Illuminate\Database\Eloquent\Model;use Illuminate\Support\Str;


class Post extends Model
{
    //

    public function setTitleAttribute($value){
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    //RELATIONSHIPS

    public function user(){
        return $this->belongsTo(User::class, 'author', 'id');
    }

    public function comments(){
        return $this->hasMany(Comment::class, 'post', 'id');
    }

    public function category(){
        return $this->belongTo(Category::class, 'category', 'id');
    }

    public function tags(){
        return $this->belongsToMany(Tag::class, 'posts_tags', 'post', 'tag');
    }
}
