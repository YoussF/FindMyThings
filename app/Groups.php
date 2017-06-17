<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Groups extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function members() {
        return $this->hasMany('App\GroupRelation', 'group_id')->take(11);
    }

    public function invitations() {
        return $this->hasMany('App\Invitation', 'group_id');
    }

    public function allMembers() {
        return $this->hasMany('App\GroupRelation', 'group_id');
    }

    public function getName(){
    	return $this->name;
    }

    public function getDescription(){
    	return $this->description;
    }

    public function getLogo(){
    	$group_logo = asset('uploads/default/group-anonyme.jpg');
    	if($this->logo != null){
    		$group_logo = asset('uploads/group/' . $this->id . '/' . $this->logo);
    	}
    	return $group_logo;
    }

    public function getPermission(){
        if($this->status == 0){
            return "desactivated";
        }else{
            return "activated";
        }
    }

    public function getId(){
        return $this->id;
    }

    public function getStatus(){
        return $this->status;
    }

    public function getMembers(){
        return $this->members()->get();
    }


    public function getPendings(){
        return $this->invitations()->where('validate', 0)->get();
    }

}
