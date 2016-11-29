<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produt extends Model
{
    public function users()
    {
        return $this->belongsToMany('App\User', 'user_has_product', 'user_id', 'product_id');
    }
    public function basket_temp()
    {
        return $this->hasMany('App\Basket_Temp', 'product_id');
    }
}
