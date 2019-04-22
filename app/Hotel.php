<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    public function Wilaya(){
        return $this->belongsto('App/Wilaya');
    }

    public function Slider(){
        return $this->hasMany('App/Slider');
    }
}

