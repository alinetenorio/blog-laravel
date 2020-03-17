<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Category extends Model
{
    //

    public function setTitleAttribute($value){
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    //RELATIONSHIPS

    public function posts(){
        return $this->hasMany(Post::class, 'category_id', 'id');
    }
}
