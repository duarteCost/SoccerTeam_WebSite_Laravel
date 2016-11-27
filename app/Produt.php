<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produt extends Model
{
    public function users()
    {
        return $this->belongsToMany('App\User', 'user_has_product', 'user_id', 'product_id');
    }
}
