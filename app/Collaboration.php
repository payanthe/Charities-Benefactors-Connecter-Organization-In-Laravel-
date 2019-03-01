<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collaboration extends Model
{
    //
    protected $table = 'collaborations';
    protected $fillable = ['owner_id','employee_id','abilities_id','specified_field'];

    public function requestedAbility(){
        return $this->belongsTo('App\Abilities','abilities_id');
    }
    public  function charityName(){
        return $this->belongsTo('App\user','owner_id');
    }
    public function benefactorName(){
        return $this->belongsTo('App\user','employee_id');
    }
}
