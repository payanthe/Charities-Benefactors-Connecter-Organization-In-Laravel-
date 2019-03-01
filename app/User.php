<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role_id','active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role(){
        return $this->belongsTo('App\Role');
    }

    public function isBenefactor(){
        if($this->role->name == 'Benefactor'){
            return true;
        }
        return false;
    }

    public function isCharity(){
        if($this->role->name == 'Charity'){
            return true;
        }
        return false;
    }
    public function isAdmin(){
        if($this->role->name == 'Admin'){
            return true;
        }
        return false;
    }
    public function benefactor(){
        return $this->hasOne('App\Benefactor','user_id');
    }
    public function charity(){
        return $this->hasOne('App\Charity','user_id');
    }
    public function benAbilities(){
        return $this->belongsToMany('App\Abilities','benefactors_abilities');
    }
    public function charAbilities(){
        return $this->belongsToMany('App\Abilities','charities_abilities');
    }

}
