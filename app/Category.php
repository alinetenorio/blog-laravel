<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //

    public function setTitleAttribute($value){
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    //RELATIONSHIPS

    public function post(){
        return $this->hasMany(Post::class, 'category', 'id');
    }
}
