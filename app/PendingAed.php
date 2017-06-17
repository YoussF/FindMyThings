<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PendingAed extends Model
{
    //
    protected $table = 'aeds_pendings';


    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function isValid(){
    	$count = PendingAed::where('lat', $this->lat)->where('lon', $this->lon)->count();
    	return $count == 2;
    }

    public function getName(){
    	return $this->aedname;
    }

    public function getImageA(){

        if($this->img_a != null){
            return asset('uploads/aeds/'. $this->id . '/' . $this->img_a);
        }
        return null;
    }

    public function getImageB(){

        if($this->img_b != null){
            return asset('uploads/aeds/'. $this->id . '/' . $this->img_b);
        }
        return null;
    }

    public function getImageC(){

        if($this->img_c != null){
            return asset('uploads/aeds/'. $this->id . '/' . $this->img_c);
        }
        return null;
    }

    public function getImageD(){

        if($this->img_d != null){
            return asset('uploads/aeds/'. $this->id . '/' . $this->img_d);
        }
        return null;
    }


}
