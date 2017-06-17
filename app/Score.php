<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
	public function getId(){
		return $this->id;
	}
    public function getName(){
    	return $this->name;
    }

    public function getScore(){
    	return $this->score;
    }
}
