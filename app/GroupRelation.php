<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupRelation extends Model
{
    //
    protected $table = 'group_relation';

    public function group(){
    	return $this->belongsTo('App\Groups', 'group_id','id')->first()->name;
    }

    public function user(){
        return $this->belongsTo('App\User', 'user_id','id')->first();
    }

    public function users(){
        return $this->belongsTo('App\User', 'user_id','id');
    }

    public function getPermission(){
    	if($this->belongsTo('App\Groups', 'group_id','id')->first()->status == 0){
    		return "desactivated";
    	}else{
    		return "activated";
    	}
    	
    }

    public function getStatus(){
        return $this->belongsTo('App\Groups', 'group_id','id')->first()->status;
    }
}
