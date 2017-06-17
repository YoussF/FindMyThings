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
        'name','firstname','lastname', 'email', 'password','gender','validated', 'validation_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getAvatar() {
        if($this->avatar != null && $this->google_id != null){
            if (strpos($this->avatar, 'http') !== false) {
                return asset($this->avatar);
            }else{
                return asset('uploads/avatar/' . $this->avatar);
            }
        }else{
            if($this->avatar != null){
                return asset('uploads/avatar/' . $this->avatar);
            }else{
                return asset('uploads/default/icon-anonyme.png');
            }
        }
    }

    public function getGroupName() {
        if($this->belongsTo('App\GroupRelation', 'id','user_id')->first() != null){
            return $this->belongsTo('App\GroupRelation', 'id','user_id')->first()->group();
        }else{
            return "N/A";
        }
    }

    public function isGoogle(){
        return $this->google_id != null;
    }


    /**
     * Get the groupe a user has
     */
    public function group(){
        return $this->belongsTo('App\GroupRelation', 'id','user_id');
    }

    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function getName(){
        return $this->name;
    }    

    public function getFirstName(){
        return $this->firstname;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getId(){
        return $this->id;
    }

    public function getPermission(){
        return $this->belongsTo('App\GroupRelation', 'id','user_id')->first()->getPermission();
    }

    public function getScore(){
        $resultat =  $this->belongsTo('App\ScoreRelation', 'id', 'user_id')->first();
        if($resultat == null){
            return 0;
        }
        return $resultat->score;
    }

    public function getAedCpt(){
        $resultat = $this->belongsTo('App\ScoreRelation', 'id', 'user_id')->get();

        if($resultat == null){
            $resultat = 0;
        }
        return $resultat->count();
    }

    public function isInvitated(){
        $resultat = $this->belongsTo('App\Invitation', 'email', 'email')->where('validate',0)->first();
        return $resultat != null;
    }

    public function getInvitation(){
        $resultat = $this->belongsTo('App\Invitation', 'email', 'email')->first();
        return $resultat;
    }

    public function isSuperAdmin(){
        return $this->role == 1;
    }

    public function isAdmin(){
        return $this->role == 2;
    }

    public function getGroupID(){
        if($this->belongsTo('App\GroupRelation', 'id','user_id')->first() != null){
            return $this->belongsTo('App\GroupRelation', 'id','user_id')->first()->id;
        }else{
            return 1;
        }
    }

    public function hasPermissionAED(){
        return $this->belongsTo('App\GroupRelation', 'id','user_id')->first()->getStatus() == 1;
    }    

    public function getRole(){
        return $this->role;
    }
}
