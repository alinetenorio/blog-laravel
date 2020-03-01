<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //

    public function setAttributeTitle($value){
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
}
