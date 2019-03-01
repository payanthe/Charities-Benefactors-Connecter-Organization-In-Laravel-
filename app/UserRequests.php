<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRequests extends Model
{
    //
    protected $table = 'request';
    protected $fillable=['id','sender_id','receiver_id','message','specified_field','abilities_id'];

    public function requestedAbility(){
        return $this->belongsTo('App\Abilities','abilities_id');
    }
    public  function senderName(){
        return $this->belongsTo('App\user','sender_id');
    }
    public function receiverName(){
        return $this->belongsTo('App\user','receiver_id');
    }
}
