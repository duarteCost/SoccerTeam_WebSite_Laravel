<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    public function new_img(){
        return $this->hasOne('App\new_img', 'new_id');
    }
}
