<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    
    public function getThingName(){
        return $this->hasOne('App\Thing', 'id', 'thing_id')->first()->name;
    }
}
