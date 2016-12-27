<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    public function basket_temp(){
        return $this->hasMany('App\Basket_temp', 'ticket_id');
    }
}
