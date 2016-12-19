<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function produts()
    {
        return $this->belongsToMany('App\Produt', 'user_has_product' ,'user_id', 'product_id' );
    }
    public function news()
    {
        return $this->hasMany('App\News', 'user_id');
    }

    public function basket_temp(){
        return $this->hasOne('App\Basket_Temp', 'user_id');
    }

    public function basket(){
        return $this->hasOne('App\Basket', 'user_id');
    }

}
