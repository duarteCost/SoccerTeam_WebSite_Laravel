<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stadium_place extends Model
{
    public function games()
    {
        return $this->hasMany('App\Game', 'stadium_id');
    }
}
