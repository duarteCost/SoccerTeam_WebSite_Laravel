<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    public function ticket()
    {
        return $this->hasMany('App\Ticket', 'game_id');
    }
}
